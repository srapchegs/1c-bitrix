<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("TITLE", "О компании");
$APPLICATION->SetTitle("О компании");
?>
<section>
    
            <div class="small_standart_width">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => SITE_TEMPLATE_PATH.'/include/inc_about_upper_text.php'
                    )
                );?>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => SITE_TEMPLATE_PATH.'/include/inc_about_middle_img.php'
                    )
                );?>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => SITE_TEMPLATE_PATH.'/include/inc_about_bottom_text.php'
                    )
                );?>
            </div>
        </div>
    </div>
    <div class="gray_bg application_form_bl">
        <div class="standart_width">
            <div class="title">Отправить заявку</div>
            <div class="small_standart_width">
                <div class="application_form">
                    <form>
                        <div class="application_el textarea">
                            <textarea placeholder="Вопрос или сообщение"></textarea>
                        </div>
                        <div class="application_el">
                            <input type="text" placeholder="Ваше имя"/>
                        </div>
                        <div class="application_el">
                            <input class="error" type="email" placeholder="Email"/>
                        </div>
                        <div class="application_el">
                            <input class="true" type="tel" placeholder="Телефон"/>
                        </div>
                        <div class="popup_form prava styler">
                            <label>
                                <input type="checkbox"/>
                                <span>Я принимаю <a href="">условия передачи данных</a></span>
                            </label>
                        </div>
                        <div class="application_bt">
                            <a class="red_bt" href="">Отправить</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>