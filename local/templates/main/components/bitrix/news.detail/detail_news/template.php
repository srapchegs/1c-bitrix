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
	<div class="small_standart_width">
		<img align="center" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"/>
		<p><?=$arResult["PREVIEW_TEXT"]?></p>
			<div class="news_det_info clear_after">
						<div class="news_det_data"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></div>
						<div class="news_det_look"><?=intval($arResult["SHOW_COUNTER"])?></div>
			</div>
	</div>