<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");
?><?$APPLICATION->IncludeComponent("bitrix:main.profile", ".default", Array(
	"USER_PROPERTY_NAME" => "",	// Название закладки с доп. свойствами
	"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
	"AJAX_MODE" => "N",	// Включить режим AJAX
	"USER_PROPERTY" => "",	// Показывать доп. свойства
	"SEND_INFO" => "N",	// Генерировать почтовое событие
	"CHECK_RIGHTS" => "N",	// Проверять права доступа
	"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
	"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
	"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>