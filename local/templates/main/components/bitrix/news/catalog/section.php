<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<?
	if(CModule::IncludeModule('iblock')){
		$arSection = CIBlockSection::GetList(['LEFT_MARGIN'=>'ASC'], ['IBLOCK_ID'=>$arParams['IBLOCK_ID'], 'ACTIVE'=>'Y', 'CODE'=>$arResult['VARIABLES']['SECTION_CODE']])->fetch();
		$dbs = CIBlockSection::GetList(['LEFT_MARGIN'=>'ASC'], ['IBLOCK_ID'=>$arParams['IBLOCK_ID'], 'ACTIVE'=>'Y', 'SECTION_ID'=>$arSection['ID']]);
		$countS = $dbs->SelectedRowsCount();
	}
?>
<?
$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"catalog_section",
	Array(
		"ADDITIONAL_COUNT_ELEMENTS_FILTER" => "additionalCountFilter",
		"ADD_SECTIONS_CHAIN" => "Y",
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"SET_TITLE" => "Y",
		"CACHE_FILTER" => $arParams["CACHE_FILTER"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"COUNT_ELEMENTS" => "N",
		"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
		"FILTER_NAME" => "sectionsFilter",
		"HIDE_SECTIONS_WITH_ZERO_COUNT_ELEMENTS" => "N",
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"SECTION_CODE" => $arResult['VARIABLES']['SECTION_CODE'],
		"SECTION_FIELDS" => array("", ""),
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array("", ""),
		"SHOW_PARENT_NAME" => "Y",
		"TOP_DEPTH" => "1",
		"VIEW_MODE" => "TILE"
	),
	$component
);
?>
<?if(!$countS):?>
	<div class="content clear_after">
	<div class="content_l">
		<div class="filter_bl">
		<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.smart.filter",
	"filtr",
	Array(
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"DISPLAY_ELEMENT_COUNT" => "Y",
		"FILTER_NAME" => "arrFilter",
		"FILTER_VIEW_MODE" => "vertical",
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"PAGER_PARAMS_NAME" => "arrPager",
		"POPUP_POSITION" => "left",
		"PREFILTER_NAME" => "smartPreFilter",
		"SAVE_IN_SESSION" => "N",
		"SECTION_CODE" =>  $arResult['VARIABLES']['SECTION_CODE'],
		"SECTION_DESCRIPTION" => "-",
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_TITLE" => "-",
		"SEF_MODE" => "N",
		"TEMPLATE_THEME" => "blue",
		"XML_EXPORT" => "N"
	),
	$component
);?>
		</div>
	</div>
	<div class="content_c">
		<div class="sorting_bl">
			<span>Сортировать:</span>
			<? 
			if($_GET['by']){
				$by = $_GET['by'];
			}else{
				$by = $arParams['SORT_BY1'];
			}
			if($_GET['sort']){
				$sort = $_GET['sort'];
			}else{
				$sort = $arParams['SORT_ORDER1'];
			}
			$arSort= [
				'PROPERTY_PRICE' => 'По цене', 
				'PROPERTY_REVIEW' => 'По рейтингу', 
				'ID' => 'По новизне' 
			];
			foreach($arSort as $sKey=>$sValue){
				$sSortNew = 'ASC';
				$sClass = '';
				if ($by === $sKey){
					$sSortNew = ($sort === 'ASC') ? 'DESC' : 'ASC';
					$sClass = 'active ';
					$sClass .= ($sSortNew === 'ASC') ? 'max' : 'min';
				}
				elseif($sKey === 'PROPERTY_RATING' || $sKey === 'ID'){
					$sSortNew = 'DESC';
				}
				$sUrl = $APPLICATION->GetCurPageParam('by='.$sKey.'&sort='.$sSortNew, ['by','sort'])?>
				<a class="sorting_el <?=$sClass?>" href="<?=$sUrl?>"><i></i><?=$sValue?></a>
			<?}
			?>
		</div>
	<?$APPLICATION->IncludeComponent(
		"bitrix:news.list",
		"books_list",
		Array(
			"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
			"NEWS_COUNT" => $arParams["NEWS_COUNT"],
			"SORT_BY1" => $by,
			"SORT_ORDER1" => $sort,
			"SORT_BY2" => $arParams["SORT_BY2"],
			"SORT_ORDER2" => $arParams["SORT_ORDER2"],
			"FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
			"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
			"SET_TITLE" => "N",
			"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
			"MESSAGE_404" => $arParams["MESSAGE_404"],
			"SET_STATUS_404" => $arParams["SET_STATUS_404"],
			"SHOW_404" => $arParams["SHOW_404"],
			"FILE_404" => $arParams["FILE_404"],
			"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
			"ADD_SECTIONS_CHAIN" => "N",
			"CACHE_TYPE" => $arParams["CACHE_TYPE"],
			"CACHE_TIME" => $arParams["CACHE_TIME"],
			"CACHE_FILTER" => $arParams["CACHE_FILTER"],
			"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
			"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
			"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
			"PAGER_TITLE" => $arParams["PAGER_TITLE"],
			"PAGER_TEMPLATE" => "round",
			"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
			"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
			"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
			"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
			"PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
			"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
			"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
			"DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
			"DISPLAY_NAME" => "Y",
			"DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
			"DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
			"PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
			"ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
			"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
			"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
			"FILTER_NAME" => "arrFilter",
			"HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
			"CHECK_DATES" => $arParams["CHECK_DATES"],
			"STRICT_SECTION_CHECK" => $arParams["STRICT_SECTION_CHECK"],
			"PARENT_SECTION" => $arResult["VARIABLES"]["SECTION_ID"],
			"PARENT_SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
			"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
			"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
			"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
			"FAVORITE" => json_decode($_COOKIE['favorite']),
		),
		$component
	);?>
		</div>
</div>
<?endif;?>