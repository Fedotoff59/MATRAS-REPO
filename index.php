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
		
		<h3>������� �������</h3>
		
		<ul>
			<li>
				<strong><a href="">�������</a></strong>
				<ul>
					<li><a href="">���������</a></li>
					<li><a href="">������������</a></li>
					<li><a href="">������ �������</a></li>
					<li><a href="">�������</a></li>
				</ul>
			</li>
			<li>
				<strong><a href="">������� �������</a></strong>
				<ul>
					<li><a href="">���������</a></li>
					<li><a href="">������������</a></li>
				</ul>
			</li>
			<li>
				<strong>�������������� ���������</strong>
				<ul>
					<li><a href="">����������</a></li>
					<li><a href="">�������������</a></li>
				</ul>
			</li>
			<li>
				<strong><a href="">�������</a></strong>
				<ul>
					<li><a href="">����</a></li>
					<li><a href="">������� ������</a></li>
					<li><a href="">������ ������</a></li>
					<li><a href="">������� �������</a></li>
				</ul>
			</li>
			<li>
				<strong><a href="">����������</a></strong>
				<ul>
					<li><a href="">�������</a></li>
					<li><a href="">������������</a></li>
					<li><a href="">�����, ������</a></li>
				</ul>
			</li>
		</ul>
		
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
		<div class="bg"></div>
		
		<h3>���������� ������</h3>
		
		<div class="inner">
			<ul>
				
				<li>
					<div class="img">
						<img src="<?=SITE_TEMPLATE_PATH?>/files/pop-1.png" alt=""/>
					</div>
					<a href="">Season Mix SmartSpring</a>
					<div class="text">
						������ �� ������ ����������� ����������. ��������������� ��������� ����� �������...
					</div>
					<div class="price">
						7 720 ���.
					</div>
				</li>
				
				<li>
					<div class="img">
						<img src="<?=SITE_TEMPLATE_PATH?>/files/pop-2.png" alt=""/>
					</div>
					<a href="">Optima Lux EVS</a>
					<div class="text">
						������������� ������ ������� ���������. ������ ������� ���� ����������� ������...
					</div>
					<div class="price">
						7 720 ���.
					</div>
				</li>
				
				<li>
					<div class="img">
						<img src="<?=SITE_TEMPLATE_PATH?>/files/pop-3.png" alt=""/>
					</div>
					<a href="">����������� ����</a>
					<div class="text">
						������ ���������� ������ ������ �� ����� Season mix EVS500 �������������� ������...
					</div>
					<div class="price">
						7 720 ���.
					</div>
				</li>
				
				<li>
					<div class="img">
						<img src="<?=SITE_TEMPLATE_PATH?>/files/pop-4.png" alt=""/>
					</div>
					<a href="">SOFT ���� ������</a>
					<div class="text">
						�������������� ������ � ������������� �� ��������� ���������. 
					</div>
					<div class="price">
						7 720 ���.
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
			<h3>���� ������</h3>
		</div>
		
		<ul>
			
			<li>
				<div class="title">�������</div>
				<div class="img">
					<img src="<?=SITE_TEMPLATE_PATH?>/files/cat-1.png" alt=""/>
				</div>
				<a href="">���������,</a> <a href="">������������,</a> <br/><a href="">������ �������,</a> <a href="">�������</a>
			</li>
			
			<li>
				<div class="title">������� �������</div>
				<div class="img">
					<img src="<?=SITE_TEMPLATE_PATH?>/files/cat-2.png" alt=""/>
				</div>
				<a href="">���������,</a> <a href="">������������,</a>
			</li>
			
			<li>
				<div class="title">�������������� ���������</div>
				<div class="img">
					<img src="<?=SITE_TEMPLATE_PATH?>/files/cat-3.png" alt=""/>
				</div>
				<a href="">����������,</a> <a href="">�������������</a>
			</li>
			
			<li class="clear_fix"></li>
			
			<li>
				<div class="title">�������</div>
				<div class="img">
					<img src="<?=SITE_TEMPLATE_PATH?>/files/cat-4.png" alt=""/>
				</div>
				<a href="">����,</a> <a href="">������� ������,</a> <br/><a href="">������ ������,</a> <a href="">������� �������</a>
			</li>
			
			<li>
				<div class="title">����������</div>
				<div class="img">
					<img src="<?=SITE_TEMPLATE_PATH?>/files/cat-5.png" alt=""/>
				</div>
				<a href="">�������,</a> <a href="">������������,</a> <a href="">�����,</a> <a href="">������</a>
			</li>
			
			<li>
				<div class="title">������� � �������</div>
				<div class="img">
					<img src="<?=SITE_TEMPLATE_PATH?>/files/cat-6.png" alt=""/>
				</div>
				<a href="">�������� ��� ������ >></a>
			</li>
			
			<li class="clear_fix"></li>
			
		</ul>
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
