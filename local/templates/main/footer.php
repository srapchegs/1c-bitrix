<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
	</div>
</div>
	<footer>
		<div class='foot_info_bl'>
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
				<div class='foot_menu'>
					<?$APPLICATION->IncludeComponent(
						'bitrix:menu',
						'bottom_menu',
						Array(
							'ALLOW_MULTI_SELECT' => 'N',
							'CHILD_MENU_TYPE' => 'left',
							'DELAY' => 'N',
							'MAX_LEVEL' => '1',
							'MENU_CACHE_GET_VARS' => array(''),
							'MENU_CACHE_TIME' => '3600',
							'MENU_CACHE_TYPE' => 'A',
							'MENU_CACHE_USE_GROUPS' => 'Y',
							'ROOT_MENU_TYPE' => 'top',
							'USE_EXT' => 'N'
						)
					);?>
				</div>
				<div class='top_head_bt'>
					<div class='foot_tel'>
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
					<div class='top_head_favor'>
					<?if(json_decode($_COOKIE['favorite'])):?>
						<a href='/catalog/favorite/'>Избранное</a><span><?=$iCountFavorite?></span>
					<?else:?>
						<a href='/catalog/favorite/'>Избранное</a>
					<?endif;?>
					</div>
				</div>
				</div>
			</div>
		</div>
	</footer>
</body>
</html>
