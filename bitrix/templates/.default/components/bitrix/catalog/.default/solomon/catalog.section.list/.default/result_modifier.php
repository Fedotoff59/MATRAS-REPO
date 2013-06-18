<?
$cp = $this->__component;
if (is_object($cp))
{
//echo "COMP";
$cp->arResult['CUR_PAGE'] = $APPLICATION->GetCurPage(false);
$cp->arResult['TRADEMARK'] = $_REQUEST["TRADEMARK"];
$cp->SetResultCacheKeys(array('CUR_PAGE','TRADEMARK'));
$arResult["CUR_PAGE"] = $cp->arResult['CUR_PAGE'];
$arResult["TRADEMARK"] = $cp->arResult['TRADEMARK'];
}

?>