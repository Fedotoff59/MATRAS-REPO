<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

//delayed function must return a string
if(empty($arResult))
	return "";

global $APPLICATION;

$strReturn = '<div class="navigation">';

for($index = 0, $itemSize = count($arResult); $index < $itemSize; $index++)
{
	if($index > 0)
		$strReturn .= '<i></i>';

	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	if($arResult[$index]["LINK"] <> $APPLICATION->GetCurPage(false)) {
		$strReturn .= '<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'">'.$title.'</a>';
                $strReturn .= ($index != $itemSize - 1) ? '<span>»</span>' : '';
        }
	else
		$strReturn .= $title;
}

$strReturn .= '</div>';
return $strReturn;
?>
