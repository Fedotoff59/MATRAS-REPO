
<div class="clear_fix"></div>
</div><!-- #body -->

<div id="footer">
	
	<div class="lft">
            <?$APPLICATION->IncludeFile(
                    	"/include/bottom_logo.php",
                    	Array(),
                    	Array("MODE"=>"text","NAME"=>"Логотип")
                    );?>
		
	</div><!-- .lft -->
	
	<div class="info">
		
		<div class="menu">
            <?$APPLICATION->IncludeComponent("bitrix:menu", "section_menu", array(
	"ROOT_MENU_TYPE" => "section",
	"MENU_CACHE_TYPE" => "N",
	"MENU_CACHE_TIME" => "3600",
	"MENU_CACHE_USE_GROUPS" => "Y",
	"MENU_CACHE_GET_VARS" => array(
	),
	"MAX_LEVEL" => "1",
	"CHILD_MENU_TYPE" => "left",
	"USE_EXT" => "Y",
	"DELAY" => "N",
	"ALLOW_MULTI_SELECT" => "N"
	),
	false
);?><div class="clear_fix"></div>
</div>
		
		<div class="counter">
            <?$APPLICATION->IncludeFile(
                    	"/include/counters.php",
                    	Array(),
                    	Array("MODE"=>"text","NAME"=>"Счетчики")
                    );?>
			
		</div>
	    <?$APPLICATION->IncludeFile(
                    	"/include/develop.php",
                    	Array(),
                    	Array("MODE"=>"text","NAME"=>"Разработка")
                    );?>		
	</div><!-- .info -->
	<div class="contact">
            <?$APPLICATION->IncludeFile(
                    	"/include/bottom_contacts.php",
                    	Array(),
                    	Array("MODE"=>"text","NAME"=>"Контакты")
                    );?>
	</div><!-- .contact -->
	
	<div class="clear_fix"></div>
</div><!-- #footer -->

</div><!-- .wrap -->
</div><!-- #layout -->

</body>
</html>