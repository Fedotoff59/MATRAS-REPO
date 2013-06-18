<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div id="section">
<?
foreach($arResult["SECTIONS"] as $cell => $arSection):
    if ($cell%4 == 0):
        
    if ($cell == 0):?>
	<div class="box">
		<div class="shadow s_1"></div>
		<ul class="first">
    <?else:?>
	<div class="box">
		<div class="shadow s_1"></div>
		<div class="shadow s_2"></div>
		<ul>
    <?endif;//if ($cell == 0)
    endif;//if ($cell%4 == 0)
?>

			<li>
				<div class="img">
					<?if (is_array($arSection["PICTURE"])):?><img src="<?=$arSection["PICTURE"]["SRC"]?>" width="<?=$arSection["PICTURE"]["WIDTH"]?>" height="<?=$arSection["PICTURE"]["HEIGHT"]?>" alt=""/><?endif;?>
				</div>
				<div class="info">
					<div><span><?=$arSection["NAME"]?></span> [<?=$arSection["ELEMENT_CNT"]?>]</div>
				</div>
				<a href="<?=$arSection["SECTION_PAGE_URL"]?>"></a>
				<div class="line"></div>
			</li>
<?
    $cell++;
    if ($cell%4 == 0):?>
		</ul>
		<div class="clear_fix"></div>
	</div>
    <?endif;
?>
<?endforeach;

if ($cell%4 != 0):?>
		</ul>
		<div class="clear_fix"></div>
	</div>
<?endif;    
?>

 </div><!-- #section -->
