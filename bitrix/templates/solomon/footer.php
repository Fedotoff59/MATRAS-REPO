<?if ($curPage !== SITE_DIR."index.php"):?>
</div><!-- #content -->
<?endif;?>

</div><!-- #body -->

<div id="footer">
	
	<div class="top-line"></div>
	
	<div class="wrap">
		
<?$APPLICATION->IncludeComponent("bitrix:menu", "bottom_menu", array(
	"ROOT_MENU_TYPE" => "bottom",
	"LEVEL1" => "5",
	"LEVEL2" => "3",
	"LEVEL3" => "4",
	"MENU_CACHE_TYPE" => "A",
	"MENU_CACHE_TIME" => "3600",
	"MENU_CACHE_USE_GROUPS" => "Y",
	"MENU_CACHE_GET_VARS" => array(
	),
	"MAX_LEVEL" => "2",
	"CHILD_MENU_TYPE" => "",
	"USE_EXT" => "Y",
	"DELAY" => "N",
	"ALLOW_MULTI_SELECT" => "N"
	),
	false
);?>		
		<div class="contact">
			
			<div class="tl">Контактная информация</div>
<?$APPLICATION->IncludeFile(
                    	"/include/contacts.php",
                    	Array(),
                    	Array("MODE"=>"html","NAME"=>"Контакты")
                    );?>					
			
<?$APPLICATION->IncludeComponent("bitrix:news.list", "articles", array(
	"IBLOCK_TYPE" => "content",
	"IBLOCK_ID" => "12",
	"NEWS_COUNT" => "4",
	"SORT_BY1" => "RAND",
	"SORT_ORDER1" => "ASC",
	"SORT_BY2" => "SORT",
	"SORT_ORDER2" => "ASC",
	"FILTER_NAME" => "",
	"FIELD_CODE" => array(
		0 => "",
		1 => "",
	),
	"PROPERTY_CODE" => array(
		0 => "",
		1 => "",
	),
	"CHECK_DATES" => "Y",
	"DETAIL_URL" => "",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "N",
	"CACHE_TIME" => "36000000",
	"CACHE_FILTER" => "N",
	"CACHE_GROUPS" => "Y",
	"PREVIEW_TRUNCATE_LEN" => "",
	"ACTIVE_DATE_FORMAT" => "d.m.Y",
	"SET_TITLE" => "N",
	"SET_STATUS_404" => "N",
	"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
	"ADD_SECTIONS_CHAIN" => "N",
	"HIDE_LINK_WHEN_NO_DETAIL" => "N",
	"PARENT_SECTION" => "",
	"PARENT_SECTION_CODE" => "",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "N",
	"PAGER_TITLE" => "Новости",
	"PAGER_SHOW_ALWAYS" => "N",
	"PAGER_TEMPLATE" => "",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "N",
	"DISPLAY_DATE" => "N",
	"DISPLAY_NAME" => "Y",
	"DISPLAY_PICTURE" => "N",
	"DISPLAY_PREVIEW_TEXT" => "Y",
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "N"
	)
);?>
<br/><br/>
			<div class="tl">Телефоны:</div>
			<div class="phone">
<?$APPLICATION->IncludeFile(
                    	"/include/bottom_phones.php",
                    	Array(),
                    	Array("MODE"=>"html","NAME"=>"Телефоны")
                    );?>					
			</div>
			
			<div class="copy">
<?$APPLICATION->IncludeFile(
                    	"/include/copyright.php",
                    	Array(),
                    	Array("MODE"=>"html","NAME"=>"Копирайт")
                    );?>					
			</div>
			
			<div class="counter">
<?$APPLICATION->IncludeFile(
                    	"/include/counters.php",
                    	Array(),
                    	Array("MODE"=>"html","NAME"=>"Счетчики")
                    );?>					
			</div>
			
		</div>
		
		<div class="clear_fix"></div>
	</div>
	
	<div class="bot-line"></div>
	<div class="shadow"></div>
</div><!-- #footer -->

</div><!-- #layout -->

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
var ya_params = {/*Здесь параметры визита*/};
</script>

<div style="display:none;"><script type="text/javascript">
(function(w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter7428985 = new Ya.Metrika({id:7428985, enableAll: true,params:window.ya_params||{ }});
        }
        catch(e) { }
    });
})(window, "yandex_metrika_callbacks");
</script></div>
<script src="//mc.yandex.ru/metrika/watch.js" type="text/javascript" defer="defer"></script>
<noscript><div><img src="//mc.yandex.ru/watch/7428985" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->


</body>
</html>