<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div id="trademark">
	<div class="tl">Торговые марки</div>
	<div class="slider">
		<div class="over">
			
			<ul class="set">
				
<?foreach($arResult["ITEMS"] as $cell => $arItem):?>
                            <?
                            if ($cell%6 == 0):?>
				<li class="item">
					<ul>
                            <?
                            endif;
?>
						<li><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>" alt=""/></a></li>
<?                            
                            $cell++;
                            if ($cell%6 == 0):?>
					</ul>
					<span class="str"></span>
				</li>
                            <?
                            endif;
                            ?>
<?endforeach?>                            
<?
if ($cell%6 != 0):?>
					</ul>
					<span class="str"></span>
				</li>
<?endif;
?>
			</ul><!-- .set -->
			<div class="clear_fix"></div>
		</div><!-- .over -->
		<div class="arrow">
			<a href="" class="l"></a>
			<a href="" class="r"></a>
		</div>
	</div><!-- .slider -->
</div><!-- #trademark -->

<script type="text/javascript">
$(document).ready(function(){
	$('#trademark .slider .over').carousel({
		btnNext: '#trademark .slider .arrow .r', btnPrev: '#trademark .slider .arrow .l', visible: 1
	});
});
</script>
