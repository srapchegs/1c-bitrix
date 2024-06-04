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
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<div class="index_slider_bl">
	<ul class="index_slider">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<li>
		<?if($arParams["DISPLAY_PICTURE"]!=="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<div class='index_slider_el' style='background-image:url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>);'>
		<?endif?>
			<div class='standart_width index_slider_cont'>
				<div class='ind_slid_txt_bl'>

					<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
							<div class='ind_slid_tit'><?=$arItem["NAME"]?></div>
					<?endif;?>

					<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
						<div class='ind_slid_txt'><?=$arItem["PREVIEW_TEXT"]?></div>
					<?endif;?>
					<?if($arItem["DISPLAY_PROPERTIES"]["URL"]["DISPLAY_VALUE"]!=null):?>
						<a class='red_bt' href='<?=$arItem["DISPLAY_PROPERTIES"]["URL"]["DISPLAY_VALUE"];?>'><?=$arItem["DISPLAY_PROPERTIES"]["TEXT_URL"]["DISPLAY_VALUE"];?></a>
					<?endif?>
				</div>
				<div class='ind_slid_img'><img src='<?=$arItem["DETAIL_PICTURE"]["SRC"]?>' alt=''/></div>
			<div>
		</div>
	</li>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</ul>
</div>
