 <?
 include($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
 ?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml">
 <head>
 	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 	<title>База Знаний ЦОВ и ОК</title>
 	<link rel="stylesheet" href="/knowledge_base/css/style.css">
 	<?CJSCore::Init();?>
 	<script src="/knowledge_base/scripts/jquery-1.8.3.js"></script>
 	<link rel="stylesheet" href="jquery.fancybox.min.css">
 	<script type="text/javascript" src="/knowledge_base/jquery.fancybox.min.js"></script>
 </head>
 <body>
 <?
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
 	);

 	while ($ob = $res->GetNextElement()){
	 	$arFields = $ob->GetFields();
		$arresult[$arFields['ID']]['NAME'] = $arFields['NAME'];
		$arresult[$arFields['ID']]['CODE'] = $arFields['CODE'];
		$arresult[$arFields['ID']]['PICTURE'] = CFile::GetFileArray($arFields['PREVIEW_PICTURE']);
	 	$arProps = $ob->GetProperties();
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
			);
 		}
 	}
?>
    <header>
    	<div class="header" align="left">
    		<img src="img/logo.png">
    		<div class="chat">
    			<h1 class="white">База Знаний ЦОВ и ОК</h1>
    			<br>
    			<div align="center"> <a href="/knowledge_base/"><img src="img/avilon.png" width="200" height="35"> </a> </div>
				<div class="warning">Уважаемые коллеги! В связи с обновлением списка ДЦ<br> в Базе Знаний, возможны небольшие сбои в работе.<br>Приносим извенения за доставленные неудобства.</div>
    		</div>
    	</div>
    </header>

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
    			<?
    			$delimer=intval(count($arresult)/2);
    			$i=1;
    			foreach ($arresult as $key=> $aritim) {?>
    			<div class="menu_item">
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
    			<? if ($i == $delimer) {
    				echo '</div><div class="menu_wrapper">';
    			}
    			$i++;
    		}?>
    	</div>
</div>

<div class="layout">
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
		"SORT_BY2" => "NAME",
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

</div>

<!-- END Разметка на главной -->

<div class="footer" align="left">

	<!-- Меню -->
	<?include($_SERVER["DOCUMENT_ROOT"]."/knowledge_base/menu.php");?>
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
</div>
</div>
</body>
</html>