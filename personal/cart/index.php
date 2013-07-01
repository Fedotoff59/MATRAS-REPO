<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");
?><?$APPLICATION->IncludeComponent("matre:sale.basket.basket", ".default", array(
	"COLUMNS_LIST" => array(
		0 => "QUANTITY",
		1 => "DELETE",
	),
	"PATH_TO_ORDER" => "/personal/order/",
	"HIDE_COUPON" => "N",
	"QUANTITY_FLOAT" => "N",
	"PRICE_VAT_SHOW_VALUE" => "N",
	"COUNT_DISCOUNT_4_ALL_QUANTITY" => "N",
	"USE_PREPAYMENT" => "N",
	"SET_TITLE" => "Y",
	"RESIZE_PREVIEW" => "Y",
	"RESIZE_PREVIEW_WIDTH" => "46",
	"RESIZE_PREVIEW_HEIGHT" => "50",
	"GET_DETAIL_PICTURE" => "Y"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>