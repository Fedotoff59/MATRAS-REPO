<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
					
<?
$QUANTITY = 0;
$PRICE = 0;

foreach ($arResult["ITEMS"] as $arItem)
{
    $QUANTITY+=$arItem["QUANTITY"];
    $PRICE+=$arItem["QUANTITY"]*$arItem["PRICE"];
}
?>
<div class="box">
    � ������� <a href="<?=$arParams["PATH_TO_BASKET"]?>"><?=$QUANTITY?></a><br/>
    �� ����� <?=$PRICE?> ���.
</div>
<a href="<?=$arParams["PATH_TO_BASKET"]?>" class="go">�������� �����</a>