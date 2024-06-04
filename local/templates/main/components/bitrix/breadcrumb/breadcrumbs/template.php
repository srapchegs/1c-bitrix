<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";

$itemSize = count($arResult);
$strReturn = "<ul class='bread_crumbs not_style'>"; 
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	{
		$strReturn .= '
				<li><a href="'.$arResult[$index]["LINK"].'" >
					'.$title.'
				</a></li>
			';
	}
	else
	{
		$strReturn .= '
				<li>'.$title.'</li>'
			;
	}
}
$strReturn .= "</ul>";
return $strReturn;
