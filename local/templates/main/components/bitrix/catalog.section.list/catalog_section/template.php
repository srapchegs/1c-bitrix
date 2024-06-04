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

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));
?>
<div class="razdel_list">
<?foreach ($arResult['SECTIONS'] as &$arSection)
{
	$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
	$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
	?>
	<a class="razdel_el" href="<?=$arSection['SECTION_PAGE_URL']?>" id="<?=$this->GetEditAreaId($arSection['ID'])?>">
		<span class="razdel_cont">
			<span class="razdel_img"><img src="<?=$arSection['PICTURE']['SRC']?>" alt=""/></span>
			<span class="razdel_tit"><?=$arSection['NAME']?></span>
		</span>
		<span class="razdel_pop">
			<span class="blue_bt">Перейти в раздел</span>
		</span>
	</a>
<?}
unset($arSection);
?>
</div>
