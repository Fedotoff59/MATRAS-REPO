<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<h3>Каталог товаров</h3>
<ul>
<?
$CURRENT_DEPTH=$arResult["SECTION"]["DEPTH_LEVEL"]+1;
$strTitle = "";
$numSec = count($arResult["SECTIONS"]);
foreach($arResult["SECTIONS"] as $i => $arSection):
        $i++;
	$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
	$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));

	if($CURRENT_DEPTH<$arSection["DEPTH_LEVEL"])
		echo "<ul>";
	elseif($CURRENT_DEPTH>$arSection["DEPTH_LEVEL"])
		echo str_repeat("</ul>", $CURRENT_DEPTH - $arSection["DEPTH_LEVEL"]);
	$CURRENT_DEPTH = $arSection["DEPTH_LEVEL"];

	$count = $arParams["COUNT_ELEMENTS"] && $arSection["ELEMENT_CNT"] ? "&nbsp;(".$arSection["ELEMENT_CNT"].")" : "";

	if ($_REQUEST['SECTION_ID']==$arSection['ID'])
	{
		$link = '<strong>'.$arSection["NAME"].$count.'</strong>';
		$strTitle = $arSection["NAME"];
	}
	else
		$link = '<a href="'.$arSection["SECTION_PAGE_URL"].'">'.$arSection["NAME"].$count.'</a>';
?>
    <?if($CURRENT_DEPTH == 1):?>
        <? $li = ($i == 1) ? '<li>' : '</li><li>';?>
        <?=$li?><strong><?=$link?></strong> 
    <?else:?>
        <li id="<?=$this->GetEditAreaId($arSection['ID']);?>"><?=$link?></li>
        <? if ($i == $numSec) { $li = '</li></ul>'; echo $li;}?>
    <?endif;?>
<?endforeach?>
</ul>
<?=($strTitle?'<br/><h2>'.$strTitle.'</h2>':'')?>