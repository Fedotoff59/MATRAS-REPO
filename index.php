<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Матрасы");
?> 
    
<div id="slider">
        <div class="inner">
            <?$APPLICATION->IncludeFile(
                        "/include/top_slider.php",
                    	Array(),
                    	Array("MODE"=>"text","NAME"=>"Слайдер")
            );?>
            <div class="clear_fix"></div>
	</div>
	<div class="arrow">
            <a href="" class="l"></a>
            <a href="" class="r"></a>
	</div>
</div><!-- #slider -->

<div id="sidebar">
	
	<div class="widget filter">
		
		<div class="sub">
			<h3>Подбор по параметрам</h3>
		</div>
		
		<div class="item">
			<div class="level">Размер матраса</div>
			<select name="">
				<option>80 x 200 мм</option>
				<option>80 x 200 мм</option>
				<option>80 x 200 мм</option>
				<option>80 x 200 мм</option>
				<option>80 x 200 мм</option>
				<option>80 x 200 мм</option>
			</select>
		</div>
		
		<div class="item" id="price">
			<div class="level">Цена</div>
			от:&nbsp;<input type="text" name="" id="start" value="200000"/>&nbsp;до:&nbsp;<input type="text" name="" id="end" value="2000000"/>
			<div class="box"></div>
		</div>
		
		<div class="item">
			<div class="level">Бренд</div>
			<div class="li">
				<label><input type="checkbox" name="" checked="checked"/> Lonax Premium</label>
			</div>
			<div class="li">
				<label><input type="checkbox" name=""/> ASKONA</label>
			</div>
			<div class="li">
				<label><input type="checkbox" name=""/> Орматек</label>
			</div>
			<div class="li">
				<label><input type="checkbox" name=""/> Промтекс-ориент</label>
			</div>
			<div class="">
				<label><input type="checkbox" name=""/> Все</label>
			</div>
		</div>
		
		<div class="item">
			<div class="level">Основа матраса</div>
			<select name="">
				<option>Пружинная</option>
				<option>Пружинная</option>
				<option>Пружинная</option>
				<option>Пружинная</option>
				<option>Пружинная</option>
				<option>Пружинная</option>
				<option>Пружинная</option>
			</select>
		</div>
		
		<div class="bt">
			<button type="submit">Показать 25 товаров</button>
		</div>
		
	</div><!-- .filter -->
	
	<div class="widget cat_list">
		
		<h3>Каталог товаров</h3>
		
		<ul>
			<li>
				<strong><a href="">Матрасы</a></strong>
				<ul>
					<li><a href="">Пружинные</a></li>
					<li><a href="">Беспружинные</a></li>
					<li><a href="">Тонкие матрасы</a></li>
					<li><a href="">Детские</a></li>
				</ul>
			</li>
			<li>
				<strong><a href="">Элитные матрасы</a></strong>
				<ul>
					<li><a href="">Пружинные</a></li>
					<li><a href="">Беспружинные</a></li>
				</ul>
			</li>
			<li>
				<strong>Ортопедические основания</strong>
				<ul>
					<li><a href="">Деревянные</a></li>
					<li><a href="">Металлические</a></li>
				</ul>
			</li>
			<li>
				<strong><a href="">Кровати</a></strong>
				<ul>
					<li><a href="">ЛДСП</a></li>
					<li><a href="">Кожаная обивка</a></li>
					<li><a href="">Массив дерева</a></li>
					<li><a href="">Кованые кровати</a></li>
				</ul>
			</li>
			<li>
				<strong><a href="">Аксессуары</a></strong>
				<ul>
					<li><a href="">Подушки</a></li>
					<li><a href="">Наматрасники</a></li>
					<li><a href="">Пледы, одеяла</a></li>
				</ul>
			</li>
		</ul>
		
	</div><!-- .cat_list -->
	
	<div class="widget sert">
		
		<div class="sub">
			<h3>наши Сертификаты</h3>
		</div>
		
		<div class="slider">
			<div class="inner">
				<ul>
					<li><a href="<?=SITE_TEMPLATE_PATH?>/files/sert.jpg" class="fancybox" rel=""><img src="<?=SITE_TEMPLATE_PATH?>/files/sert.jpg" width="154" alt=""/><i></i></a></li>
				</ul>
				<div class="clear_fix"></div>
			</div>
			
			<div class="arrow">
				<a href="" class="l"></a>
				<a href="" class="r"></a>
			</div>
		</div>
		<div class="clear_fix"></div>
		
	</div><!-- .sert -->
	
</div><!-- #sidebar -->

<div id="content" class="main">
	
	<div class="popular" id="popular">
                <?$APPLICATION->IncludeComponent("bitrix:news.list","popular",Array(
                    "DISPLAY_DATE" => "Y",
                    "DISPLAY_NAME" => "Y",
                    "DISPLAY_PICTURE" => "Y",
                    "DISPLAY_PREVIEW_TEXT" => "Y",
                    "AJAX_MODE" => "N",
                    "IBLOCK_TYPE" => "catalog",
                    "IBLOCK_ID" => "6",
                    "NEWS_COUNT" => "20",
                    "SORT_BY1" => "ACTIVE_FROM",
                    "SORT_ORDER1" => "DESC",
                    "SORT_BY2" => "SORT",
                    "SORT_ORDER2" => "ASC",
                    "FILTER_NAME" => "",
                    "FIELD_CODE" => "",
                    "PROPERTY_CODE" => "",
                    "CHECK_DATES" => "Y",
                    "DETAIL_URL" => "",
                    "PREVIEW_TRUNCATE_LEN" => "",
                    "ACTIVE_DATE_FORMAT" => "d.m.Y",
                    "SET_TITLE" => "N",
                    "SET_STATUS_404" => "Y",
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
                    "ADD_SECTIONS_CHAIN" => "Y",
                    "HIDE_LINK_WHEN_NO_DETAIL" => "Y",
                    "PARENT_SECTION" => "",
                    "PARENT_SECTION_CODE" => "",
                    "INCLUDE_SUBSECTIONS" => "Y",
                    "CACHE_TYPE" => "N",
                    "CACHE_TIME" => "3600",
                    "CACHE_FILTER" => "Y",
                    "CACHE_GROUPS" => "Y",
                    "DISPLAY_TOP_PAGER" => "N",
                    "DISPLAY_BOTTOM_PAGER" => "Y",
                    "PAGER_TITLE" => "Новости",
                    "PAGER_SHOW_ALWAYS" => "Y",
                    "PAGER_TEMPLATE" => "",
                    "PAGER_DESC_NUMBERING" => "Y",
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                    "PAGER_SHOW_ALL" => "Y",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "AJAX_OPTION_HISTORY" => "N",
                    "AJAX_OPTION_ADDITIONAL" => ""
                    )
                );?>	
	</div><!-- .popular -->
	
	<div class="production">
		
		<div class="sub">
			<h3>Наши товары</h3>
		</div>
		
		<ul>
			
			<li>
				<div class="title">Матрасы</div>
				<div class="img">
					<img src="<?=SITE_TEMPLATE_PATH?>/files/cat-1.png" alt=""/>
				</div>
				<a href="">Пружинные,</a> <a href="">Беспружинные,</a> <br/><a href="">Тонкие матрасы,</a> <a href="">Детские</a>
			</li>
			
			<li>
				<div class="title">Элитные матрасы</div>
				<div class="img">
					<img src="<?=SITE_TEMPLATE_PATH?>/files/cat-2.png" alt=""/>
				</div>
				<a href="">Пружинные,</a> <a href="">Беспружинные,</a>
			</li>
			
			<li>
				<div class="title">Ортопедические основания</div>
				<div class="img">
					<img src="<?=SITE_TEMPLATE_PATH?>/files/cat-3.png" alt=""/>
				</div>
				<a href="">Деревянные,</a> <a href="">Металлические</a>
			</li>
			
			<li class="clear_fix"></li>
			
			<li>
				<div class="title">Кровати</div>
				<div class="img">
					<img src="<?=SITE_TEMPLATE_PATH?>/files/cat-4.png" alt=""/>
				</div>
				<a href="">ЛДСП,</a> <a href="">Кожаная обивка,</a> <br/><a href="">Массив дерева,</a> <a href="">Кованые кровати</a>
			</li>
			
			<li>
				<div class="title">Аксессуары</div>
				<div class="img">
					<img src="<?=SITE_TEMPLATE_PATH?>/files/cat-5.png" alt=""/>
				</div>
				<a href="">Подушки,</a> <a href="">Наматрасники,</a> <a href="">Пледы,</a> <a href="">Одеяла</a>
			</li>
			
			<li>
				<div class="title">Перейти в каталог</div>
				<div class="img">
					<img src="<?=SITE_TEMPLATE_PATH?>/files/cat-6.png" alt=""/>
				</div>
				<a href="">Смотреть все товары >></a>
			</li>
			
			<li class="clear_fix"></li>
			
		</ul>
	</div><!-- .production -->
	
	<div class="inform">
		
		<div class="faq">
			
			<div class="sub">
				<h3>часто задаваемые вопросы</h3><sup><a href="">Все вопросы</a></sup>
			</div>
			
			<ul>
				<li>
					<div class="title">
						<a href="">Мой вес 90кг, какой матрас мне купить?</a>
					</div>
					Выбирайте матрас на независимом пружинном блоке. Все матрасы подходят для веса 90 кг. 
					<br/>
					Определите для себя комфортную жесткость матраса, либо выберите двусторонний...
				</li>
				
				<li>
					<div class="title">
						<a href="">Сколько стоит доставка матраса FLEX 160X200</a>
					</div>
					Подробнее о доставке матраса в разделе Доставка и оплата или по телефону
				</li>
				
				<li>
					<div class="title">
						<a href="">Добрый день. по регионам есть доставка?</a>
					</div>
					Здравствуйте. Доставка по регионам осуществляется транспортной компанией на ваш выбор или по нашей рекомендации.
				</li>
				
				<li>
					<div class="title">
						<a href="">Забираете ли Вы старый матраc на утилизацию и сколько это стоит?</a>
					</div>
					Вы  можете лично договориться со службой доставки.
				</li>
				
			</ul>
			
			<div class="arr"></div>
		</div><!-- .faq -->
		
		<div class="art">
			
			<div class="sub">
				<h3>Статьи</h3><sup><a href="">Все статьи</a></sup>
			</div>
			
			<ul>
				<li>
					<div class="title">
						<a href="">Топ 10 советов по выбору матраса</a>
					</div>
					Сегодня на рынке ортопедических матрасов покупателю предлагается широкий ассортимент разнообразных изделий, отличающихся техническими, зовательскими и ценовыми характеристиками. Следует понимать... 
				</li>
				
				<li>
					<div class="title">
						<a href="">Правила эксплуатации красных и синих матрасов</a>
					</div>
					Уважаемые посетители нашего сайта!
					<br/>
					Все матрасы, предлагаемые на данном сайте сертифицированы и созданы из высококачественных и антиаллергенных материалов искусственного...
				</li>
				
				<li>
					<div class="title">
						<a href="">Почему выбирают беспружинные матрасы</a>
					</div>
					Мы часто слышим вопрос от наших клиентов «Ну так, какой матрас лучше?». Нельзя сказать, какой матрас лучше: матрас с независимым пружинным блоком TFK, с независимым пружинным блоком...
				</li>
				
			</ul>
			
		</div><!-- .art -->
		
		<div class="clear_fix"></div>
	</div><!-- .inform -->
	
	<div class="developer" id="developer">
		
		<h3>Производители</h3>
		
		<div class="inner">
			<ul>
				<li><div><img src="<?=SITE_TEMPLATE_PATH?>/files/dev-1.png" width="107" height="24" alt=""/></div></li>
				<li><div><img src="<?=SITE_TEMPLATE_PATH?>/files/dev-2.png" width="100" height="60" alt=""/></div></li>
				<li><div><img src="<?=SITE_TEMPLATE_PATH?>/files/dev-3.png" width="131" height="37" alt=""/></div></li>
				<li><div><img src="<?=SITE_TEMPLATE_PATH?>/files/dev-4.png" width="100" height="60" alt=""/></div></li>
				<li><div><img src="<?=SITE_TEMPLATE_PATH?>/files/dev-5.png" width="100" height="60" alt=""/></div></li>
			</ul>
			<div class="clear_fix"></div>
		</div>
		
		<div class="arrow">
			<a href="" class="l"></a>
			<a href="" class="r"></a>
		</div>
		
	</div><!-- .developer -->
	
</div><!-- #content -->

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
