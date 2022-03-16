<?//include($_SERVER["DOCUMENT_ROOT"]."/knowledge_base/pools/.menu.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Опросы|База Знаний ЦОВ и ОК</title>
				<link rel="stylesheet" href="/knowledge_base/pools/css/style_dev2.css">
				<link rel="stylesheet" href="/knowledge_base/jquery.fancybox.min.css">
	</head>
 <body>
	<?
	include($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
	$arGroups = $USER::GetUserGroup($USER->GetID());
	$sMenu = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/knowledge_base/pools/.menu.php");
	$arMenu = unserialize($sMenu);
	?>
    <!-- БОКОВОЕ МЕНЮ -->
    <div class="menu_2">

      <!-- Иконка меню -->
	<div class="icon-close">
		<img src="images/close-btn.png">
	</div>

	<?if(in_array(27, $arGroups) || in_array(1, $arGroups)){?>
		<img src="/knowledge_base/pools/images/ADD.png" class="add">
	<?}?>
      <!-- Меню -->
      <ul class="left_menu_tems">
      	<?foreach($arMenu as $key => $menyItem){?>
        	<li class="menu_item" data-src=<?=$key?>>
				<?if(in_array(27, $arGroups) || in_array(1, $arGroups)){?>
					<img src="/knowledge_base/pools/images/EDIT.png" class="edit">
        		<?}?>
				<a class="fancybox" data-fancybox-type="iframe" href="javascript:;" data-src="<?='/knowledge_base/pages_instructions/page'.$key.'.pdf'?>"><?=$menyItem?></a>


        	</li>
		<?}?>
      </ul>
    </div>
	  <!-- БОКОВОЕ МЕНЮ -->

<div class="wrapper">

 <?
CModule::IncludeModule('iblock');

$res=CIBlockElement::GetList(
	array(),
	array(
		'IBLOCK_CODE'=>'EDIT_DC',
		'ACTIVE'=>'Y',
		array(
			"LOGIC" => "OR",
			array('!PROPERTY_AFTER_SERVICE_M' => false),
			array('!PROPERTY_ADD_FIELD' => false),
			array('!PROPERTY_AFTER_SERVICE_K' => false),
			array('!PROPERTY_AFTER_SALES' => false),
		)
	),
	false,
	false,
	array ('NAME','ID','CODE','PREVIEW_PICTURE')
);

while ($arres=$res->fetch()){
	$arresult [$arres['ID']]['NAME']=$arres['NAME'];
	$arresult [$arres['ID']]['CODE']=$arres['CODE'];
	$arresult [$arres['ID']]['PICTURE']=CFile::GetFileArray($arres['PREVIEW_PICTURE']);
}
 ?>

<header>
	<div class="header" align="left">
		<div id="garland" class="garland_4">
			<div id="nums_1">1</div>
		</div>
	    <div class="icon-menu">
            <img src="images/menu-ham-icon.png">
                <font color="black">Инструкции</font>
        </div>
		<img src="img/logo.png">
			<div class="chat">
				<h1 class="white">Опросы</h1>
				<br>
				<div align="center"><img src="img/phone.png" width="85px" height="85px"></div>
				<div id="snow"></div>
			</div>
	</div>
</header>
<div class="menu" align="center">
<table class="table">
	<tr>
		<td>
			<a href="javascript:history.back()" onMouseOver="window.status='Назад';return true">
				<div class="thumbs goHome">
					<img src="/knowledge_base/img/home.png" width="15px" height="15px">
					<div class="caption">
						<span class="title">Главная</span>
					</div>
				</div>
			</a>
		</td>
<?
$delimer=intval(count($arresult)/2);
$i=1;
foreach ($arresult as $key=> $aritim) {?>
    <td>
		<div class="thumbs" data-CODE='<?=$aritim['CODE']?>' data-ID='<?=$key?>'>
			<img src="<?=$aritim['PICTURE']['SRC'] ?>" style="<?=$aritim['PICTURE']['DESCRIPTION']?>"><!--"width: 61px; height: 100px;"-->
					<div class="caption">
						<span class="title"><?=$aritim['NAME']?></span>
					</div>
		</div>
	</td>
		<? if ($i == $delimer) {
			echo '</tr><tr>';
		}
		$i++;
}
?>
	</tr>
</table>
</div>

  <!-- Разметка на главной -->

  <div class="layout">
  <?$APPLICATION->IncludeComponent("bitrix:news.list","knowledge_base",Array(
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "AJAX_MODE" => "N",
        "IBLOCK_TYPE" => "news_call_pools",
        "IBLOCK_ID" => "98",
        "NEWS_COUNT" => "5",
        "SORT_BY1" => "SORT",
        "SORT_ORDER1" => "DESC",
        "SORT_BY2" => "SORT",
        "SORT_ORDER2" => "ASC",
        "FILTER_NAME" => "",
        "FIELD_CODE" => Array("TIMESTAMP_X"),
        "PROPERTY_CODE" => Array("DESCRIPTION"),
        "CHECK_DATES" => "Y",
        "DETAIL_URL" => "",
        "PREVIEW_TRUNCATE_LEN" => "",
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "SET_TITLE" => "Y",
        "SET_BROWSER_TITLE" => "Y",
        "SET_META_KEYWORDS" => "Y",
        "SET_META_DESCRIPTION" => "Y",
        "SET_LAST_MODIFIED" => "Y",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
        "ADD_SECTIONS_CHAIN" => "Y",
        "HIDE_LINK_WHEN_NO_DETAIL" => "Y",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "INCLUDE_SUBSECTIONS" => "Y",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "3600",
        "CACHE_FILTER" => "Y",
        "CACHE_GROUPS" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "PAGER_TITLE" => "Новости",
        "PAGER_SHOW_ALWAYS" => "Y",
        "PAGER_TEMPLATE" => "modern",
        "PAGER_DESC_NUMBERING" => "Y",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_BASE_LINK_ENABLE" => "Y",
        "SET_STATUS_404" => "Y",
        "SHOW_404" => "Y",
        "MESSAGE_404" => "",
        "PAGER_BASE_LINK" => "",
        "PAGER_PARAMS_NAME" => "arrPager",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_ADDITIONAL" => ""
    )
);?>

	<?if(in_array(27, $arGroups)  || in_array(1, $arGroups)){?>
		<div class="showAddNews">Добавить новость</div>
	<?}?>

	<div class="add_news" align="center" id="popup">
		<h1> Добавить новость </h1>
		<form>
		<hr>
			<input type="text" name="news_name" placeholder="Название новости">
			<input type="hidden" name="IBLOCK" value="98">
		<hr>
		</form>

		<?$APPLICATION->ShowHead();?>
		<?$APPLICATION->IncludeComponent("bitrix:fileman.light_editor", "", array(
			"CONTENT" => "",
			"INPUT_NAME" => "",
			"INPUT_ID" => "",
			"WIDTH" => "100%",
			"HEIGHT" => "500px",
			"RESIZABLE" => "N",
			"AUTO_RESIZE" => "N",
			"VIDEO_ALLOW_VIDEO" => "N",
			"USE_FILE_DIALOGS" => "N",
			"ID" => ""	,
			"JS_OBJ_NAME" => ""
			),
			false
		);?>
		<div class="saveNewsButton">Сохранить</div>
	</div>

</div>
  <!-- END Разметка на главной -->
  <div class="footer" align="left">
  <script src="/knowledge_base/scripts/jquery-1.8.3.js"></script>
  <script type="text/javascript" src="/knowledge_base/jquery.fancybox.min.js"></script>
  <script type="text/javascript" src="/knowledge_base/pools/menu.js"></script>
  <script type="text/javascript" src="/knowledge_base/scripts/left_menu.js"></script>
<!-- Меню -->
<?include($_SERVER["DOCUMENT_ROOT"]."/knowledge_base/menu.php");?>
<br> <br> <br> <br>
<div align="center">
	<font face="MS Sans Serif" size="2" color="white">
			<script language="JavaScript">
				d0 = new Date('July 12, 2013'); // ДАТА
				d1 = new Date();
				dt = (d1.getTime() - d0.getTime()) / (1000*60*60*24);
				document.write('<SMALL>');
				document.write('Базе знаний <B>' + Math.round(dt) + '</B> -й день.');
				document.write('</SMALL>');

				function saveClick(){
	$(".saveResult").on("click", function(){
		$editedBlock = $(this).parent(".block_content");
		var frameContent = $(this).parent(".block_content").find("iframe").contents().find("body").html();
		var blockCode = $(this).parent(".block_content").data("block");
		var blockID = $(this).parent(".block_content").data("id");

		$.ajax({
			url: '/knowledge_base/pools/ajax_edit_blocks.php',
			type: 'POST',
			data: {
				HTML: frameContent,
				SAVE: "Y",
				BLOCK_CODE: blockCode,
				BLOCK_ID: blockID
			},
			success: function(html){
				$editedBlock.html(html);
				$editedBlock.parent(".col").find(".edit_col").show();
			}
		})

		console.log(frameContent);
		console.log(blockCode);
	})
}

function editCol(){
	$(".edit_col").on("click", function(){

		var $editedBlock = $(this).parent(".col").find(".block_content");
		var blockText = $editedBlock.html();

		$.ajax({
			url: '/knowledge_base/pools/ajax_edit_blocks.php',
			type: 'POST',
			data: {
				TEXT: blockText
			},
			success: function(html){
				$editedBlock.html(html);
				$editedBlock.parent(".col").find(".edit_col").hide();
				saveClick();
			}
		})
	})
}

function toggleHeight() {
	$(".toggle").on("click", function() {
		$(this).parent(".col").toggleClass("hide");
		$(this).siblings(".edit_col").fadeToggle("slow");
	})
}

$(document).ready(function(){
	$('.thumbs').on('click',function(){
		if(!$(this).hasClass("goHome")){
			var elemID = $(this).data('id');
			var elemCODE = $(this).data('code');
			$.ajax({
				url: '/knowledge_base/pools/ajax.php',
				type: 'POST',
				data: {
					ID: elemID, CODE: elemCODE
				},
				success: function(html){
					$('.layout').html (html);
					editCol();
					toggleHeight();
				}
			})
		}
	})

	editCol();
		$('#menu').find('li').on('mouseenter',function(){
			var $submenu = $(this).find('ul');
			var pos=$(this).offset();
			var submenuitems = $submenu.find('li').length;
			if(submenuitems > 0){
				console.log("-"+ submenuitems * 45+"px");
				$submenu.css("top", "-"+ submenuitems * 45+"px");
			}
		})
	$(".showAddNews").on("click", function(){
		$(".add_news").fadeToggle();
	})

	$(".saveNewsButton").on("click", function(){
		var frameContent = $(this).parent(".add_news").find("iframe").contents().find("body").html();
		var Name = $(this).parent(".add_news").find("input[name='news_name']").val();
		var iBlock = $(this).parent(".add_news").find("input[name='IBLOCK']").val();

		$.ajax({
			url: '/knowledge_base/addNews.php',
			type: 'POST',
			data: {
				NAME: Name, TEXT: frameContent, IBLOCK: iBlock
			},
			success: function(res){
				var data = $.parseJSON(res);
				if(data.STATUS == "OK"){
					$(".add_news").fadeToggle();
				}
				alert(data.TEXT);
			}
		})

		})
		})

/* ОФОРМЛЕНИЕ */

function garland() {
  nums = document.getElementById('nums_1').innerHTML
  if (nums == 1) {
    document.getElementById('garland').className = 'garland_1';
    document.getElementById('nums_1').innerHTML = '2'
  }
  if (nums == 2) {
    document.getElementById('garland').className = 'garland_2';
    document.getElementById('nums_1').innerHTML = '3'
  }
  if (nums == 3) {
    document.getElementById('garland').className = 'garland_3';
    document.getElementById('nums_1').innerHTML = '4'
  }
  if (nums == 4) {
    document.getElementById('garland').className = 'garland_4';
    document.getElementById('nums_1').innerHTML = '1'
  }
}

setInterval(function() {
  garland()
}, 600)

/* ОФОРМЛЕНИЕ */

</script>
</font>
</div>
</div>
  </div>
 </body>
</html>