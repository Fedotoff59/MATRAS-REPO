<?

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

if (!CModule::IncludeModule("iblock"))
    return;

$arEvents = array();

$arFilter = Array(
);
$rsMess = CEventMessage::GetList($by = "site_id", $order = "desc", $arFilter);
while ($arMess = $rsMess->GetNext()) {
    $arEvents[$arMess["ID"]] = $arMess["ID"] . " - " . $arMess["SUBJECT"];
}

$arEventFields = array();
if (intval($arCurrentValues["EVENT_ID"]) > 0) {
    $rsEM = CEventMessage::GetByID($arCurrentValues["EVENT_ID"]);
    if ($arEM = $rsEM->Fetch()) {
        $rsET = CEventType::GetByID($arEM["EVENT_NAME"], SITE_ID);
        if ($arET = $rsET->Fetch()) {
            $cnt = preg_match_all("|#(.*)#( *)-( *)(.*)|m", $arET["DESCRIPTION"], $match);
            for ($i = 0; $i < $cnt; $i++) {
                $arEventFields[$match[1][$i]] = $match[4][$i];
            }
        }
    }
}

$arTypes = CIBlockParameters::GetIBlockTypes();

$arIBlocks = Array();
$db_iblock = CIBlock::GetList(Array("SORT" => "ASC"), Array("SITE_ID" => $_REQUEST["site"], "TYPE" => ($arCurrentValues["IBLOCK_TYPE"] != "-" ? $arCurrentValues["IBLOCK_TYPE"] : "")));
while ($arRes = $db_iblock->Fetch())
    $arIBlocks[$arRes["ID"]] = $arRes["NAME"];

$arComponentParameters = array(
    "GROUPS" => array(
    ),
    "PARAMETERS" => array(
        "AJAX_MODE" => array(),
        "EVENT_ID" => Array(
            "PARENT" => "BASE",
            "NAME" => "Почтовое событие",
            "TYPE" => "LIST",
            "VALUES" => $arEvents,
            "DEFAULT" => "0",
            "REFRESH" => "Y",
        ),
        "EMAIL_FIELDS" => Array(
            "NAME" => "Поле EMail",
            "TYPE" => "LIST",
            "MULTIPLE" => "Y",
            "VALUES" => $arEventFields,
            "DEFAULT" => "",
            "COLS" => 25,
            "PARENT" => "BASE",
        ),
        "WRITE_IBLOCK" => array(
            "PARENT" => "BASE",
            "NAME" => "Записывать в инфоблок форму",
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "N",
        ),
        "IBLOCK_ID" => Array(
            "PARENT" => "BASE",
            "NAME" => "Инфоблок",
            "TYPE" => "LIST",
            "VALUES" => $arIBlocks,
            "DEFAULT" => '',
            "ADDITIONAL_VALUES" => "Y",
            "REFRESH" => "Y",
        ),
        "ELEMENT_NAME" => Array(
            "PARENT" => "BASE",
            "NAME" => "Название нового элемента",
            "TYPE" => "STRING",
            "DEFAULT" => 'Форма обратной связи',
        ),
        "USE_GUEST_CAPTCHA" => Array(
            "PARENT" => "BASE",
            "NAME" => "CAPTCHA для гостей",
            "TYPE" => "CHECKBOX",
            "DEFAULT" => 'N',
        ),
        "FORM_ID" => Array(
            "PARENT" => "BASE",
            "NAME" => "ID формы",
            "TYPE" => "STRING",
            "DEFAULT" => '',
        ),
        "REDIRECT_IF_SUCCESS" => Array(
            "PARENT" => "BASE",
            "NAME" => "Redirect при отправке формы",
            "TYPE" => "CHECKBOX",
            "DEFAULT" => 'N',
        ),
        "REDIRECT_URL" => Array(
            "PARENT" => "BASE",
            "NAME" => "URL Редиректа",
            "TYPE" => "STRING",
        ),
    ),
);
?>
