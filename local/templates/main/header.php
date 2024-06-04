<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
<!DOCTYPE html>
<html>
<head>
	<?$APPLICATION->ShowHead();?>
	<title><?$APPLICATION->ShowTitle(false);?></title>
	<link href='<?=SITE_TEMPLATE_PATH?>/assets/css/screen.css' rel='stylesheet' type='text/css' >
	<link href='<?=SITE_TEMPLATE_PATH?>/assets/font/font.css' rel='stylesheet' type='text/css' >
	<link href='<?=SITE_TEMPLATE_PATH?>/assets/css/jquery.fancybox.css' rel='stylesheet' type='text/css' >
	<link href='<?=SITE_TEMPLATE_PATH?>/assets/css/jquery.bxslider.css' rel='stylesheet' type='text/css' >
	<link href='<?=SITE_TEMPLATE_PATH?>/assets/css/jquery.formstyler.css' rel='stylesheet' type='text/css' >
	<link href='<?=SITE_TEMPLATE_PATH?>/assets/css/jquery.formstyler.theme.css' rel='stylesheet' type='text/css' >
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/assets/js/jquery-3.1.1.min.js")?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/assets/js/jquery.fancybox.min.js")?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/assets/js/jquery.bxslider.min.js")?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/assets/js/jquery.formstyler.min.js")?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/assets/js/main.js")?>
	<?php 
		if(json_decode($_COOKIE['favorite'])){
			$arFavorite = ['ID'=> json_decode($_COOKIE['favorite'])];
			$iCountFavorite = count($arFavorite['ID']);
		}
	?>
</head>
<body>
	<div id='panel'>
		<?$APPLICATION->ShowPanel();?>
	</div>
	<header>
		<div class='top_head_white_bl'>
			<div class='standart_width'>
				<div class='top_head_logo'>
				<?$APPLICATION->IncludeComponent(
					'bitrix:main.include',
					'',
					Array(
						'AREA_FILE_SHOW' => 'file',
						'AREA_FILE_SUFFIX' => 'inc',
						'EDIT_TEMPLATE' => '',
						'PATH' => SITE_TEMPLATE_PATH.'/include/inc_logo.php'
					)
				);?>
				</div>
				<div class='top_head_tel_bl'>
					<div class='top_head_tel'>
					<?$APPLICATION->IncludeComponent(
						'bitrix:main.include',
						'',
						Array(
							'AREA_FILE_SHOW' => 'file',
							'AREA_FILE_SUFFIX' => 'inc',
							'EDIT_TEMPLATE' => '',
							'PATH' => SITE_TEMPLATE_PATH.'/include/inc_phone.php'
						)
					);?>
						<span>
						<?$APPLICATION->IncludeComponent(
							'bitrix:main.include',
							'',
							Array(
								'AREA_FILE_SHOW' => 'file',
								'AREA_FILE_SUFFIX' => 'inc',
								'EDIT_TEMPLATE' => '',
								'PATH' => SITE_TEMPLATE_PATH.'/include/inc_time.php'
							)
						);?></span>
					</div>
				</div>
				
				<div class='top_head_bt'><div class='top_head_favor_bl'>
					<div class='top_head_favor'>
					<?if(json_decode($_COOKIE['favorite'])):?>
						<a href='/catalog/favorite/'>Избранное</a><span><?=$iCountFavorite?></span>
					<?else:?>
						<a href='/catalog/favorite/'>Избранное</a>
					<?endif;?>
					</div>
				</div></div>
			</div>
		</div>
		<div class='blue_head_info_bl'>
			<div class='standart_width clear_after'>
				<div class='header_menu_bl'>
				<?$APPLICATION->IncludeComponent("bitrix:menu", "header_menu", Array(
					"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
						"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
						"DELAY" => "N",	// Откладывать выполнение шаблона меню
						"MAX_LEVEL" => "3",	// Уровень вложенности меню
						"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
						"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
						"MENU_CACHE_TYPE" => "A",	// Тип кеширования
						"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
						"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
						"USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
						"COMPONENT_TEMPLATE" => "horizontal_multilevel"
					),
					false
				);?>
					
				</div>
				<div class='head_search_bl'>
					<?$APPLICATION->IncludeComponent("bitrix:search.title", "search_form", Array(
						"CATEGORY_0" => array(	// Ограничение области поиска
								0 => "iblock_info",
								1 => "iblock_catalog",
							),
							"CATEGORY_0_TITLE" => "",	// Название категории
							"CATEGORY_0_iblock_catalog" => array(	// Искать в информационных блоках типа "iblock_catalog"
								0 => "all",
							),
							"CATEGORY_0_iblock_info" => array(	// Искать в информационных блоках типа "iblock_info"
								0 => "all",
							),
							"CHECK_DATES" => "N",	// Искать только в активных по дате документах
							"CONTAINER_ID" => "title-search",	// ID контейнера, по ширине которого будут выводиться результаты
							"INPUT_ID" => "title-search-input",	// ID строки ввода поискового запроса
							"NUM_CATEGORIES" => "1",	// Количество категорий поиска
							"ORDER" => "date",	// Сортировка результатов
							"PAGE" => "#SITE_DIR#search/",	// Страница выдачи результатов поиска (доступен макрос #SITE_DIR#)
							"SHOW_INPUT" => "Y",	// Показывать форму ввода поискового запроса
							"SHOW_OTHERS" => "N",	// Показывать категорию "прочее"
							"TOP_COUNT" => "5",	// Количество результатов в каждой категории
							"USE_LANGUAGE_GUESS" => "Y",	// Включить автоопределение раскладки клавиатуры
						),
						false
					);?>
				</div>
			</div>
		</div>
		<? if($APPLICATION->GetCurPage() !== SITE_DIR): ?>
		<div class="bread_crumbs_bl">
			<div class="standart_width">
				<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "breadcrumbs", Array(
						"PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
						"SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
						"START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
					)
				);?>
			</div>
		</div>
		
		
				<?endif;?>
	</header>
	<? if($APPLICATION->GetCurPage() !== SITE_DIR): $title = $APPLICATION->GetPageProperty("title"); ?>
	<div class="white_bg">
		<div class="standart_width">	
			<h1><?=$APPLICATION->ShowTitle($APPLICATION->GetPageProperty("title"))?></h1>
		<?endif;?>
</body>
</html>