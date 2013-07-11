<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<ul>
<?if (!empty($arResult)):
$i = 0;
foreach($arResult as $arItem):
    if ($arItem["DEPTH_LEVEL"] == 1) {
        $i++;
?>
    <li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
    <? $sep = ($i == count($arResult)) ? '' : '<li class="sep"></li>'; // Не выводим последнюю точку
    echo $sep;
  }
endforeach;
endif;?>
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