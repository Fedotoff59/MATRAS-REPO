<?
/*
You can place here your functions and event handlers

AddEventHandler("module", "EventName", "FunctionName");
function FunctionName(params)
{
	//code
}
*/
AddEventHandler("iblock", "OnBeforeIBlockElementAdd", array("CheckGoodsFields", "CheckGoodsFieldsTrademark")); 
AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", array("CheckGoodsFields", "CheckGoodsFieldsTrademark"));

class CheckGoodsFields 
{ 
   public function CheckGoodsFieldsTrademark (&$arFields) 
   {    
        if($arFields['IBLOCK_ID'] == 6):
        $arCollection = $arFields['PROPERTY_VALUES'][38]; // Свойство привязки к коллекции
        if (is_array($arCollection) && !empty($arCollection))
            foreach ($arCollection as $Collection)
                $COLLECTION_ID = $Collection['VALUE'];
        if(isset($COLLECTION_ID) && $COLLECTION_ID > 0) {
           $SECTION_ID = $arFields['PROPERTY_VALUES'][21][0]; // Свойство привязки к разделу (торговой марке)
            // Смотрим в каком разделе у нас лежит коллекция
            $db_groups = CIBlockElement::GetElementGroups($COLLECTION_ID, true);
            $ar_group = $db_groups->Fetch();
            if ($ar_group["ID"] != $SECTION_ID) {
                // Если привязка к разделу (торговой марке) и родительский раздел коллекции не совпадают
                // не даем сохранять
                //AddMessage2Log('$arFields = '.print_r($arFields, true),'');
                //AddMessage2Log('$SECTION_ID = '.print_r($SECTION_ID, true),'');
                //AddMessage2Log('$ar_group = '.print_r($ar_group, true),'');
                global $APPLICATION;
                $APPLICATION->throwException("Выбранная коллекция не соответствует торговой марке.");
                return false;
            }
            
        }
        // Если не установлены торговые предложения - деактивируем элемент
        $arSelect = Array("ID", "PROPERTY_CML2_LINK");
        $arFilter = Array("IBLOCK_ID" => 13, "ACTIVE"=>"Y", "PROPERTY_CML2_LINK" => $arFields['ID']);
        $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
        while ($ob = $res->GetNextElement()) {
            $arElFields = $ob->GetFields();
            $ar_res = CPrice::GetBasePrice($arElFields['ID']);
            $arPrice[] = floatval($ar_res['PRICE']);
        }
        $arFields['ACTIVE'] = (is_array($arPrice) && !empty($arPrice)) ? 'Y' : 'N';
        endif;
   } 
}

class CSKUProps {
    public function GetSKUProps($PRODUCT_ID = false) {
        $SKUProps = false;
        if(CModule::IncludeModule("catalog")):
        $arSelect = Array("ID", "PROPERTY_CML2_LINK", "PROPERTY_WIDTH", "PROPERTY_HEIGHT", "PROPERTY_LENGTH");
        if(($PRODUCT_ID !== false) && ($PRODUCT_ID > 0))
            $arFilter = Array("IBLOCK_ID" => 13, "ACTIVE" => "Y", "ID" => $PRODUCT_ID);
            else $arFilter = Array("IBLOCK_ID" => 13, "ACTIVE" => "Y");
        $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
        while ($ob = $res->GetNextElement()) {
            $arOfferFields = $ob->GetFields();
            $ar_res = CPrice::GetBasePrice($arOfferFields['ID']);
            $arPrices[] = floatval($ar_res['PRICE']);
            $stSizes = $arOfferFields['PROPERTY_HEIGHT_VALUE'].' x '.$arOfferFields['PROPERTY_LENGTH_VALUE'].' x '.$arOfferFields['PROPERTY_WIDTH_VALUE'].' см';
            $arFormatSizes[] = $stSizes;
            $arParentProductLink[] = $arOfferFields['PROPERTY_CML2_LINK_VALUE'];
        }
        $SKUProps['PRICES'] = $arPrices;
        $SKUProps['FORMAT_SIZES'] = $arFormatSizes;
        $SKUProps['CML2_LINK'] = $arParentProductLink;
        endif;
        return $SKUProps;
    }
}
AddEventHandler("main", "OnEpilog", Array("CMelcosoft", "Redirect404"));

class CMelcosoft {

    function Redirect404() {
        if (
                !defined('ADMIN_SECTION') &&
                defined("ERROR_404")
        ) {
            //LocalRedirect("/404.php", "404 Not Found");
            
            global $APPLICATION;
            
            $APPLICATION->RestartBuffer();
            CHTTP::SetStatus("404 Not Found");
            include($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . "/header.php");
            include($_SERVER["DOCUMENT_ROOT"] . "/404.php");
            include($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . "/footer.php");
        }
    }

}
define(IB_GOODS_ID, 6);
?>