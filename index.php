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
<?$APPLICATION->IncludeFile(
    "/include/left_sidebar.php",
    Array(),
    Array("MODE"=>"text","NAME"=>"Левая колонка")
);?>	
</div><!-- #sidebar -->

<div id="content" class="main">
	
	<div class="popular" id="popular">
                <?
                    global $arrPopularFilter;
                    $arrPopularFilter = Array(
                        "PROPERTY_POPULAR_VALUE" => "Y"
                    );
                ?>
                <?$APPLICATION->IncludeComponent("bitrix:news.list", "popular", array(
	"IBLOCK_TYPE" => "catalog",
	"IBLOCK_ID" => "6",
	"NEWS_COUNT" => "20",
	"SORT_BY1" => "ACTIVE_FROM",
	"SORT_ORDER1" => "DESC",
	"SORT_BY2" => "SORT",
	"SORT_ORDER2" => "ASC",
	"FILTER_NAME" => "arrPopularFilter",
	"FIELD_CODE" => array(
		0 => "ID",
		1 => "CODE",
		2 => "PREVIEW_TEXT",
		3 => "PREVIEW_PICTURE",
		4 => "",
	),
	"PROPERTY_CODE" => array(
		0 => "POPULAR",
		1 => "",
	),
	"CHECK_DATES" => "Y",
	"DETAIL_URL" => "",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "N",
	"CACHE_TIME" => "3600",
	"CACHE_FILTER" => "Y",
	"CACHE_GROUPS" => "Y",
	"PREVIEW_TRUNCATE_LEN" => "",
	"ACTIVE_DATE_FORMAT" => "d.m.Y",
	"SET_TITLE" => "N",
	"SET_STATUS_404" => "Y",
	"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
	"ADD_SECTIONS_CHAIN" => "Y",
	"HIDE_LINK_WHEN_NO_DETAIL" => "Y",
	"PARENT_SECTION" => "",
	"PARENT_SECTION_CODE" => "",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "Y",
	"PAGER_TITLE" => "Новости",
	"PAGER_SHOW_ALWAYS" => "Y",
	"PAGER_TEMPLATE" => "",
	"PAGER_DESC_NUMBERING" => "Y",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "Y",
	"PREVIEW_WIDTH" => "150",
	"PREVIEW_HEIGHT" => "120",
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?>	
	</div><!-- .popular -->
	
	<div class="production">
<?$APPLICATION->IncludeComponent("bitrix:catalog.section.list","index",
Array(
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "6",
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_CODE" => "",
		"SECTION_URL" => "",
		"COUNT_ELEMENTS" => "N",
		"TOP_DEPTH" => "2",
		"SECTION_FIELDS" => "",
		"SECTION_USER_FIELDS" => "",
		"ADD_SECTIONS_CHAIN" => "N",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_NOTES" => "",
		"CACHE_GROUPS" => "Y"
	)		
);?>
	</div><!-- .production -->
	
	<div class="inform">
		
		<div class="faq">
			
			<div class="sub">
				<h3>часто задаваемые вопросы</h3><sup><a href="/faq/">Все вопросы</a></sup>
			</div>
<?$APPLICATION->IncludeComponent("bitrix:news.list", "faq", array(
	"IBLOCK_TYPE" => "content",
	"IBLOCK_ID" => "14",
	"NEWS_COUNT" => "5",
	"SORT_BY1" => "ACTIVE_FROM",
	"SORT_ORDER1" => "DESC",
	"SORT_BY2" => "SORT",
	"SORT_ORDER2" => "ASC",
	"FILTER_NAME" => "arrArticlesFilter",
	"FIELD_CODE" => array(
		0 => "ID",
		1 => "NAME",
		2 => "PREVIEW_TEXT",
		3 => "",
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
	"CACHE_TIME" => "3600",
	"CACHE_FILTER" => "Y",
	"CACHE_GROUPS" => "Y",
	"PREVIEW_TRUNCATE_LEN" => "",
	"ACTIVE_DATE_FORMAT" => "d.m.Y",
	"SET_TITLE" => "N",
	"SET_STATUS_404" => "Y",
	"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
	"ADD_SECTIONS_CHAIN" => "Y",
	"HIDE_LINK_WHEN_NO_DETAIL" => "Y",
	"PARENT_SECTION" => "",
	"PARENT_SECTION_CODE" => "",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "Y",
	"PAGER_TITLE" => "Новости",
	"PAGER_SHOW_ALWAYS" => "Y",
	"PAGER_TEMPLATE" => "",
	"PAGER_DESC_NUMBERING" => "Y",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "Y",
	"PREVIEW_WIDTH" => "150",
	"PREVIEW_HEIGHT" => "120",
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?>			

			
			<div class="arr"></div>
		</div><!-- .faq -->
		
		<div class="art">
			
			<div class="sub">
				<h3>Статьи</h3><sup><a href="/articles/">Все статьи</a></sup>
			</div>		
<?$APPLICATION->IncludeComponent("bitrix:news.list", "articles", array(
	"IBLOCK_TYPE" => "content",
	"IBLOCK_ID" => "12",
	"NEWS_COUNT" => "5",
	"SORT_BY1" => "ACTIVE_FROM",
	"SORT_ORDER1" => "DESC",
	"SORT_BY2" => "SORT",
	"SORT_ORDER2" => "ASC",
	"FILTER_NAME" => "arrArticlesFilter",
	"FIELD_CODE" => array(
		0 => "ID",
		1 => "NAME",
		2 => "PREVIEW_TEXT",
		3 => "",
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
	"CACHE_TIME" => "3600",
	"CACHE_FILTER" => "Y",
	"CACHE_GROUPS" => "Y",
	"PREVIEW_TRUNCATE_LEN" => "",
	"ACTIVE_DATE_FORMAT" => "d.m.Y",
	"SET_TITLE" => "N",
	"SET_STATUS_404" => "Y",
	"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
	"ADD_SECTIONS_CHAIN" => "Y",
	"HIDE_LINK_WHEN_NO_DETAIL" => "Y",
	"PARENT_SECTION" => "",
	"PARENT_SECTION_CODE" => "",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "Y",
	"PAGER_TITLE" => "Новости",
	"PAGER_SHOW_ALWAYS" => "Y",
	"PAGER_TEMPLATE" => "",
	"PAGER_DESC_NUMBERING" => "Y",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "Y",
	"PREVIEW_WIDTH" => "150",
	"PREVIEW_HEIGHT" => "120",
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?>	
		</div><!-- .art -->
		
		<div class="clear_fix"></div>
	</div><!-- .inform -->
	
	<div class="developer" id="developer">
		
		<h3>Производители</h3>
		
		<div class="inner">
<?$APPLICATION->IncludeComponent("matre:catalog.section.list", "trademarks", array(
	"IBLOCK_TYPE" => "catalog",
	"IBLOCK_ID" => "7",
	"SECTION_ID" => $_REQUEST["SECTION_ID"],
	"SECTION_CODE" => "",
	"COUNT_ELEMENTS" => "N",
	"TOP_DEPTH" => "1",
	"SECTION_FIELDS" => array(
		0 => "ID",
		1 => "CODE",
		2 => "NAME",
		3 => "SORT",
		4 => "PICTURE",
		5 => "",
	),
	"SECTION_USER_FIELDS" => array(
		0 => "",
		1 => "",
	),
	"SECTION_URL" => "/trademarks/?TRADEMARK=#ID#",
	"CACHE_TYPE" => "N",
	"CACHE_TIME" => "36000000",
	"CACHE_GROUPS" => "Y",
	"ADD_SECTIONS_CHAIN" => "Y",
	),
	false
);?>

			<div class="clear_fix"></div>
		</div>
		
		<div class="arrow">
			<a href="" class="l"></a>
			<a href="" class="r"></a>
		</div>
		
	</div><!-- .developer -->
	
</div><!-- #content -->

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
