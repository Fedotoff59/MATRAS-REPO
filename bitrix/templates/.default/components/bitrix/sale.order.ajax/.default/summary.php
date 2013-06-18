<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<h3><?=GetMessage("SOA_TEMPL_SUM_TITLE")?></h3><br />
<?$tdi=0?>
	<div class="tbl form">
		<div class="cap"><div></div></div>
		<table class="st">
	<tr>
		<td class="t_1 top">&nbsp;</td>
		<td class="t_2 top"><?=GetMessage("SOA_TEMPL_SUM_NAME")?></td>
		<td class="t_3 top"><?=GetMessage("SOA_TEMPL_SUM_DISCOUNT")?></td>
		<td class="t_4 top"><?=GetMessage("SOA_TEMPL_SUM_QUANTITY")?></td>
		<td class="t_5 top"><?=GetMessage("SOA_TEMPL_SUM_PRICE")?></td>
	</tr>
	<?
	foreach($arResult["BASKET_ITEMS"] as $arBasketItems)
	{
		?>
		<tr>
			<td class="t_1 <?if ($tdi%2 == 1):?> gr<?endif;?>">&nbsp;</td>
			<td class="t_2 <?if ($tdi%2 == 1):?> gr<?endif;?>"><?=$arBasketItems["NAME"]?></td>
			<td class="t_3 <?if ($tdi%2 == 1):?> gr<?endif;?>"><?=$arBasketItems["DISCOUNT_PRICE_PERCENT_FORMATED"]?></td>
			<td class="t_4 <?if ($tdi%2 == 1):?> gr<?endif;?>"><?=$arBasketItems["QUANTITY"]?></td>
			<td class="t_5 <?if ($tdi%2 == 1):?> gr<?endif;?>"><?=$arBasketItems["PRICE_FORMATED"]?></td>
		</tr>
		<?$tdi++;
	}
	?>
	<?
	if (doubleval($arResult["DISCOUNT_PRICE"]) > 0)
	{
		?>
		<tr>
			<td align="right"><b><?=GetMessage("SOA_TEMPL_SUM_DISCOUNT")?><?if (strLen($arResult["DISCOUNT_PERCENT_FORMATED"])>0):?> (<?echo $arResult["DISCOUNT_PERCENT_FORMATED"];?>)<?endif;?>:</b></td>
			<td align="right" colspan="6"><?echo $arResult["DISCOUNT_PRICE_FORMATED"]?>
			</td>
		</tr>
		<?
	}
	/*
	if (doubleval($arResult["VAT_SUM_FORMATED"]) > 0)
	{
		?>
		<tr>
			<td align="right">
				<b><?=GetMessage("SOA_TEMPL_SUM_VAT")?></b>
			</td>
			<td align="right" colspan="6"><?=$arResult["VAT_SUM_FORMATED"]?></td>
		</tr>
		<?
	}
	*/
	if(!empty($arResult["arTaxList"]))
	{
		foreach($arResult["arTaxList"] as $val)
		{
			?>
			<tr>
				<td align="right"><?=$val["NAME"]?> <?=$val["VALUE_FORMATED"]?>:</td>
				<td align="right" colspan="6"><?=$val["VALUE_MONEY_FORMATED"]?></td>
			</tr>
			<?
		}
	}
	if (doubleval($arResult["DELIVERY_PRICE"]) > 0)
	{
		?>
		<tr>
			<td align="right">
				<b><?=GetMessage("SOA_TEMPL_SUM_DELIVERY")?></b>
			</td>
			<td align="right" colspan="6"><?=$arResult["DELIVERY_PRICE_FORMATED"]?></td>
		</tr>
		<?
	}
	?>
	<tr>
		<td class="t_1 <?if ($tdi%2 == 1):?> gr<?endif;?>">&nbsp;</td>
		<td align="right" class="t_2 <?if ($tdi%2 == 1):?> gr<?endif;?>"><b><?=GetMessage("SOA_TEMPL_SUM_IT")?></b></td>
		<td align="right" class="t_3 <?if ($tdi%2 == 1):?> gr<?endif;?>" colspan="3"><b><?=$arResult["ORDER_TOTAL_PRICE_FORMATED"]?></b>
		</td>
	</tr>
	<?$tdi++;
	if (strlen($arResult["PAYED_FROM_ACCOUNT_FORMATED"]) > 0)
	{
		?>
		<tr>
			<td align="right"><b><?=GetMessage("SOA_TEMPL_SUM_PAYED")?></b></td>
			<td align="right" colspan="6"><?=$arResult["PAYED_FROM_ACCOUNT_FORMATED"]?></td>
		</tr>
		<?
	}
	?>
		</table>
		
	</div>

<br /><br />
<h3><?=GetMessage("SOA_TEMPL_SUM_ADIT_INFO")?></h3><br /><br />

<div class="block">
	<div>
		
		<div class="form">
			
			<div class="tr">
				<div class="value"><?=GetMessage("SOA_TEMPL_SUM_COMMENTS")?></div>
				<textarea name="ORDER_DESCRIPTION" cols="40" rows="4"><?=$arResult["USER_VALS"]["ORDER_DESCRIPTION"]?></textarea>
			</div>
		</div>
		
	</div>
	
	<div class="clear_fix"></div>
</div>
