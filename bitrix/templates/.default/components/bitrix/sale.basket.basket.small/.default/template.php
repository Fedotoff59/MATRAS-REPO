<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
					<div class="stat">
<?
$QUANTITY = 0;
$PRICE = 0;

foreach ($arResult["ITEMS"] as $arItem)
{
    $QUANTITY+=$arItem["QUANTITY"];
    $PRICE+=$arItem["QUANTITY"]*$arItem["PRICE"];
}
?>

<span><?=$QUANTITY?></span> товаров&nbsp;&nbsp;<i></i>&nbsp;<span class="rur"><?=$PRICE?></span> руб.
					<a href="<?=$arParams["PATH_TO_BASKET"]?>"></a>
					</div>
<a href="<?=$arParams["PATH_TO_BASKET"]?>">ќформить заказ</a>
