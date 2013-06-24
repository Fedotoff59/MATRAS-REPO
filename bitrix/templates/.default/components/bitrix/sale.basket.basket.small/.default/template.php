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
    В корзине <a href="<?=$arParams["PATH_TO_BASKET"]?>"><?=$QUANTITY?></a><br/>
    на сумму <?=$PRICE?> руб.
</div>
<a href="<?=$arParams["PATH_TO_BASKET"]?>" class="go">Оформить заказ</a>