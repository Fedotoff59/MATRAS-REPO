<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="cat-list">
<?
$aFilter = "";
if (intval($_REQUEST["TRADEMARK"])>0)
	$aFilter = "?TRADEMARK=".intval($_REQUEST["TRADEMARK"]);
$TOP_DEPTH = $arResult["SECTION"]["DEPTH_LEVEL"];
$CURRENT_DEPTH = $TOP_DEPTH;
$CUR_PAGE = $APPLICATION->GetCurPage(false);

foreach($arResult["SECTIONS"] as $cell => $arSection):
	$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
	$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
        if ($cell%3 == 0):?>
	<ul>
        <?endif;?>
<?
global $USER;
if ($USER->IsAdmin())
{
//echo $arSection["SECTION_PAGE_URL"]." - ".$CUR_PAGE."<br>";
}
?>
        <li id="<?=$this->GetEditAreaId($arSection['ID']);?>"><a href="<?=$arSection["SECTION_PAGE_URL"].$aFilter?>"<?if ($arSection["SECTION_PAGE_URL"]==$CUR_PAGE || $arSection["CODE"] == $arParams["SELECTED_SECTION"]):?> class="cur"<?endif;?>><?=$arSection["NAME"]?></a> [<?=$arSection["ELEMENT_CNT"]?>]</li>    
        <?
        $cell++;
        if ($cell%3 == 0):?>
	</ul>
        <?endif;
endforeach;
if ($cell%3 != 0):?>
	</ul>
      <?endif;?>
	<div class="clear_fix"></div>
</div>
