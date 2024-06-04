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
foreach($arResult["ITEMS"] as $arItem):
	$iPrice = 0;
	$iNewPrice = 0;
	$fDiscount = 0;
	$iPrice = intval($arItem["DISPLAY_PROPERTIES"]["PRICE"]["DISPLAY_VALUE"]);
	$iDiscount = intval($arItem["DISPLAY_PROPERTIES"]["DISCOUNT"]["DISPLAY_VALUE"]);
	$iNewPrice = intval($iPrice - $iPrice*($iDiscount/100));
	$iStars = intval($arItem["DISPLAY_PROPERTIES"]["REVIEW"]["DISPLAY_VALUE"]);
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="catalog_el">
		
				<div class="cat_el_img" id="<?=$this->GetEditAreaId($arItem['ID'])?>">
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"/></a>
					<div class="cat_el_status">
						<?if($arItem["DISPLAY_PROPERTIES"]["ACTIONS"]["DISPLAY_VALUE"] !== null ):?>
						<div class="red">
							 акция
						</div>
						<?endif;?>
						<?if($arItem["DISPLAY_PROPERTIES"]["NEW"]["DISPLAY_VALUE"] !== null ):?>
						<div class="green">
							 новинка
						</div>
						<?endif;?>
						<?if($arItem["DISPLAY_PROPERTIES"]["BEST"]["DISPLAY_VALUE"] !== null ):?>
						<div class="blue">
							 бестселлер
						</div>
						<?endif;?>
					</div>
				</div>
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
				<? if($arItem["DISPLAY_PROPERTIES"]["DISCOUNT"]["DISPLAY_VALUE"] !== null ):?>
				<div class="cat_el_price">
					<div class="cat_price">
						<?=$iNewPrice;?> руб.
					</div>
					<div class="cat_old_price">
						<div class="price">
							<?=$iPrice?> руб.
						</div>
						<div class="sale">
							 -<?=$iDiscount;?>%
						</div>
					</div>
				</div>
				<?else:?>
					<div class="cat_el_price">
					<div class="cat_price">
						<?=$iPrice?> руб.
					</div>
				</div>
				<?endif;?>
				<div class="cat_el_name">
					<div class="cat_el_tit">
						<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><b><?echo $arItem["NAME"]?></b></a><br />
					</div>						
					 <? if(is_array($arItem["DISPLAY_PROPERTIES"]["AUTHOR"]["DISPLAY_VALUE"]) ):?> 
						<?foreach($arItem["DISPLAY_PROPERTIES"]["AUTHOR"]["DISPLAY_VALUE"] as $arAuthor):?>
							<div class="cat_el_avtor">
								<?=$arAuthor?>
							</div>
						<?endforeach?>
					<?else:?>
						<div class="cat_el_avtor">
								<?=$arItem["DISPLAY_PROPERTIES"]["AUTHOR"]["DISPLAY_VALUE"]?>
						</div>
					<?endif;?>
				</div>
 				<a class="favor_bt <?=(in_array($arItem['ID'], $arParams['FAVORITE'])) ? 'active' : '';?>" data-id=<?=$arItem['ID']?> href="">В избранное</a>
			</div>
		
		<?if($arItem["DISPLAY_PROPERTIES"]["URL"]["DISPLAY_VALUE"]!=null):?>
			<a class='red_bt' href='<?=$arItem["DISPLAY_PROPERTIES"]["URL"]["DISPLAY_VALUE"];?>'><?=$arItem["DISPLAY_PROPERTIES"]["TEXT_URL"]["DISPLAY_VALUE"];?></a>
		<?endif?>

<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
