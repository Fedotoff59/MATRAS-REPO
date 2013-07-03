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
        $arCollection = $arFields['PROPERTY_VALUES'][38]; // �������� �������� � ���������
        if (is_array($arCollection) && !empty($arCollection))
            foreach ($arCollection as $Collection)
                $COLLECTION_ID = $Collection['VALUE'];
        if(isset($COLLECTION_ID) && $COLLECTION_ID > 0) {
            $arSID = $arFields['PROPERTY_VALUES'][21]; // �������� �������� � ������� (�������� �����)
                foreach ($arSID as $SID)
                    $SECTION_ID = $SID['VALUE'];
            // ������� � ����� ������� � ��� ����� ���������
            $db_groups = CIBlockElement::GetElementGroups($COLLECTION_ID, true);
            $ar_group = $db_groups->Fetch();
            if ($ar_group["ID"] != $SECTION_ID) {
                // ���� �������� � ������� (�������� �����) � ������������ ������ ��������� �� ���������
                // �� ���� ���������
                global $APPLICATION;
                $APPLICATION->throwException("��������� ��������� �� ������������� �������� �����.");
                return false;
            }
            
        } 
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