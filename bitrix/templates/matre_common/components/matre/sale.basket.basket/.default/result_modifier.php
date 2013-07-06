<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
if (!CModule::IncludeModule("iblock"))
    return;

foreach ($arResult["ITEMS"]["AnDelCanBuy"] as &$arItem) {
    $arItem['PROPS'] = CSKUProps::GetSKUProps($arItem['PRODUCT_ID']);
    $db_props = CIBlockElement::GetProperty(6, $arItem['PROPS']['CML2_LINK'][0], array("sort" => "asc"), Array("CODE"=>"MATREBASE"));
    if($ar_props = $db_props->Fetch())
        $arItem['PROPS']['MATREBASE'] = $ar_props['VALUE_ENUM'];
}
?>