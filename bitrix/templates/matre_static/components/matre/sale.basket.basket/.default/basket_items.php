<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
echo ShowError($arResult["ERROR_MESSAGE"]);
//echo $arResult["allSum"];
?>

<h1>Моя корзина</h1>

<div class="cart" >
			
			<table class="style">
				<tr>
					<td class="th t_1">Товар</td>
					<td class="th">Цена за шт.</td>
					<td class="th">Количество</td>
					<td class="th">Общая сумма</td>
					<td class="th">Удалить</td>
				</tr>

<?
	$i=0;
	foreach($arResult["ITEMS"]["AnDelCanBuy"] as $arBasketItems)
	{
		?>
			<tr>
                            <td class="t_2<?if ($i%2==1):?> gr<?endif;?>"><a href="<?=$arBasketItems["DETAIL_PAGE_URL"]?>"><?=$arBasketItems["NAME"]?></a></td>
                            <td class="t_3<?if ($i%2==1):?> gr<?endif;?>"><div class="num">
<input maxlength="18" type="text" name="QUANTITY_<?=$arBasketItems["ID"] ?>" value="<?=$arBasketItems["QUANTITY"]?>" size="3" ><a href="" class="p"></a><a href="" class="m"></div></td>
                            <td class="t_4<?if ($i%2==1):?> gr<?endif;?>"><?=$arBasketItems["PRICE_FORMATED"]?></td>
                            <td class="t_5<?if ($i%2==1):?> gr<?endif;?>"><?=CurrencyFormat($arBasketItems["PRICE"]*$arBasketItems["QUANTITY"],$arBasketItems["CURRENCY"])?></td>
                            <td class="t_6<?if ($i%2==1):?> gr<?endif;?>"><a href="?BasketRefresh=Y&DELETE_<?=$arBasketItems["ID"]?>=Y" class="del"></a></td>
			</tr>
		<?
		$i++;
	}
	?>

			<tr>
                            <td class="t_2<?if ($i%2==1):?> gr<?endif;?>"><h3>Итого:</h3></td>
                            <td class="t_3<?if ($i%2==1):?> gr<?endif;?>"></td>
                            <td class="t_4<?if ($i%2==1):?> gr<?endif;?>"></td>
                            <td class="t_5<?if ($i%2==1):?> gr<?endif;?>"></td>
                            <td class="t_6<?if ($i%2==1):?> gr<?endif;?>"><h3><?=CurrencyFormat($arResult["allSum"],"RUB")?></h3></td>
			</tr>
                        
		</table>
		

	<div class="action">
		<button type="submit" value="1" name="BasketRefresh" class="gray">пересчитать стоимость</button>
                <button type="submit" value="1" name="DeleteAll" class="gray">очистить корзину</button>
                <button type="submit" value="1" name="BasketOrder">Оформить заказ</button>
		<div class="clear_fix"></div>
	</div>
	
</div><!-- .cart -->
<?