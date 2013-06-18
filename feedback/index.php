<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Форма обратной связи");
?><?$APPLICATION->IncludeComponent("melcosoft:feedback", ".default", array(
	"EVENT_ID" => "7",
	"EMAIL_FIELDS" => array(
		0 => "AUTHOR_EMAIL",
	),
	"WRITE_IBLOCK" => "Y",
	"IBLOCK_ID" => "9",
	"ELEMENT_NAME" => "#AUTHOR# - #AUTHOR_EMAIL#",
	"USE_GUEST_CAPTCHA" => "Y",
	"FORM_ID" => "feedback",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>