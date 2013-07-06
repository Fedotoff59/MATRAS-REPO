<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
			<div class="menu">
				<ul>
<?
foreach($arResult as $cell=>$arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
                                    <?if ($cell == 0):?>
					<li class="first"><a href="<?=$arItem["LINK"]?>"><span><?=$arItem["TEXT"]?></span></a></li>
                                    <?elseif ($cell == count($arResult)-1):?>
					<li class="last"><a href="<?=$arItem["LINK"]?>"><span><?=$arItem["TEXT"]?></span></a></li>
                                    <?else:?>
					<li><a href="<?=$arItem["LINK"]?>"><span><?=$arItem["TEXT"]?></span></a></li>
                                    <?endif;?>
	
<?endforeach?>
				</ul>
			</div>
<?endif?>