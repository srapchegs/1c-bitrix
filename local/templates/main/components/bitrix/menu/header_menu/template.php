<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul class='header_menu'>
<?
$previousLevel = 0;
foreach($arResult as $arItem):?>

	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

	<?if ($arItem["IS_PARENT"]):?>

		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			<li><a href="<?=$arItem["LINK"]?>" class="menu_lvl1_bt arrow <?if ($arItem["SELECTED"]):?>active<?endif;?>"><span><?=$arItem["TEXT"]?></span></a>
				<ul class='menu_lvl2'>
		<?else:?>
			<li><a href="<?=$arItem["LINK"]?>" class="menu_lvl2_bt arrow <?if ($arItem["SELECTED"]):?>active<?endif;?>"><?=$arItem["TEXT"]?></a>
				<ul class='menu_lvl3'>
		<?endif?>

	<?else:?>

		<?if ($arItem["PERMISSION"] > "D"):?>
			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li><a href="<?=$arItem["LINK"]?>" class="menu_lvl1_bt <?if ($arItem["SELECTED"]):?>active<?endif;?>"><span><?=$arItem["TEXT"]?></span></a></li>
			<?elseif ($arItem["DEPTH_LEVEL"] == 2):?>
				<li><a href="<?=$arItem["LINK"]?>" class="menu_lvl2_bt <?if ($arItem["SELECTED"]):?>active<?endif;?>"><span><?=$arItem["TEXT"]?></span></a></li>
			<?else:?>
				<li><a <?if ($arItem["SELECTED"]):?> class="active"<?endif?> href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>
		<?endif?>

	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>

</ul>
<div class="menu-clear-left"></div>
<?endif?>