 <?
 include($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

/*ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);*/



/*ПАНЕЛЬ УПРАВЛЕНИЯ*/

$update = 'N'; //Уведомление об обновлении БЗ

global $USER;
if ($USER->IsAdmin()) echo "




";


 

/*ПАНЕЛЬ УПРАВЛЕНИЯ*/
include 'include.php';

 ?>
<!DOCTYPE html>
 <html>
 <head>
 	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 	<title>База Знаний ЦОВ и ОК</title>
 	<link rel="stylesheet" href="/knowledge_base/css/style.css">
 	<link rel="stylesheet" href="/knowledge_base/css/switch.css">
 	<?CJSCore::Init();?>
 	<script src="/knowledge_base/scripts/jquery-1.8.3.js"></script>
 	<link rel="stylesheet" href="jquery.fancybox.min.css">
 	<link rel="stylesheet" href="/knowledge_base/src/hystmodal.css">
  <link rel="stylesheet" href="/knowledge_base/css/demos.css">

 	<script type="text/javascript" src="/knowledge_base/jquery.fancybox.min.js"></script>

 </head>
 <body>
 	<?
 	/* $APPLICATION->ShowHead(); */
 	CModule::IncludeModule('iblock');
 	$res = CIBlockElement::GetList(
 		array("SORT"=>"ASC"),
 		array(
 			'IBLOCK_CODE'=>'EDIT_DC',
 			'ACTIVE'=>'Y',
 			array(
 				"LOGIC" => "OR",
 				array('!PROPERTY_MEH_TSEH' => false),
 				array('!PROPERTY_KUZ_TSEH' => false),
 				array('!PROPERTY_SALES_DEPORT' => false),
 			)
 		),
 		false,
 		false,
 		array(
 			'NAME',
 			'ID',
 			"IBLOCK_ID",
 			"MODIFIED_BY",
 			'CODE',
 			'PREVIEW_PICTURE',
 			'PROPERTY_MEH_TSEH',
 			'PROPERTY_KUZ_TSEH',
 			'PROPERTY_SALES_DEPORT',
 			"TIMESTAMP_X",
 		)
 		//array ('NAME','ID','CODE','PREVIEW_PICTURE', "PROPERTY_SALES_DEPORT", "PROPERTY_KUZ_TSEH", "PROPERTY_MEH_TSEH")
 	);

 	while ($ob = $res->GetNextElement()){
	 	$arFields = $ob->GetFields();
		/*echo "<pre>";
		print_r($arFields);
		echo "</pre>";*/
		$arresult[$arFields['ID']]['NAME'] = $arFields['NAME'];
		$arresult[$arFields['ID']]['CODE'] = $arFields['CODE'];
		$arresult[$arFields['ID']]['PICTURE'] = CFile::GetFileArray($arFields['PREVIEW_PICTURE']);
	 	$arProps = $ob->GetProperties();
	 	// var_dump($arFields['ID']);
		$arresult[$arFields['ID']]["PROPS"]["MEH_TSEH"] = $arProps["MEH_TSEH"]["DESCRIPTION"];
		$arresult[$arFields['ID']]["PROPS"]["KUZ_TSEH"] = $arProps["KUZ_TSEH"]["DESCRIPTION"];
		$arresult[$arFields['ID']]["PROPS"]["SALES_DEPORT"] = $arProps["SALES_DEPORT"]["DESCRIPTION"];
 	}

 	foreach ($arresult as $key => &$item) {
 		$arselect = array('PROPERTY_KUZ_TSEH', "ID", "IBLOCK_ID");

 		$arCODE = explode('_', $item["CODE"]);
 		if ($arCODE[0] == 'SALE'){
 			$arselect = array ('PROPERTY_SALES_DEPORT', "ID", "IBLOCK_ID");
 		}

 		$res = CIBlockElement::GetList(
 			array(),
 			array(
 				'IBLOCK_CODE' => 'EDIT_DC',
 				'ACTIVE' => 'Y',
 				'CODE' => $item["CODE"]
 			),
 			false,
 			array('nTopCount' => 1),
 			$arselect
 		);

 		while ($arres = $res->GetNextElement()){
 			$arPropsDOP = $arres->GetProperties();

 			/*echo "<pre>";
 			print_r($arPropsDOP['KUZ_TSEH']);
 			echo "</pre>";*/

 			// var_dump($arCODE[0]);

 			if ($arCODE[0] == 'SALE'){
 				$arresult[$key]["PROPS"]["SALES_DEPORT"] = $arPropsDOP['SALES_DEPORT']["DESCRIPTION"];
 			}
 			else {
 				$arresult[$key]["PROPS"]['KUZ_TSEH'] = $arPropsDOP['KUZ_TSEH']["~DESCRIPTION"];
 			}
 		}

 		foreach ($item["PROPS"] as $prop_key => &$prop) {
 			$arProp = explode(";", $prop);

 			if (!intval($arProp[0])) {
 				unset($arresult[$key]["PROPS"][$prop_key]);
 				continue;
 			}

 			$prop = array(
 				"TIMESTAMP" => $arProp[0],
				"DATE" => date("c", $arProp[0]),
				//"USER" => $arProps[1]
			);
 		}
 	}


 	?>

<? /* $APPLICATION->IncludeComponent("bitrix:fileman.light_editor","",Array(
    "CONTENT" => "",
    "INPUT_NAME" => "",
    "INPUT_ID" => "",
    "WIDTH" => "100%",
    "HEIGHT" => "300px",
    "RESIZABLE" => "Y",
    "AUTO_RESIZE" => "Y",
    "VIDEO_ALLOW_VIDEO" => "N",
    "USE_FILE_DIALOGS" => "N",
    "ID" => "",
    "JS_OBJ_NAME" => ""
    )
    ); */
    ?>
    <header>
    	<!-- <div class="header" align="left">
    		<img style="max-width: 100%; height: 200px;" src="img/logo2.png">
    		<div class="chat">
    			<h1 class="white">База Знаний ЦОВ и ОК</h1>
    			<br>
    			<div align="center"> <a href="javascript:window.location.reload()"><img src="img/avilon.png" width="400" height="70"> </a> </div>
							
																	<?warning()?>
    		</div>
    	</div> -->
<!-- <table width=100% cellspacing="0" cellpadding="0" border="0">
<tr>
<td ><img src="img/right.png" height="200px" align=center></td>
<td background="img/between.png">&nbsp </td>
<td><img src="img/left.png" height="200px" align=center></td>
</tr>
</table>

<table style="background: url(images/tt2.png)"
width= 100%
height=200px
border="1"
bgcolor="#e6e6fa"
cellpadding="10">	
<tr><td
rowspan="2"
style="width:80%">
</td></tr> -->
<table class="table_head">
 <tr>
 <td> <img src="img/right.png"> </td>
 <td width="405px"><a href="javascript:window.location.reload()"><img src="img/avilon.png" width="400" height="70" align="center"></a><!-- &nbsp --> </td>
 <td align="right"> <img src="img/left.png" align="right"> </td>
 
 
 </tr>
 </table>



    </header>
<div class="one"><h1><b> БАЗА ЗНАНИЙ ЦОВ И ОК</b></h1></div>
    <div class="menu" align="center">
    	<div class="menu_wrapper">
    			<div class="menu_item">
    					<a data-fancybox="modal" data-src="http://ipsoftrec.avilon-nymm.ru/tv/index.php"href="#">
    				   <div class="thumbs goHome">
    						   <img src="img/im.png">
    						      <div class="caption">
    							        <span class="title">Статистика</span>
    						      </div>
    				    </div>
    					</a>
    			</div>

<div class="hystmodal" id="modalLong" aria-hidden="true">
        <div class="hystmodal__wrap">
            <div class="hystmodal__window" role="dialog" aria-modal="true">
                <button class="hystmodal__close" data-hystclose>Закрыть</button>
                <div class="hystmodal__styled">      
      <ul>
			<div class="layout">
	         <div class="thumbs" data-CODE='<?=$aritim['CODE']?>' data-ID='<?=$key?>'>
    					<img src="<?=$aritim['PICTURE']['SRC'] ?>" style="<?=$aritim['PICTURE']['DESCRIPTION']?>"><!--"width: 61px; height: 100px;"-->
    					<div class="caption">
    						<span class="title"><?=$aritim['NAME']?></span>
    					</div>
						  <div class="data">
							<?$propsCount = count($aritim["PROPS"]);
							foreach ($aritim["PROPS"] as $key => $props) {?>
								<div class="indicator <?=((strtotime("now") - intval($props["TIMESTAMP"])) > (strtotime("now") - strtotime("today"))) ?: "green"?> <?="col-".$propsCount?>"></div>
							<?}?>
						  </div>
    				</div>
    			</div>	
		  </ul>
      </div>
    </div>
  </div>
</div>


    			<?
    			$delimer=intval(count($arresult)/1);
    			$i=1;
    			foreach ($arresult as $key=> $aritim) {?>
    			<div class="menu_item">
    				<a data-hystmodal="#modalLong" href="#modalLong">
    				<div class="thumbs" data-CODE='<?=$aritim['CODE']?>' data-ID='<?=$key?>'>
    					<img src="<?=$aritim['PICTURE']['SRC'] ?>" style="<?=$aritim['PICTURE']['DESCRIPTION']?>"><!--"width: 61px; height: 100px;"-->
    					<div class="caption">
    						<span class="title"><?=$aritim['NAME']?></span>
    					</div>
						<div class="data">
							<?$propsCount = count($aritim["PROPS"]);
							foreach ($aritim["PROPS"] as $key => $props) {?>
								<div class="indicator <?=((strtotime("now") - intval($props["TIMESTAMP"])) > (strtotime("now") - strtotime("today"))) ?: "green"?> <?="col-".$propsCount?>"></div>
							<?}?>
						</div>
    				</div></a>
    			</div>
    			<? if ($i == $delimer) {
    				echo '</div><div class="menu_wrapper">';
    			}
    			$i++;
    		}
    		?>
    	</div>
</div>



<!-- HTML модального окна -->
<div class="hystmodal" id="modalLongnew" aria-hidden="true">
        <div class="hystmodal__wrap">
            <div class="hystmodal__window" role="dialog" aria-modal="true">
                <button class="hystmodal__close" data-hystclose>Закрыть</button>
                <div class="hystmodal__styled">    
        <ul>
        	<?$APPLICATION->IncludeComponent("bitrix:news.list","knowledge_base",Array(
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_MODE" => "N",
		"IBLOCK_TYPE" => "news_call",
		"IBLOCK_ID" => "96",
		"NEWS_COUNT" => "5",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "ACTIVE_FROM", /*NAME*/
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
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "3600",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
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
			<?$arGroups = $USER::GetUserGroup($USER->GetID());?>
	<?if(in_array(27, $arGroups)  || in_array(1, $arGroups)){?>
		<div class="showAddNews">Добавить новость</div>
	<?}?>
  

	<div class="add_news" align="center" id="popup">
			<h1> Добавить новость </h1>
		<form>
			<hr>
			<input type="text" name="news_name" placeholder="Название новости">
			<input type="hidden" name="IBLOCK" value="96">
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
	
		</ul>
      </div>
    </div>
  </div>
</div>



<!-- END Разметка на главной -->

<div class="footer" align="left">

	<!-- Меню -->
	<!-- PDF файлы -->
<div class="popup_wrapper" id="agrogrib">
<embed src="/knowledge_base/content/AgroGrib1.pdf" width="900" height="850" />
</div>

<div class="popup_wrapper" id="OPRP">
<embed src="/knowledge_base/content/OPRP.pdf" width="900" height="850" />
</div>

<div class="popup_wrapper" id="tender">
<embed src="/knowledge_base/content/tender.pdf" width="900" height="850" />
</div>

<div class="popup_wrapper" id="Push">
<embed src="/knowledge_base/content/Push.pdf" width="900" height="850" />
</div>

<div class="popup_wrapper" id="status">
<embed src="/knowledge_base/content/status.pdf" width="900" height="850" />
</div>

<div class="popup_wrapper" id="otkaz">
<embed src="/knowledge_base/content/otkaz.pdf" width="900" height="850" />
</div>

<div class="popup_wrapper" id="izm_name">
<embed src="/knowledge_base/content/izm_name.pdf" width="900" height="850" />
</div>

<div class="popup_wrapper" id="solt">
<embed src="/knowledge_base/content/solt.pdf" width="900" height="850" />
</div>

<div class="popup_wrapper" id="algoritm_director">
<embed src="/knowledge_base/content/algoritm_director.pdf" width="900" height="850" />
</div>

<div class="popup_wrapper" id="directorat">
<embed src="/knowledge_base/content/directorat.pdf" width="900" height="850" />
</div>

<div class="popup_wrapper" id="info_director">
<embed src="/knowledge_base/content/info_director.pdf" width="900" height="850" />
</div>

<div class="popup_wrapper" id="disposition">
<embed src="/knowledge_base/content/disposition.pdf" width="900" height="850" />
</div>

<div class="popup_wrapper" id="kredit">
<embed src="/knowledge_base/content/kredit.pdf" width="900" height="850" />
</div>

<div class="popup_wrapper" id="strachovka">
<embed src="/knowledge_base/content/strachovka.pdf" width="900" height="850" />
</div>

<div class="popup_wrapper" id="presentation">
<embed src="/knowledge_base/content/presentation.pdf" width="900" height="850" />
</div>

<div class="popup_wrapper" id="BH">
<embed src="/knowledge_base/content/BH.pdf" width="900" height="850" />
</div>

<div class="popup_wrapper" id="flit">
<embed src="/knowledge_base/content/flit.pdf" width="900" height="850" />
</div>

<div class="popup_wrapper" id="lising">
<embed src="/knowledge_base/content/lising.pdf" width="900" height="850" />
</div>

<div class="popup_wrapper" id="model_cars">
<embed src="/knowledge_base/content/model_cars.pdf" width="900" height="850" />
</div>

<div class="popup_wrapper" id="any_numbers">
<embed src="/knowledge_base/content/any_numbers.pdf" width="900" height="850" />
</div>

<div class="popup_wrapper" id="priemka">
<embed src="/knowledge_base/content/priemka.pdf" width="900" height="850" />
</div>

<div class="popup_wrapper" id="status_call">
<embed src="/knowledge_base/content/status_call.pdf" width="900" height="850" />
</div>

<div class="popup_wrapper" id="service">
<embed src="/knowledge_base/content/service.pdf" width="900" height="850" />
</div>

<div class="popup_wrapper" id="cisco">
<embed src="/knowledge_base/content/Cisco_Agent_desktop.pdf" width="900" height="850" />
</div>

<div class="popup_wrapper" id="autologistic">
<embed src="/knowledge_base/content/autologistics.pdf" width="900" height="850" />
</div>


<!-- PDF файлы END-->





<ul id="menu">
	<li><a href="/knowledge_base/">Главная</a></li>

	<!-- <li><a data-fancybox="modal" data-src="#autologistic" href="#">Автологистика</a></li>
	<li><a href="#">АкитА</a>
		<ul>
		<li><a data-fancybox="modal" data-src="#tender" href="#">Тендерный отдел</a></li>
		<li><a data-fancybox="modal" data-src="#OPRP" href="#">Соедин. с ОПРП</a></li>
		</ul>
	</li>
	<li><a data-fancybox="modal" data-src="#agrogrib" href="#">Агрогриб</a></li>
	<li><a href="#">Рассылки</a>
		<ul>
		<li><a data-fancybox="modal" data-src="#Push" href="#">Push-сообщения</a></li>
		<li><a data-fancybox="modal" data-src="#status" href="#">Статус источника</a></li>
		<li><a data-fancybox="modal" data-src="#otkaz" href="#">Скрипт при отказе</a></li>
		<li><a data-fancybox="modal" data-src="#izm_name" href="#">Изменение имени</a></li>
		</ul>
	</li>
	
	<li><a data-fancybox="modal" data-src="#solt" href="#">Солт</a></li>
	<li><a href="#">Директорат</a>
		<ul>
		<li><a data-fancybox="modal" data-src="#directorat" href="#">Директорат</a></li>
		<li><a data-fancybox="modal" data-src="#algoritm_director" href="#">Алгоритм</a></li>
		<li><a data-fancybox="modal" data-src="#info_director" href="#">Инструкция</a></li>
		</ul>
	</li>
		
	<li><a href="#">Диспозиция и др.</a>
		<ul>
		<li><a data-fancybox="modal" data-src="#disposition" href="#">Диспозиция</a></li>
		<li><a data-fancybox="modal" data-src="#strachovka" href="#">Страхование</a></li>
		<li><a data-fancybox="modal" data-src="#kredit" href="#">Кредитование</a></li>
		<li><a data-fancybox="modal" data-src="#presentation" href="#">Гарантия</a></li>
		<li><a data-fancybox="modal" data-src="#cisco" href="#">Ошибки Cisco</a></li>
		</ul>
	</li>
	
	<li><a data-fancybox="modal" data-src="#BH" href="#">Бухгалтерия</a></li>
	<li><a data-fancybox="modal" data-src="#flit" href="#">Флит отделы</a></li>
	<li><a href="#">Общие схемы</a>
		<ul>
		<li><a data-fancybox="modal" data-src="#lising" href="#">Лизинг</a></li>
		<li><a data-fancybox="modal" data-src="#model_cars" href="#">Модельный ряд</a></li>
		<li><a data-fancybox="modal" data-src="#any_numbers" href="#">Общ.номера</a></li>
		<li><a data-fancybox="modal" data-src="#priemka" href="#">Приемка</a></li>
		<li><a data-fancybox="modal" data-src="#status_call" href="#">Статусы</a></li>
		<li><a data-fancybox="modal" data-src="#service" href="#">Сервис</a></li>
		</ul>
	</li> -->
	
	<li><a href="/knowledge_base/pools/">Опросы</a></li>
	<li><a data-hystmodal="#modalLongnew" href="#modalLongnew">Новости</a></li>
	</ul>
	<!-- END Меню -->

	<br><br><br><br>
	<div align="center">
		<font face="MS Sans Serif" size="2" color="white">
			<script src="/knowledge_base/script.js"></script>
			<script language="JavaScript">
d0 = new Date('July 12, 2013'); // ДАТА
d1 = new Date();
dt = (d1.getTime() - d0.getTime()) / (1000*60*60*24);
document.write('<SMALL>');
document.write('Базе знаний <B>' + Math.round(dt) + '</B> -й день.');
document.write('</SMALL>');
</script>
</font>

<!-- SWITCH -->
<!-- <div class="container">
		<div class="switch white">
			<input type="radio" name="switch" id="switch-off" onclick="document.location='../knowledge_base/index.php?url=new';" checked>
				<input type="radio" name="switch" id="switch-on" onclick="document.location='../knowledge_base/NEW.php';">
					<div class="name">
						Новогодний режим
					</div>
				<label for="switch-off">Выкл</label>
			<label for="switch-on">Вкл</label>

			<span class="toggle"></span>
		</div>
</div>-->
<!-- SWITCH -->

</div>

</div>

</body>
</html>

<script src="/knowledge_base/dist/hystmodal.min.js"></script>
    <script>
        const myModal = new HystModal({
            // for dynamic init() of modals
            // linkAttributeName: false,
            catchFocus: true,
            closeOnEsc: true,
            backscroll: true,
            beforeOpen: function(modal){
                console.log('Message before opening the modal');
                console.log(modal); //modal window object
            },
            afterClose: function(modal){
                console.log('Message after modal has closed');
                console.log(modal); //modal window object

                //If Youtube video inside Modal, close it on modal closing
                let videoframe = modal.openedWindow.querySelector('iframe');
                if(videoframe){
                    videoframe.contentWindow.postMessage('{"event":"command","func":"stopVideo","args":""}', '*');
                }
            },
        });
        // for dynamic init() of modals
        // myModal.config.linkAttributeName = 'data-hystmodal';
        // myModal.init();
    </script>