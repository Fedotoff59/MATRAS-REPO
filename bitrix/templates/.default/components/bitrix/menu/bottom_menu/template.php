<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
		<ul class="menu">
<?if (!empty($arResult)):?>
<?

$arParams["LEVEL1"] = intval($arParams["LEVEL1"])>0?intval($arParams["LEVEL1"]):3;
$arParams["LEVEL2"] = intval($arParams["LEVEL2"])>0?intval($arParams["LEVEL2"]):3;
$arParams["LEVEL3"] = intval($arParams["LEVEL3"])>0?intval($arParams["LEVEL3"]):4;

$arLevels = array(
    "1" => $arParams["LEVEL1"],
    "2" => $arParams["LEVEL2"],
    "3" => $arParams["LEVEL3"],
    "4" => 1000,
);

$curLevel = 1;
$curItems = 0; //количество ячеек на этом уровне
$prevDepth = 1;
foreach($arResult as $arItem):
    if ($arItem["DEPTH_LEVEL"] == 1)
    {
        if ($curItems == $arLevels[$curLevel]):
            $curItems = 0;
            $curLevel++;
            ?>
				</ul>
				<div class="ln"></div>
			</li>
            <?endif;
        
        if ($curItems == 0):?>
			<li class="item">
        <?else:?>                    
				</ul>
        <?endif;?>
				<a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
				<ul>
        <?                    
        $curItems++;
    }
    
    if ($arItem["DEPTH_LEVEL"] == 2):?>
                                        <li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
                                    <?endif;
?>
<?endforeach?>
				</ul>
				<div class="ln"></div>
			</li>
<?endif?>
		</ul>
<?
/*
 Array
(
    [TEXT] => Cухие строительные смеси
    [LINK] => /catalog/
    [SELECTED] => 
    [PERMISSION] => X
    [ADDITIONAL_LINKS] => Array
        (
        )

    [ITEM_TYPE] => D
    [ITEM_INDEX] => 0
    [PARAMS] => Array
        (
            [FROM_IBLOCK] => 1
            [IS_PARENT] => 1
            [DEPTH_LEVEL] => 1
        )

    [DEPTH_LEVEL] => 1
    [IS_PARENT] => 1
)
Array
(
    [TEXT] => Затирки
    [LINK] => /catalog/
    [SELECTED] => 
    [PERMISSION] => X
    [ADDITIONAL_LINKS] => Array
        (
        )

    [ITEM_TYPE] => D
    [ITEM_INDEX] => 1
    [PARAMS] => Array
        (
            [FROM_IBLOCK] => 1
            [IS_PARENT] => 
            [DEPTH_LEVEL] => 2
        )

    [DEPTH_LEVEL] => 2
    [IS_PARENT] => 
)* 
 */
?>