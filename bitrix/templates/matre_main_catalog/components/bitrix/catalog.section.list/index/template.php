<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
		<div class="sub">
			<h3>Наши товары</h3>
		</div>
<ul>
<?
$CURRENT_DEPTH=$arResult["SECTION"]["DEPTH_LEVEL"]+1;
$strTitle = "";
$numSec = count($arResult["SECTIONS"]);
foreach($arResult["SECTIONS"] as $i => $arSection):
        $i++;
	$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
	$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
/*
	if($CURRENT_DEPTH<$arSection["DEPTH_LEVEL"])
		echo "<ul>";
	elseif($CURRENT_DEPTH>$arSection["DEPTH_LEVEL"])
		echo str_repeat("</ul>", $CURRENT_DEPTH - $arSection["DEPTH_LEVEL"]);
 */
	$CURRENT_DEPTH = $arSection["DEPTH_LEVEL"];

	$count = $arParams["COUNT_ELEMENTS"] && $arSection["ELEMENT_CNT"] ? "&nbsp;(".$arSection["ELEMENT_CNT"].")" : "";

	if ($_REQUEST['SECTION_ID']==$arSection['ID'] || $CURRENT_DEPTH == 1)
	{
		$link = $arSection["NAME"].$count;
		$strTitle = $arSection["NAME"];
	}
	else
		$link = '<a href="'.$arSection["SECTION_PAGE_URL"].'">'.$arSection["NAME"].$count.'</a>';
?>
    <?if($CURRENT_DEPTH == 1):?>
        <? $li = ($i == 1) ? '<li>' : '</li><li>';?>
        <?=$li?><div class="title"><?=$link?></div>
        <div class="img">
            <img src="<?=$arSection['PICTURE']['SRC']?>" width="<?=$arSection['PICTURE']['WIDTH']?>" height="<?=$arSection['PICTURE']['HEIGHT']?>" alt=""/>
        </div>
        <? //echo '<pre>'; print_r($arSection); echo '</pre>';?>
    <?else:?>
        <?=$link?>
        <? if ($i == $numSec) { $li = '</li>'; echo $li;}?>
    <?endif;?>
<?endforeach?>
<li>
    <div class="title">Перейти в каталог</div>
    <div class="img">
        <img src="/files/cat-6.png" alt=""/>
    </div>
    <a href="/catalog/">Смотреть все товары >></a>
</li>
<li class="clear_fix"></li>
</ul>