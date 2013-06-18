<?
/*
You can place here your functions and event handlers

AddEventHandler("module", "EventName", "FunctionName");
function FunctionName(params)
{
	//code
}
*/

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
?>