<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("�������");
?> 
    
<div id="slider">
        <div class="inner">
            <?$APPLICATION->IncludeFile(
                        "/include/top_slider.php",
                    	Array(),
                    	Array("MODE"=>"text","NAME"=>"�������")
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
			<h3>������ �� ����������</h3>
		</div>
		
		<div class="item">
			<div class="level">������ �������</div>
			<select name="">
				<option>80 x 200 ��</option>
				<option>80 x 200 ��</option>
				<option>80 x 200 ��</option>
				<option>80 x 200 ��</option>
				<option>80 x 200 ��</option>
				<option>80 x 200 ��</option>
			</select>
		</div>
		
		<div class="item" id="price">
			<div class="level">����</div>
			��:&nbsp;<input type="text" name="" id="start" value="200000"/>&nbsp;��:&nbsp;<input type="text" name="" id="end" value="2000000"/>
			<div class="box"></div>
		</div>
		
		<div class="item">
			<div class="level">�����</div>
			<div class="li">
				<label><input type="checkbox" name="" checked="checked"/> Lonax Premium</label>
			</div>
			<div class="li">
				<label><input type="checkbox" name=""/> ASKONA</label>
			</div>
			<div class="li">
				<label><input type="checkbox" name=""/> �������</label>
			</div>
			<div class="li">
				<label><input type="checkbox" name=""/> ��������-������</label>
			</div>
			<div class="">
				<label><input type="checkbox" name=""/> ���</label>
			</div>
		</div>
		
		<div class="item">
			<div class="level">������ �������</div>
			<select name="">
				<option>���������</option>
				<option>���������</option>
				<option>���������</option>
				<option>���������</option>
				<option>���������</option>
				<option>���������</option>
				<option>���������</option>
			</select>
		</div>
		
		<div class="bt">
			<button type="submit">�������� 25 �������</button>
		</div>
		
	</div><!-- .filter -->
	
	<div class="widget cat_list">
		
<?$APPLICATION->IncludeComponent("bitrix:catalog.section.list","tree",
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
		"ADD_SECTIONS_CHAIN" => "Y",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_NOTES" => "",
		"CACHE_GROUPS" => "Y"
	)		
);?>
		
	</div><!-- .cat_list -->
	
	<div class="widget sert">
		
		<div class="sub">
			<h3>���� �����������</h3>
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
                <?
                    global $arrPopularFilter;
                    $arrPopularFilter = Array(
                        "PROPERTY_POPULAR_VALUE" => "Y"
                    );
                ?>
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
                    "FILTER_NAME" => "arrPopularFilter",
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
                    "PAGER_TITLE" => "�������",
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
				<h3>����� ���������� �������</h3><sup><a href="">��� �������</a></sup>
			</div>
			
			<ul>
				<li>
					<div class="title">
						<a href="">��� ��� 90��, ����� ������ ��� ������?</a>
					</div>
					��������� ������ �� ����������� ��������� �����. ��� ������� �������� ��� ���� 90 ��. 
					<br/>
					���������� ��� ���� ���������� ��������� �������, ���� �������� ������������...
				</li>
				
				<li>
					<div class="title">
						<a href="">������� ����� �������� ������� FLEX 160X200</a>
					</div>
					��������� � �������� ������� � ������� �������� � ������ ��� �� ��������
				</li>
				
				<li>
					<div class="title">
						<a href="">������ ����. �� �������� ���� ��������?</a>
					</div>
					������������. �������� �� �������� �������������� ������������ ��������� �� ��� ����� ��� �� ����� ������������.
				</li>
				
				<li>
					<div class="title">
						<a href="">��������� �� �� ������ �����c �� ���������� � ������� ��� �����?</a>
					</div>
					��  ������ ����� ������������ �� ������� ��������.
				</li>
				
			</ul>
			
			<div class="arr"></div>
		</div><!-- .faq -->
		
		<div class="art">
			
			<div class="sub">
				<h3>������</h3><sup><a href="">��� ������</a></sup>
			</div>
			
			<ul>
				<li>
					<div class="title">
						<a href="">��� 10 ������� �� ������ �������</a>
					</div>
					������� �� ����� �������������� �������� ���������� ������������ ������� ����������� ������������� �������, ������������ ������������, ������������� � �������� ����������������. ������� ��������... 
				</li>
				
				<li>
					<div class="title">
						<a href="">������� ������������ ������� � ����� ��������</a>
					</div>
					��������� ���������� ������ �����!
					<br/>
					��� �������, ������������ �� ������ ����� ��������������� � ������� �� ������������������ � ��������������� ���������� ��������������...
				</li>
				
				<li>
					<div class="title">
						<a href="">������ �������� ������������ �������</a>
					</div>
					�� ����� ������ ������ �� ����� �������� ��� ���, ����� ������ �����?�. ������ �������, ����� ������ �����: ������ � ����������� ��������� ������ TFK, � ����������� ��������� ������...
				</li>
				
			</ul>
			
		</div><!-- .art -->
		
		<div class="clear_fix"></div>
	</div><!-- .inform -->
	
	<div class="developer" id="developer">
		
		<h3>�������������</h3>
		
		<div class="inner">
                                    <?$APPLICATION->IncludeComponent("bitrix:news.list","trademarks",Array(
                    "DISPLAY_DATE" => "Y",
                    "DISPLAY_NAME" => "Y",
                    "DISPLAY_PICTURE" => "Y",
                    "DISPLAY_PREVIEW_TEXT" => "Y",
                    "AJAX_MODE" => "N",
                    "IBLOCK_TYPE" => "catalog",
                    "IBLOCK_ID" => "7",
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
                    "PAGER_TITLE" => "�������������",
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

			<div class="clear_fix"></div>
		</div>
		
		<div class="arrow">
			<a href="" class="l"></a>
			<a href="" class="r"></a>
		</div>
		
	</div><!-- .developer -->
	
</div><!-- #content -->

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
