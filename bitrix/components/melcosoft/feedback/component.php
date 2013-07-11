<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();


if (!is_array($arParams["EMAIL_FIELDS"]))
    $arParams["EMAIL_FIELDS"] = array();

global $USER;

$arResult = array();

$arResult["AJAX"] = $_REQUEST['ms_ajax'] == "Y" ? true : false;

$arParams["EVENT_ID"] = intval($arParams["EVENT_ID"]);
$rsEM = CEventMessage::GetByID($arParams["EVENT_ID"]);
if (!$arEM = $rsEM->Fetch()) {
    ShowError("Событие не найдено");
    return 0;
}

$arResult["EVENT"] = $arEM;

if ($arResult["AJAX"])
    $APPLICATION->RestartBuffer();

$arResult["FORM_ERROR"] = false;

if (check_bitrix_sessid() && $_POST["fl_id"] == $arResult["EVENT"]["ID"]) {
    $arEventFields = array();
    foreach ($_POST as $name => $value) {
        if (substr($name, 0, 3) == 'MS_') {
            $value = trim($value);

            if (in_array(substr($name, 3), $arParams["EMAIL_FIELDS"])) {
                if (!check_email($value))
                {
                    $arResult["FORM_ERROR"] = true;
                    $arResult["FORM_ERROR_MSG"] = "Указан неправильный E-Mail";
                }
            } else {

                if (strlen($value) == 0) {
                    $arResult["FORM_ERROR"] = true;
                    $arResult["FORM_ERROR_MSG"] = "Все поля обязательны для заполнения";
                }
            }
            $arEventFields[substr($name, 3)] = $value;
        }
    }

    $arResult["FORM"] = $arEventFields;

    if ($arParams["USE_GUEST_CAPTCHA"] && !$USER->IsAuthorized()) {
        if (!$arResult["FORM_ERROR"] && !$APPLICATION->CaptchaCheckCode($_POST["CAPTCHA"], $_POST["captcha_sid"])) {
            $arResult["FORM_ERROR"] = true;
            $arResult["FORM_ERROR_MSG"] = "Неверно введены символы с картинки";
        }
    }

    if (!$arResult["FORM_ERROR"]) {
        $id = CEvent::Send(
                        $arResult["EVENT"]["EVENT_NAME"], SITE_ID, $arResult["FORM"], "Y", $arResult["EVENT"]["ID"]
        );

        $arResult["EVENT_SEND_ID"] = $id;

        if ($arParams["WRITE_IBLOCK"] == "Y" && CModule::IncludeModule("iblock")) {

            $PROP = array();

            $properties = CIBlockProperty::GetList(array(), array("IBLOCK_ID" => $arParams["IBLOCK_ID"]));
            while ($prop_fields = $properties->GetNext()) {
                if (isset($arResult["FORM"][$prop_fields["CODE"]])) {
                    if ($prop_fields["USER_TYPE"] == "HTML") {
                        $PROP[$prop_fields["CODE"]] = array("VALUE" => array(
                                "TYPE" => "text",
                                "TEXT" => $arResult["FORM"][$prop_fields["CODE"]],
                        ));
                    }
                    else
                        $PROP[$prop_fields["CODE"]] = $arResult["FORM"][$prop_fields["CODE"]];
                }
            }

            $arFind = array();
            $arReplace = array();
            foreach ($arResult["FORM"] as $key => $value) {
                $arFind[] = "#" . $key . "#";
                $arReplace[] = $value;
            }
            $ELEMENT_NAME = str_replace(
                    $arFind, $arReplace, $arParams["ELEMENT_NAME"]
            );


            $el = new CIBlockElement;

            //$PROP = $arResult["FORM"];

            $arLoadProductArray = Array(
                "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                "PROPERTY_VALUES" => $PROP,
                "NAME" => $ELEMENT_NAME,
                "ACTIVE" => "Y", // активен
            );

            $el->Add($arLoadProductArray);
        }
        
        if ($arParams["REDIRECT_IF_SUCCESS"] === "Y")
        {
            LocalRedirect($arParams["REDIRECT_URL"]);
        }

        unset($arResult["FORM"]);
    }
}
if ($arParams["USE_GUEST_CAPTCHA"] && !$USER->IsAuthorized()) {
    $arResult["CAPTCHACode"] = $APPLICATION->CaptchaGetCode();
    $arResult["CAPTCHA_IMAGE"] = "<input type=\"hidden\" name=\"captcha_sid\" value=\"" . htmlspecialcharsbx($arResult["CAPTCHACode"]) . "\" /><img src=\"/bitrix/tools/captcha.php?captcha_sid=" . htmlspecialcharsbx($arResult["CAPTCHACode"]) . "\" width=\"180\" height=\"40\" />";
}
?>
<div id="callback" class="form">
<form name="feedback" <? if (!empty($arParams["FORM_ID"])): ?> id="<?= $arParams["FORM_ID"] ?>"<? endif; ?> action="<?= POST_FORM_ACTION_URI ?>" method="POST" enctype="multipart/form-data">
<?= bitrix_sessid_post() ?>
    <input type="hidden" name="fl_id" id="fl_id" value="<?= $arResult["EVENT"]["ID"] ?>" />
    <?
    $this->IncludeComponentTemplate();
    ?>
</form>
</div><!-- #callback -->
<?
if ($arResult["AJAX"])
    die();
?>