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
$iPrice = 0;
$iNewPrice = 0;
$fDiscount = 0;
$iPrice = ($arResult["PROPERTIES"]["PRICE"]["VALUE"]);
$iDiscount = intval($arResult["PROPERTIES"]["DISCOUNT"]["VALUE"]);
if($iDiscount > 0)
	$iNewPrice = intval($iPrice - $iPrice*($iDiscount/100));
$iStars = intval($arResult["PROPERTIES"]["REVIEW"]["VALUE"]);
// echo"<pre>";print_r($arResult["PROPERTIES"]["GALLEREY"]["VALUE"]);echo"</pre>";
?>
<section>
<div class="catalog_detail_bl">
		<div class="detail_info_bl clear_after">
			<div class="section det_gallery clear_after">
					<ul class="tabs det_tabs not_style">
						<?foreach($arResult["PROPERTIES"]["GALLEREY"]["VALUE"] as $i=>$iVal):
							$sPath = CFile::GetPath($iVal);?>
							<li <?if (!$i):?>class="current"<?endif;?>><img src="<?=$sPath?>" alt=""/></li>
						<?endforeach;?>
					</ul>

					<div class="det_box_bl">
						<? foreach($arResult["PROPERTIES"]["GALLEREY"]["VALUE"] as $i=>$iVal):
							$sPath = CFile::GetPath($iVal);
							?>
							<li <?if (!$i):?>class="current"<?endif;?>><img src="<?=$sPath?>" alt=""/></li>
						<div class="box det_box" <?if (!$i):?>style="display:block;"<?endif;?>>
							<a href="<?=$sPath?>" data-fancybox="images"><img src="<?=$sPath?>" alt=""/></a>
						</div>
						<?endforeach;?>
					</div>
			</div>
			<div class="detail_info">
				<div class="detail_info_top">
					<div class="cat_el_star">
						<? for($i=0;$i<$iStars;$i++):?>
							<img src="/local/templates/main/assets/img/star_orange.png" alt="">
						<?endfor;?>
						<? if($iStars<5):?>
							<? for($i=0;$i<5-$iStars;$i++):?>
								<img src="/local/templates/main/assets/img/star_gray.png" alt="">
							<?endfor;?>
						<? endif;?>
					</div>
					<div class="det_price_status_bl">
						<div class="det_price_bl">
							<?if($iDiscount > 0 ):?>
								<div class="det_price"><?=$iNewPrice?> руб.</div>
								<div class="cat_old_price">
									<div class="price"><?=$iPrice?>руб.</div>
									<div class="sale">-<?=$iDiscount?>%</div>
								</div>
							<?else:?>
								<div class="det_price"><?=$iPrice?> руб.</div>
							<?endif;?>
							<a class="favor_bt <?=(in_array($arResult['ID'], $arParams['FAVORITE'])) ? 'active' : '';?>" data-id=<?=$arResult['ID']?> href="">В избранное</a>

						</div>
						<div class="det_status_bl">
							<?if($arResult["PROPERTIES"]["ACTIONS"]["VALUE"] === "Y" ):?>
								<div class="det_status_el green">В наличии</div>
							<?endif;?>
							<?if($arResult["PROPERTIES"]["LITTLE_LEFT"]["VALUE"] !== null ):?>
								<div class="det_status_el red">Осталось мало</div>
							<?endif;?>
							<?if(intval($arResult["PROPERTIES"]["DELIVERY"]["VALUE"]) === 0 ):?>
								<div class="det_status_el blue">Бесплатная доставка</div>
							<?else:?>
								<div class="det_status_el blue"><?=$arResult["PROPERTIES"]["DELIVERY"]["VALUE"]?> руб.</div>
							<?endif;?>
						</div>
					</div>
				</div>
				<div class="detail_info_bottom">
					<div class="detail_option_list">
						<? if(count($arResult["PROPERTIES"]["AUTHOR"]["VALUE"]) > 1):?>
							<div class="detail_option_el">Авторы:<br>
								<?foreach($arResult["PROPERTIES"]["AUTHOR"]["VALUE"] as $arAuthor):?>
									<a><?=$arAuthor?></a><span><br></span>
								<?endforeach?>
							</div>
						<?else:?>
							<div class="detail_option_el">Автор:
								<?foreach($arResult["PROPERTIES"]["AUTHOR"]["VALUE"] as $arAuthor):?>
									<a><?=$arAuthor?></a>
								<?endforeach?>
							</div>
						<?endif;?>
						<div class="detail_option_el">Год издания:  <?=$arResult["PROPERTIES"]["YEAR"]["VALUE"]?></div>

						<? if(count($arResult["PROPERTIES"]["PUB_HOUSE"]["VALUE"]) > 1):?>
							<div class="detail_option_el">Издательства:<br>
								<?foreach($arResult["PROPERTIES"]["PUB_HOUSE"]["VALUE"] as $arAuthor):?>
									<a><?=$arAuthor?></a><span><br></span>
								<?endforeach?>
							</div>
						<?else:?>
							<div class="detail_option_el">Издательств:
								<?foreach($arResult["PROPERTIES"]["PUB_HOUSE"]["VALUE"] as $arAuthor):?>
									<a><?=$arAuthor?></a>
								<?endforeach?>
							</div>
						<?endif;?>
						<div class="detail_option_el">Количество страниц:   <?=$arResult["PROPERTIES"]["PAGES_COUNT"]["VALUE"]?></div>
						<div class="detail_option_el">Артикул:  <?=$arResult["PROPERTIES"]["ARTICLE"]["VALUE"]?></div>
						<div class="detail_option_el">Переплет:  <?=$arResult["PROPERTIES"]["BINDING"]["VALUE"]?></div>
						<div class="detail_option_el">Возрастное ограничение:  <?=$arResult["PROPERTIES"]["AGE"]["VALUE"]?>+</div>
						<div class="detail_option_el">Формат:  <?=$arResult["PROPERTIES"]["FORMAT"]["VALUE"]?> мм</div>
					</div>
				</div>
			</div>
		</div>

		<div class="about_produce_bl">
			<div class="about_produce_tit">О книге «<?=$arResult['NAME']?>»</div>
			<div class="about_produce_txt">
				<?=$arResult['DETAIL_TEXT']?>
			</div>
		</div>

	</div>								
</div>
<div class="gray_bg application_form_bl">
		<div class="standart_width">
			<div class="h1">Смотрите также</div>
			<div class="catalog_list">
			<?$APPLICATION->IncludeComponent(
				"bitrix:news.list",
				"books_list",
				Array(
					"ACTIVE_DATE_FORMAT" => "d.m.Y",
					"ADD_SECTIONS_CHAIN" => "N",
					"AJAX_MODE" => "N",
					"AJAX_OPTION_ADDITIONAL" => "",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"CACHE_FILTER" => "N",
					"CACHE_GROUPS" => "Y",
					"CACHE_TIME" => "36000000",
					"CACHE_TYPE" => "A",
					"CHECK_DATES" => "Y",
					"DETAIL_URL" => "",
					"DISPLAY_BOTTOM_PAGER" => "N",
					"DISPLAY_DATE" => "N",
					"DISPLAY_NAME" => "Y",
					"DISPLAY_PICTURE" => "Y",
					"DISPLAY_PREVIEW_TEXT" => "N",
					"DISPLAY_TOP_PAGER" => "N",
					"FIELD_CODE" => array("",""),
					"FILTER_NAME" => "",
					"HIDE_LINK_WHEN_NO_DETAIL" => "N",
					"IBLOCK_ID" => "8",
					"IBLOCK_TYPE" => "catalog",
					"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
					"INCLUDE_SUBSECTIONS" => "N",
					"MESSAGE_404" => "",
					"NEWS_COUNT" => "6",
					"PAGER_BASE_LINK_ENABLE" => "N",
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "N",
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_TEMPLATE" => ".default",
					"PAGER_TITLE" => "Новости",
					"PARENT_SECTION" => "",
					"PARENT_SECTION_CODE" => "",
					"PREVIEW_TRUNCATE_LEN" => "",
					"PROPERTY_CODE" => array("ACTIONS","NEW","BEST","REVIEW","PRICE","DISCOUNT","AUTHOR",""),
					"SET_BROWSER_TITLE" => "N",
					"SET_LAST_MODIFIED" => "N",
					"SET_META_DESCRIPTION" => "N",
					"SET_META_KEYWORDS" => "N",
					"SET_STATUS_404" => "N",
					"SET_TITLE" => "N",
					"SHOW_404" => "N",
					"SORT_BY1" => "SORT",
					"SORT_BY2" => "SORT",
					"SORT_ORDER1" => "DESC",
					"SORT_ORDER2" => "ASC",
					"STRICT_SECTION_CHECK" => "N",
					"FAVORITE" => json_decode($_COOKIE['favorite']),
				)
			);?><br>		
			</div>
		</div>
</section>