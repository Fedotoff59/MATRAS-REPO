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
		<div class="bg"></div>
		
		<h3>популярные товары</h3>
		
		<div class="inner">
			<ul>
				
				<li>
					<div class="img">
						<img src="<?=SITE_TEMPLATE_PATH?>/files/pop-1.png" alt=""/>
					</div>
					<a href="">Season Mix SmartSpring</a>
					<div class="text">
						Модель на основе натуральных материалов. Латексированная кокосовая койра придает...
					</div>
					<div class="price">
						7 720 руб.
					</div>
				</li>
				
				<li>
					<div class="img">
						<img src="<?=SITE_TEMPLATE_PATH?>/files/pop-2.png" alt=""/>
					</div>
					<a href="">Optima Lux EVS</a>
					<div class="text">
						Двухсторонний матрас средней жесткости. Основа матраса блок независимых пружин...
					</div>
					<div class="price">
						7 720 руб.
					</div>
				</li>
				
				<li>
					<div class="img">
						<img src="<?=SITE_TEMPLATE_PATH?>/files/pop-3.png" alt=""/>
					</div>
					<a href="">Мультипакет мидл</a>
					<div class="text">
						Данная улучшенная модель пришла на смену Season mix EVS500 Ортопедический матрас...
					</div>
					<div class="price">
						7 720 руб.
					</div>
				</li>
				
				<li>
					<div class="img">
						<img src="<?=SITE_TEMPLATE_PATH?>/files/pop-4.png" alt=""/>
					</div>
					<a href="">SOFT мидл эконом</a>
					<div class="text">
						Ортопедический матрас с отличающимися по жесткости сторонами. 
					</div>
					<div class="price">
						7 720 руб.
					</div>
				</li>
				
			</ul>
			<div class="clear_fix"></div>
		</div><!-- .inner -->
		
		<div class="arrow">
			<a href="" class="l"></a>
			<a href="" class="r"></a>
		</div>
		
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
