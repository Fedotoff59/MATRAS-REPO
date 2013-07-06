<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
echo ShowError($arResult["ERROR_MESSAGE"]);
//echo $arResult["allSum"];
?>

<h1>Моя корзина</h1>

<div class="cart">

	<div class="tbl form">
		<div class="cap"><div></div></div>
		<table class="st">
			<tr>
				<td class="t_1 top">&nbsp;</td>
				<td class="t_2 top">Наименование товара</td>
				<td class="t_3 top">Кол-во</td>
				<td class="t_4 top">Стоимость</td>
				<td class="t_6 top">Итого</td>
				<td class="t_7 top">Удалить</td>
			</tr>
<?
	$i=0;
	foreach($arResult["ITEMS"]["AnDelCanBuy"] as $arBasketItems)
	{
		?>
			<tr>
                            <td class="t_1<?if ($i%2==1):?> gr<?endif;?>"><img src="<?=$arBasketItems["ELEMENT"]["PREVIEW_PICTURE"]["SRC"]?>" width="46" height="50" alt=""/></td>
                            <td class="t_2<?if ($i%2==1):?> gr<?endif;?>"><a href="<?=$arBasketItems["DETAIL_PAGE_URL"]?>"><?=$arBasketItems["NAME"]?></a></td>
                            <td class="t_3<?if ($i%2==1):?> gr<?endif;?>"><input maxlength="18" type="text" name="QUANTITY_<?=$arBasketItems["ID"] ?>" value="<?=$arBasketItems["QUANTITY"]?>" size="3" ></td>
                            <td class="t_4<?if ($i%2==1):?> gr<?endif;?>"><?=$arBasketItems["PRICE_FORMATED"]?></td>
                            <td class="t_5<?if ($i%2==1):?> gr<?endif;?>"><?=CurrencyFormat($arBasketItems["PRICE"]*$arBasketItems["QUANTITY"],$arBasketItems["CURRENCY"])?></td>
                            <td class="t_6<?if ($i%2==1):?> gr<?endif;?>"><a href="?BasketRefresh=Y&DELETE_<?=$arBasketItems["ID"]?>=Y" class="del"></a></td>
			</tr>
		<?
		$i++;
	}
	?>

			<tr>
                            <td class="t_1<?if ($i%2==1):?> gr<?endif;?>"></td>
                            <td class="t_2<?if ($i%2==1):?> gr<?endif;?>"><h3>Итого:</h3></td>
                            <td class="t_3<?if ($i%2==1):?> gr<?endif;?>"></td>
                            <td class="t_4<?if ($i%2==1):?> gr<?endif;?>"></td>
                            <td class="t_5<?if ($i%2==1):?> gr<?endif;?>"></td>
                            <td class="t_6<?if ($i%2==1):?> gr<?endif;?>"><h3><?=CurrencyFormat($arResult["allSum"],"RUB")?></h3></td>
			</tr>
                        
		</table>
		
	</div>

	<div class="action form">
		<div class="clear">
			<button type="submit" value="1" name="DeleteAll" class="gray_bt">очистить корзину</button>
		</div>
		<div class="rgh">
			<button type="submit" value="1" name="BasketRefresh" class="gray_bt">пересчитать стоимость</button>&nbsp;
			<button type="submit" value="1" name="BasketOrder">Оформить заказ</button>
		</div>
		<div class="clear_fix"></div>
	</div>
	
</div><!-- .cart -->
<?