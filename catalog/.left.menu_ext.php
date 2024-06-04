<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

global $APPLICATION;

if (!function_exists("GetTreeRecursive"))
{
	$aMenuLinksExt = $APPLICATION->IncludeComponent(
		"bitrix:menu.sections",
		"",
		Array(
			"CACHE_TIME" => "36000000",
			"CACHE_TYPE" => "A",
			"DEPTH_LEVEL" => "2",
			"IBLOCK_ID" => "8",
			"IBLOCK_TYPE" => "catalog",
			"IS_SEF" => "Y",
			"DETAIL_PAGE_URL" => "",
			"SECTION_PAGE_URL" => "#SECTION_CODE#/",
			"SEF_BASE_URL" => "/catalog/"
		), false
	);
	$aMenuLinks = array_merge($aMenuLinksExt,$aMenuLinks);
}
?>