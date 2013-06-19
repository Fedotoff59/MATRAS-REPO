
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
			<ul>
				<li><a href="">Матрасы</a></li>
				<li><a href="">Элитные матрасы</a></li>
				<li><a href="">Ортопедические снования</a></li>
				<li><a href="">Кровати</a></li>
				<li><a href="">Аксессуары</a></li>
			</ul>
			<div class="clear_fix"></div>
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