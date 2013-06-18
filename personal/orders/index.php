<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");
?><?$APPLICATION->IncludeComponent("bitrix:sale.personal.order", ".default", Array(
	"SEF_MODE" => "N",	// Включить поддержку ЧПУ
	"ORDERS_PER_PAGE" => "20",	// Количество заказов на одной странице
	"PATH_TO_PAYMENT" => "payment.php",	// Страница подключения платежной системы
	"PATH_TO_BASKET" => "basket.php",	// Страница с корзиной
	"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
	"SAVE_IN_SESSION" => "Y",	// Сохранять установки фильтра в сессии пользователя
	"NAV_TEMPLATE" => "",	// Имя шаблона для постраничной навигации
	"PROP_1" => "",	// Не показывать свойства для типа плательщика "Общий" (s1)
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>