<?//include($_SERVER["DOCUMENT_ROOT"]."/knowledge_base/pools/.menu.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Опросы|База Знаний ЦОВ и ОК</title>
				<link rel="stylesheet" href="/knowledge_base/pools/css/style.css">
				<link rel="stylesheet" href="/knowledge_base/jquery.fancybox.min.css">
				<link rel="stylesheet" href="/knowledge_base/src/hystmodal.css">
        <link rel="stylesheet" href="/knowledge_base/css/demos.css">
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
		<img src="/knowledge_base/pools/images/plus.png" class="add" style="position: relative; top: -50px;">
	<?}?>
      <!-- Меню -->
		<?/*
		data-fancybox data-type="ajax" data-src="='/knowledge_base/pages_instructions/page'.$key.'.php'"
		*/?>
      <ul class="left_menu_tems">
      	<?foreach($arMenu as $key => $menyItem){?>
        	<li class="menu_item2" data-src=<?=$key?>>
				<?if(in_array(27, $arGroups) || in_array(1, $arGroups)){?>
					<img src="/knowledge_base/pools/images/EDIT.png" class="edit">
        		<?}?>
				<a class="fancybox" data-fancybox-type="iframe" href="javascript:;" data-src="<?='/knowledge_base/pages_instructions/page'.$key.'.pdf'?>"><?=$menyItem?></a>


        	</li>
		<?}?>
		<?/**/?>


        <!-- <li><a href="#">Результат звонка «Претензия (Кража)»</a></li>
        <li><a href="#">Результат звонка «Недоступен»</a></li>
        <li><a href="#">Результат звонка «Неэффективный»</a></li>
        		<li><a href="#">Результат звонка «Отказался разговаривать»</a></li>
        		<li><a href="#">Исключение из опросов</a></li>
        		<li><a href="#">Шаблоны для заполнения комментариев</a></li>
        		<li><a href="#">Отчеты</a></li>
        		<li><a href="#">Contact</a></li>
        		<li><a href="#">Contact</a></li> -->
      </ul>
      <!--<div class="edit">edit</div>-->
      <!--<div class="add">add</div>-->
    </div>

	  <!-- БОКОВОЕ МЕНЮ -->

<div class="wrapper">

 <?
/* $APPLICATION->ShowHead(); */
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
<div class="icon-menu">
        <img src="images/menu-ham-icon.png">
        <font color="black">Инструкции</font>
      </div>
	<table class="table_head">
 <tr>
 <td> <img src="/knowledge_base/img/right.png"> </td>
 <td width="405px"><a href="javascript:window.location.reload()"><img src="/knowledge_base/img/avilon.png" width="400" height="70"></a><!-- &nbsp  --></td>
 <td align="right"> <img src="/knowledge_base/img/left.png" align="right"> </td>
 
 
 </tr>
 </table>
</header>
<div class="one"><h1><b>ОПРОСЫ</b></h1></div>



<div class="modal" data-modal="1">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload1.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="3">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload3.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="4">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload4.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="5">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload5.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="6">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload6.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="7">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload7.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="8">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload8.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="9">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload9.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="10">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload10.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="11">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload11.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="12">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload12.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="13">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload13.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="14">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload14.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="15">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload15.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="16">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload16.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="17">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload17.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="18">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload18.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="19">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload19.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="20">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload20.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="21">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload21.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="22">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload22.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="23">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload23.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="24">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload24.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="25">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload25.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="26">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload26.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="27">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload27.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="28">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload28.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="29">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload29.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="30">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload30.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="31">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload31.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="32">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload32.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="33">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload33.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="34">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload34.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="35">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload35.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="36">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload36.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="37">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload37.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="38">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload38.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="39">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload39.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="40">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload40.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="41">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload41.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="42">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload42.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="43">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload43.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="44">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload44.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="45">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload45.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="46">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload46.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="47">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload47.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="48">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload48.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="49">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload49.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="50">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload50.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="51">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload51.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="52">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload52.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="53">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload53.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="54">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload54.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="55">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload55.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="56">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload56.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="57">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload57.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="58">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload58.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="59">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload59.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="60">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload60.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="61">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload61.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="62">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload62.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="63">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload63.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="64">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload64.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="65">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload65.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>

<div class="modal" data-modal="66">
  <div class="modal__cross js-modal-close"> X</div>
  <form action="/knowledge_base/upload/upload66.php" method="post" enctype="multipart/form-data">
<table border="1"><tr><td>Название файла: <input type="text" name="name_file" /></td></tr>
<tr><td>Ваш файл: <input type="file" name="upload_file" /></td></tr>
<tr><td><input type="submit" name="smb_upload" value="Загрузить" /></td></tr>
</table></form></div>



<!-- Подложка под модальным окном -->
<div class="overlay js-overlay-modal"></div>






<div class="menu" align="center">
<div class="menu_wrapper">

<a data-hystmodal="#modalLong1" href="#modalLong1">
			<div class="thumbs" data-CODE='BMW_MOTO' data-ID='12769897'>
			<img src="/upload/iblock/cc3/moto.png" style="width: 60px; height: 60px;"><!--"width: 61px; height: 100px;"-->
					<div class="caption">
						<span class="title">BMW (MOTO)</span>
					</div>
		</div>
</a>
<div class="hystmodal" id="modalLong1" aria-hidden="true">
        <div class="hystmodal__wrap">
            <div class="hystmodal__window" role="dialog" aria-modal="true">
                <button class="hystmodal__close" data-hystclose>Закрыть</button>
                <div class="hystmodal__styled">   
      <ul>
  <div class="col" style="width: 95%">
  	<div class="toggle">
  		  <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/bmw_moto/bmw_moto_mc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="1"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="12769897"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>BMW МОТО Механический цех<br>(МЦ BMW МОТО 01.02.2022) – наименование анкеты в 1С</b></span></div>
  </div>
  <!-- <div class="col" style="width: 95%">
  	<div class="toggle">
  		  <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/bmw_moto/bmw_moto_mc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="2"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="12769897"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Пусто<br>Пусто</b></span></div>
  </div> -->
      </ul>
       </div>
            </div>
        </div>
    </div>



<a data-hystmodal="#modalLong2" href="#modalLong2">
      <div class="thumbs" data-CODE='BT' data-ID='12757093'>
      <img src="/upload/iblock/fdd/bentley.png" style="width: 100px; height: 54px;"><!--"width: 61px; height: 100px;"-->
          <div class="caption">
            <span class="title">Bentley</span>
          </div>
    </div>
</a>
<div class="hystmodal" id="modalLong2" aria-hidden="true">
        <div class="hystmodal__wrap">
            <div class="hystmodal__window" role="dialog" aria-modal="true">
                <button class="hystmodal__close" data-hystclose>Закрыть</button>
                <div class="hystmodal__styled">   
      <ul>
  <div class="col" style="width: 95%">
  	<div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/bentley/bentley_mc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="3"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="12757093"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Вentley Механический цех<br>(МЦ Бентли 01.02.2022) - наименование анкеты в 1С</b></span></div>
  </div>
  <div class="col" style="width: 95%">
  	<div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/bentley/bentley_kc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="4"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="12757093"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Вentley Кузовной цех<br>(КЦ BT 01.10.2019) - наименование анкеты в 1С</b></span></div>
       </div>
      </ul>
      </div>
    </div>
  </div>
</div>


<a data-hystmodal="#modalLong3" href="#modalLong3">
      <div class="thumbs" data-CODE='CAD_CHEV' data-ID='13111308'>
      <img src="/upload/iblock/393/logo--chevy-cadillac-volgo.png" style="width: 120px; height: 103px;"><!--"width: 61px; height: 100px;"-->
          <div class="caption">
            <span class="title">Cadillac/Chevrolet</span>
          </div>
    </div>
</a>

<div class="hystmodal" id="modalLong3" aria-hidden="true">
        <div class="hystmodal__wrap">
            <div class="hystmodal__window" role="dialog" aria-modal="true">
                <button class="hystmodal__close" data-hystclose>Закрыть</button>
                <div class="hystmodal__styled">    
      <ul>
  <div class="col" style="width: 95%">
  	<div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/cadillac_vlg/cadillac_vlg_mc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="5"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="13111308"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Cadillac/Chevrolet Механический цех<br>(МЦ Кадиллак/Шевроле Волгоградский пр-т 01.02.2022) – наименование анкеты в 1С</b></span></div>
  </div>
  <div class="col" style="width: 95%">
  	<div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/cadillac_vlg/cadillac_vlg_kc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="6"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="13111308"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Cadillac/Chevrolet Кузовной цех<br>(КЦ Кадиллак/Шевроле 01.11.2021) - наименование анкеты в 1С</b></span></div>
  </div>
  <div class="col" style="width: 95%">
  	<div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/cadillac_vlg/cadillac_vlg_op/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="7"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="13111308"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Cadillac/Chevrolet Послепродажный Волгоградский пр-т<br>(ОП Кадиллак/Шевроле 01.06.2020) - наименование анкеты в 1С</b></span></div>
  </div>
      </ul>
      </div>
    </div>
  </div>
</div>


<a data-hystmodal="#modalLong4" href="#modalLong4">
      <div class="thumbs" data-CODE='CHEV_CAD_BD' data-ID='13111309'>
      <img src="/upload/iblock/4d7/logo--chevy-cadillac-BD.png" style="width: 120px; height: 103px;"><!--"width: 61px; height: 100px;"-->
          <div class="caption">
            <span class="title">Chevrolet/Cadillac БД</span>
          </div>
    </div>
</a>
<div class="hystmodal" id="modalLong4" aria-hidden="true">
        <div class="hystmodal__wrap">
            <div class="hystmodal__window" role="dialog" aria-modal="true">
                <button class="hystmodal__close" data-hystclose>Закрыть</button>
                <div class="hystmodal__styled">
      <ul>
  <div class="col" style="width: 95%">
  	<div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/cadillac_bd/cadillac_bd_mc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="8"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="13111309"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Cadillac/Chevrolet Механический цех<br>(МЦ Кадиллак/Шевроле Белая Дача 01.02.2022) – наименование анкеты в 1С</b></span></div>
  </div>
  <div class="col" style="width: 95%">
  	<div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/cadillac_bd/cadillac_bd_op/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="9"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="13111309"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Cadillac/Chevrolet Послепродажный Белая Дача<br>(ОП Кадиллак/Шевроле 01.06.2020) - наименование анкеты в 1С</b></span></div>
  </div>
      </ul>
      </div>
    </div>
  </div>
</div>

<a data-hystmodal="#modalLong5" href="#modalLong5">
      <div class="thumbs" data-CODE='FR' data-ID='12757094'>
      <img src="/upload/iblock/317/Ferrari.png" style="width: 58px; height: 100px;">
          <div class="caption">
            <span class="title">Ferrari</span>
          </div>
    </div>
</a>

<div class="hystmodal" id="modalLong5" aria-hidden="true">
        <div class="hystmodal__wrap">
            <div class="hystmodal__window" role="dialog" aria-modal="true">
                <button class="hystmodal__close" data-hystclose>Закрыть</button>
                <div class="hystmodal__styled">  
      <ul>
  <div class="col" style="width: 95%">
  	<div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/ferrari/ferrari_mc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="10"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="12757094"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Ferrari Механический цех<br>(МЦ Феррари 01.02.2022) - наименование анкеты в 1С</b></span></div>
  </div>
  <div class="col" style="width: 95%">
  	<div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/ferrari/ferrari_kc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="11"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="12757094"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Ferrari Кузовной цех<br>(КЦ FR 01.10.2019) - наименование анкеты в 1С</b></span></div>
  </div>
      </ul>
      </div>
    </div>
  </div>
</div>


<a data-hystmodal="#modalLong6" href="#modalLong6">
      <div class="thumbs" data-CODE='KUZ_JLR_MB_BMW_AU' data-ID='12757074'>
      <img src="/upload/iblock/da2/MercedesVOLG.png" style="width: 85px; height: 95px;">
          <div class="caption">
            <span class="title">MB Волгоградка</span>
          </div>
    </div>
</a>

<div class="hystmodal" id="modalLong6" aria-hidden="true">
        <div class="hystmodal__wrap">
            <div class="hystmodal__window" role="dialog" aria-modal="true">
                <button class="hystmodal__close" data-hystclose>Закрыть</button>
                <div class="hystmodal__styled"> 
      <ul>
  <div class="col" style="width: 95%">
  	<div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/mb_vlg/mb_vlg_mc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="12"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="12757074"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Mercedes-Benz Механический цех<br>(МЦ Мерседес 01.02.2022) – наименование анкеты в 1С</b></span></div>
  </div>
  <div class="col" style="width: 95%">
  	<div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/mb_vlg/mb_vlg_kc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="13"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="12757074"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Mercedes-Benz Кузовной цех<br>(КЦ MB 01.08.2021) - наименование анкеты в 1С</b></span></div>
  </div>
  <div class="col" style="width: 95%">
  	<div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/mb_vlg/mb_vlg_op/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="14"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="12757074"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Mercedes-Benz послепродажный обзвон<br>(ОП МВ 01.07.2020) - наименование анкеты в 1С</b></span></div>
  </div>
      </ul>
      </div>
    </div>
  </div>
</div>



<a data-hystmodal="#modalLong7" href="#modalLong7">
      <div class="thumbs" data-CODE='KUZ_JLR_MB_BMW_AU' data-ID='12757075'>
      <img src="/upload/iblock/419/BMW_VOLG.png" style="width: 85px; height: 95px;">
          <div class="caption">
            <span class="title">BMW Волгоградка</span>
          </div>
    </div>
</a>

<div class="hystmodal" id="modalLong7" aria-hidden="true">
        <div class="hystmodal__wrap">
            <div class="hystmodal__window" role="dialog" aria-modal="true">
                <button class="hystmodal__close" data-hystclose>Закрыть</button>
                <div class="hystmodal__styled">   
      <ul>
  <div class="col" style="width: 95%">
  	<div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/bmw_vlg/bmw_vlg_mc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="15"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="12757075"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>BMW Механический цех<br>(МЦ BMW/MINI 01.02.2022) – наименование анкеты в 1С</b></span></div>
  </div>
  <div class="col" style="width: 95%">
  	<div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/bmw_vlg/bmw_vlg_mc_6_7/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="16"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="12757075"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>BMW (6 и 7 Series) Механический цех<br>(МЦ BMW (6 Series/7 Series) 01.02.2022) – наименование анкеты в 1С</b></span></div>
  </div>
  <div class="col" style="width: 95%">
  	<div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/bmw_vlg/bmw_vlg_kc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="17"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="12757075"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>BMW Кузовной цех<br>(КЦ BMW 01.08.2021) - наименование анкеты в 1С</b></span></div>
  </div>
  <div class="col" style="width: 95%">
  	<div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/bmw_vlg/bmw_vlg_op/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="18"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="12757075"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>BMW послепродажный<br>(ОП BMW/MINI/MOTO 01.01.2022) - наименование анкеты в 1С</b></span></div>
  </div>
      </ul>
      </div>
    </div>
  </div>
</div>




<a data-hystmodal="#modalLong8" href="#modalLong8">
      <div class="thumbs" data-CODE='KUZ_JLR_MB_BMW_AU' data-ID='12757097'>
      <img src="/upload/iblock/e70/Mini.png" style=""><!--"width: 61px; height: 100px;"-->
          <div class="caption">
            <span class="title">MINI</span>
          </div>
    </div>
</a>
<div class="hystmodal" id="modalLong8" aria-hidden="true">
        <div class="hystmodal__wrap">
            <div class="hystmodal__window" role="dialog" aria-modal="true">
                <button class="hystmodal__close" data-hystclose>Закрыть</button>
                <div class="hystmodal__styled"> 
      <ul>
  <div class="col" style="width: 95%">
  	<div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/mini/mini_mc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="19"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="12757097"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>MINI Механический цех<br>(МЦ BMW/MINI 01.02.2022) – наименование анкеты в 1С</b></span></div>
  </div>
  <div class="col" style="width: 95%">
  	<div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/mini/mini_kc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="20"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="12757097"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>MINI Кузовной цех<br>(КЦ BMW 01.08.2021) - наименование анкеты в 1С</b></span></div>
  </div>
  <div class="col" style="width: 95%">
  	<div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/mini/mini_op/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="21"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="12757097"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>MINI послепродажный<br>(ОП BMW/MINI/MOTO 01.01.2022) - наименование анкеты в 1С</b></span></div>
  </div>
      </ul>
      </div>
    </div>
  </div>
</div>


<a data-hystmodal="#modalLong9" href="#modalLong9">
      <div class="thumbs" data-CODE='KUZ_JLR_MB_BMW_AU' data-ID='12757099'>
      <img src="/upload/iblock/fed/JLR.png" style=""><!--"width: 61px; height: 100px;"-->
          <div class="caption">
            <span class="title">JLR</span>
          </div>
    </div>
</a>
<div class="hystmodal" id="modalLong9" aria-hidden="true">
        <div class="hystmodal__wrap">
            <div class="hystmodal__window" role="dialog" aria-modal="true">
                <button class="hystmodal__close" data-hystclose>Закрыть</button>
                <div class="hystmodal__styled">    
      <ul>
  <div class="col" style="width: 95%">
  	<div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/jlr/jlr_mc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="22"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="12757099"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Jaguar Land Rover Механический цех<br>(МЦ JLR 01.03.2022) – наименование анкеты в 1С</b></span></div>
  </div>
  <div class="col" style="width: 95%">
  	<div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/jlr/jlr_kc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="23"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="12757099"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Jaguar Land Rover Кузовной цех<br>(КЦ JLR 01.08.2021) - наименование анкеты в 1С</b></span></div>
  </div>
  <div class="col" style="width: 95%">
  	<div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/jlr/jlr_op/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="24"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="12757099"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Jaguar Land Rover послепродажный<br>(ОП JLR 01.11.2018) - наименование анкеты в 1С</b></span></div>
  </div>
      </ul>
      </div>
    </div>
  </div>
</div>


<a data-hystmodal="#modalLong10" href="#modalLong10">
      <div class="thumbs" data-CODE='KUZ_JLR_MB_BMW_AU' data-ID='14825995'>
      <img src="/upload/iblock/b33/audi_zil.png" style=""><!--"width: 61px; height: 100px;"-->
          <div class="caption">
            <span class="title">Audi Legenda</span>
          </div>
    </div>
</a>

<div class="hystmodal" id="modalLong10" aria-hidden="true">
        <div class="hystmodal__wrap">
            <div class="hystmodal__window" role="dialog" aria-modal="true">
                <button class="hystmodal__close" data-hystclose>Закрыть</button>
                <div class="hystmodal__styled">   
      <ul>
  <div class="col" style="width: 95%">
  	<div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/audi_zil/audi_zil_mc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="25"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="14825995"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>AUDI Механический цех<br>(МЦ АУДИ 01.02.2022) – наименование анкеты в 1С</b></span></div>
  </div>
  <div class="col" style="width: 95%">
  	<div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/audi_zil/audi_zil_kc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="26"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="14825995"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Audi Кузовной цех<br>(КЦ AU 01.08.2021) - наименование анкеты в 1С</b></span></div>
  </div>
  <div class="col" style="width: 95%">
  	<div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/audi_zil/audi_zil_op/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="27"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="14825995"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>AUDI послепродажный<br>(ОП AU 01.11.2021) - наименование анкеты в 1С</b></span></div>
  </div>
      </ul>
      </div>
    </div>
  </div>
</div>


<a data-hystmodal="#modalLong11" href="#modalLong11">
      <div class="thumbs" data-CODE='KUZ_VW_HD_JC_FD_VOLVO_PG_CTR_MITSUBISHI_FIAT' data-ID='12757100'>
      <img src="/upload/iblock/e8a/jeep.png" style=""><!--"width: 61px; height: 100px;"-->
          <div class="caption">
            <span class="title">Jeep</span>
          </div>
    </div>
</a>

<div class="hystmodal" id="modalLong11" aria-hidden="true">
        <div class="hystmodal__wrap">
            <div class="hystmodal__window" role="dialog" aria-modal="true">
                <button class="hystmodal__close" data-hystclose>Закрыть</button>
                <div class="hystmodal__styled"> 
      <ul>
  <div class="col" style="width: 95%">
  	<div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/jeep_chrysler/jeep_chrysler_mc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="28"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="12757100"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Jeep Chrysler Механический цех<br>(МЦ Джип Крайслер 01.03.2022) – наименование анкеты в 1С</b></span></div>
  </div>
  <div class="col" style="width: 95%">
  	<div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/jeep_chrysler/jeep_chrysler_kc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="29"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="12757100"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Jeep Chrysler Кузовной цех<br>(КЦ JC 01.11.2021) – наименование анкеты в 1С</b></span></div>
  </div>
  <div class="col" style="width: 95%">
  	<div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/jeep_chrysler/jeep_chrysler_op/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="30"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="12757100"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Jeep Chrysler послепродажный<br>(CSI JC 24.12.2014) - наименование анкеты в 1С</b></span></div>
  </div>
      </ul>
      </div>
    </div>
  </div>
</div>


<a data-hystmodal="#modalLong12" href="#modalLong12">
      <div class="thumbs" data-CODE='KUZ_VW_HD_JC_FD_VOLVO_PG_CTR_MITSUBISHI_FIAT' data-ID='12757101'>
      <img src="/upload/iblock/66e/logo-Volkswagen-2012 (В).png" style=""><!--"width: 61px; height: 100px;"-->
          <div class="caption">
            <span class="title">Volkswagen</span>
          </div>
    </div>
</a>

<div class="hystmodal" id="modalLong12" aria-hidden="true">
        <div class="hystmodal__wrap">
            <div class="hystmodal__window" role="dialog" aria-modal="true">
                <button class="hystmodal__close" data-hystclose>Закрыть</button>
                <div class="hystmodal__styled">   
      <ul>
  <div class="col" style="width: 95%">
  	<div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/vw_vlg/vw_vlg_mc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="31"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="12757101"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Volkswagen Механический цех<br>(МЦ VW 01.02.2022) - наименование анкеты в 1С</b></span></div>
  </div>
  <div class="col" style="width: 95%">
  	<div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/vw_vlg/vw_vlg_kc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="32"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="12757101"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Volkswagen Кузовной цех<br>(КЦ VW 01.11.2021) - наименование анкеты в 1С</b></span></div>
  </div>
  <div class="col" style="width: 95%">
  	<div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/vw_vlg/vw_vlg_op/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="33"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="12757101"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Volkswagen послепродажный<br>(ОП VW 01.11.2021) – наименование анкеты в 1С</b></span></div>
  </div>
      </ul>
      </div>
    </div>
  </div>
</div>


<a data-hystmodal="#modalLong13" href="#modalLong13">
      <div class="thumbs" data-CODE='KUZ_VW_HD_JC_FD_VOLVO_PG_CTR_MITSUBISHI_FIAT' data-ID='12757102'>
      <img src="/upload/iblock/f5d/Ford.png" style=""><!--"width: 61px; height: 100px;"-->
          <div class="caption">
            <span class="title">Ford</span>
          </div>
    </div>
</a>

<div class="hystmodal" id="modalLong13" aria-hidden="true">
        <div class="hystmodal__wrap">
            <div class="hystmodal__window" role="dialog" aria-modal="true">
                <button class="hystmodal__close" data-hystclose>Закрыть</button>
                <div class="hystmodal__styled">    
      <ul>
  <div class="col" style="width: 95%">
  	<div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/ford/ford_mc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="34"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="12757102"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Ford Механический цех<br>(МЦ ФОРД 01.02.2022) – наименование анкеты в 1С</b></span></div>
  </div>
  <div class="col" style="width: 95%">
  	<div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/ford/ford_kc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="35"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="12757102"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Ford Кузовной цех<br>(КЦ FD 01.11.2021) - наименование анкеты в 1С</b></span></div>
  </div>
  <div class="col" style="width: 95%">
  	<div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/ford/ford_op/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="36"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="12757102"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Ford послепродажный<br>(CSI Ford 01.01.2015) - наименование анкеты в 1С</b></span></div>
  </div>
      </ul>
      </div>
    </div>
  </div>
</div>


<a data-hystmodal="#modalLong14" href="#modalLong14">
      <div class="thumbs" data-CODE='KUZ_VW_HD_JC_FD_VOLVO_PG_CTR_MITSUBISHI_FIAT' data-ID='12757103'>
      <img src="/upload/iblock/7f8/hyundai.PNG" style="width: 110px; height: 80px;"><!--"width: 61px; height: 100px;"-->
          <div class="caption">
            <span class="title">Hyundai</span>
          </div>
    </div>
</a>

<div class="hystmodal" id="modalLong14" aria-hidden="true">
        <div class="hystmodal__wrap">
            <div class="hystmodal__window" role="dialog" aria-modal="true">
                <button class="hystmodal__close" data-hystclose>Закрыть</button>
                <div class="hystmodal__styled">  
      <ul>
  <div class="col" style="width: 95%">
  	<div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/hyundai/hyundai_mc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="37"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="12757103"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>HYUNDAI Механический цех<br>(МЦ HD 01.02.2022) – наименование анкеты в 1С</b></span></div>
  </div>
  <div class="col" style="width: 95%">
  	<div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/hyundai/hyundai_kc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="38"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="12757103"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Hyundai Кузовной цех<br>(КЦ HD 01.11.2021) – наименование анкеты в 1С</b></span></div>
  </div>
  <div class="col" style="width: 95%">
  	<div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/hyundai/hyundai_op/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="39"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="12757103"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>HYUNDAI послепродажный<br>(ОП HD 01.02.2020) - наименование анкеты в 1С</b></span></div>
  </div>
  <div class="col" style="width: 95%">
  	<div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/hyundai/hyundai_genesis_op/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="40"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="12757103"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>HYUNDAI (Genesis) послепродажный<br>(ОП HD (Genesis) 01.05.2018*) - наименование анкеты в 1С</b></span></div>
  </div>
      </ul>
      </div>
    </div>
  </div>
</div>


<a data-hystmodal="#modalLong15" href="#modalLong15">
      <div class="thumbs" data-CODE='KUZ_VW_HD_JC_FD_VOLVO_PG_CTR_MITSUBISHI_FIAT' data-ID='12757104'>
      <img src="/upload/iblock/932/Fiat.png" style=""><!--"width: 61px; height: 100px;"-->
          <div class="caption">
            <span class="title">FIAT</span>
          </div>
    </div>
</a>

<div class="hystmodal" id="modalLong15" aria-hidden="true">
        <div class="hystmodal__wrap">
            <div class="hystmodal__window" role="dialog" aria-modal="true">
                <button class="hystmodal__close" data-hystclose>Закрыть</button>
                <div class="hystmodal__styled">  
      <ul>
  <div class="col" style="width: 95%">
    <div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/fiat/fiat_mc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="41"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="12757104"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Fiat Механический цех<br>(МЦ ФИАТ 01.02.2022) – наименование анкеты в 1С</b></span></div>
  </div>
  <div class="col" style="width: 95%">
    <div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/fiat/fiat_op/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="42"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="12757104"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Fiat послепродажный<br>(ОП FT 10.04.2017) - наименование анкеты в 1С</b></span></div>
  </div>
  <div class="col" style="width: 95%">
    <div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/fiat/fiat_kc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="43"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="12757104"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Fiat Кузовной цех<br>(КЦ ФИАТ 01.11.2021) - наименование анкеты в 1С</b></span></div>
  </div>
      </ul>
      </div>
    </div>
  </div>
</div>


<a data-hystmodal="#modalLong16" href="#modalLong16">
      <div class="thumbs" data-CODE='KUZ_VW_HD_JC_FD_VOLVO_PG_CTR_MITSUBISHI_FIAT' data-ID='13769172'>
      <img src="/upload/iblock/3ce/Volvo-logo-2014-1920x1080.png" style="width: 145px; height: 80px;"><!--"width: 61px; height: 100px;"-->
          <div class="caption">
            <span class="title">VOLVO</span>
          </div>
    </div>
</a>

<div class="hystmodal" id="modalLong16" aria-hidden="true">
        <div class="hystmodal__wrap">
            <div class="hystmodal__window" role="dialog" aria-modal="true">
                <button class="hystmodal__close" data-hystclose>Закрыть</button>
                <div class="hystmodal__styled">  
      <ul>
  <div class="col" style="width: 95%">
    <div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/volvo/volvo_mc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="44"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="13769172"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Volvo Механический цех<br>(МЦ Volvo 01.02.2022) – наименование анкеты в 1С</b></span></div>
  </div>
  <div class="col" style="width: 95%">
    <div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/volvo/volvo_kc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="45"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="13769172"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Volvo Кузовной цех<br>(КЦ Volvo 01.11.2021) - наименование анкеты в 1С</b></span></div>
  </div>
  <div class="col" style="width: 95%">
    <div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/volvo/volvo_op/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="46"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="13769172"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Volvo послепродажный<br>(ОП Volvo 01.03.2022) - наименование анкеты в 1С</b></span></div>
  </div>
      </ul>
      </div>
    </div>
  </div>
</div>



<a data-hystmodal="#modalLong17" href="#modalLong17">
      <div class="thumbs" data-CODE='KUZ_VW_HD_JC_FD_VOLVO_PG_CTR_MITSUBISHI_FIAT' data-ID='15392533'>
      <img src="/upload/iblock/9ca/CTR_PG.png" style="width: 105px; height: 50px;"><!--"width: 61px; height: 100px;"-->
          <div class="caption">
            <span class="title">Peugeot / Citroen</span>
          </div>
    </div>
</a>
<div class="hystmodal" id="modalLong17" aria-hidden="true">
        <div class="hystmodal__wrap">
            <div class="hystmodal__window" role="dialog" aria-modal="true">
                <button class="hystmodal__close" data-hystclose>Закрыть</button>
                <div class="hystmodal__styled">  
      <ul>
  <div class="col" style="width: 95%">
    <div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/peugeot_citroen/peugeot_citroen_mc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="47"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="15392533"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Peugeot/ Citroen Механический цех<br>(МЦ Пежо Ситроен 01.02.2022) - наименование анкеты в 1С</b></span></div>
  </div>
  <div class="col" style="width: 95%">
    <div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/peugeot_citroen/peugeot_citroen_kc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="48"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="15392533"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Peugeot/ Citroen Кузовной цех<br>(КЦ Пежо Ситроен 01.11.2021) - наименование анкеты в 1С</b></span></div>
  </div>
  <div class="col" style="width: 95%">
    <div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/peugeot_citroen/peugeot_citroen_op/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="49"><br><img src="img/plus.png"></a></div>
          <div class="block_content" data-block="AFTER_SERVICE_M" data-id="15392533"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Peugeot/ Citroen послепродажный<br>(ОП Пежо Ситроен 01.03.2020) - наименование анкеты в 1С</b></span></div>
  </div>
      </ul>
      </div>
    </div>
  </div>
</div>


<a data-hystmodal="#modalLong18" href="#modalLong18">
      <div class="thumbs" data-CODE='KUZ_VW_HD_JC_FD_VOLVO_PG_CTR_MITSUBISHI_FIAT' data-ID='15942204'>
      <img src="/upload/iblock/14b/mits.png" style="width: 85px; height: 95px;"><!--"width: 61px; height: 100px;"-->
          <div class="caption">
            <span class="title">MITSUBISHI</span>
          </div>
    </div>
</a>
<div class="hystmodal" id="modalLong18" aria-hidden="true">
        <div class="hystmodal__wrap">
            <div class="hystmodal__window" role="dialog" aria-modal="true">
                <button class="hystmodal__close" data-hystclose>Закрыть</button>
                <div class="hystmodal__styled">  
      <ul>
  <div class="col" style="width: 95%">
    <div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/mitsubishi/mitsubishi_mc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="50"><br><img src="img/plus.png"></a></div>
      <div class="block_content" data-block="AFTER_SERVICE_M" data-id="15942204"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b> Mitsubishi Механический цех<br>(МЦ Mitsubishi 01.02.2022) - наименование анкеты в 1С</b></span></div>
  </div>
  <div class="col" style="width: 95%">
    <div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/mitsubishi/mitsubishi_kc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="51"><br><img src="img/plus.png"></a></div>
      <div class="block_content" data-block="AFTER_SERVICE_M" data-id="15942204"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b> Mitsubishi Кузовной цех<br>(КЦ Митсубиси 01.11.2021) - наименование анкеты в 1С</b></span></div>
  </div>
  <div class="col" style="width: 95%">
    <div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/mitsubishi/mitsubishi_op/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="52"><br><img src="img/plus.png"></a></div>
      <div class="block_content" data-block="AFTER_SERVICE_M" data-id="15942204"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Mitsubishi Послепродажный обзвон<br>(ОП Mitsubishi 01.12.2019) - наименование анкеты в 1С</b></span></div>
  </div>
      </ul>
      </div>
    </div>
  </div>
</div>



<a data-hystmodal="#modalLong19" href="#modalLong19">
      <div class="thumbs" data-CODE='KUZ_VW_HD_JC_FD_VOLVO_PG_CTR_MITSUBISHI_FIAT' data-ID='16872265'>
      <img src="/upload/iblock/153/logo-Volkswagen-2012 (1).png" style=""><!--"width: 61px; height: 100px;"-->
          <div class="caption">
            <span class="title">Volkswagen Белая дача</span>
          </div>
    </div>
</a>
<div class="hystmodal" id="modalLong19" aria-hidden="true">
        <div class="hystmodal__wrap">
            <div class="hystmodal__window" role="dialog" aria-modal="true">
                <button class="hystmodal__close" data-hystclose>Закрыть</button>
                <div class="hystmodal__styled">  
      <ul>
  <div class="col" style="width: 95%">
    <div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/vw_bd/vw_bd_mc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="53"><br><img src="img/plus.png"></a></div>
      <div class="block_content" data-block="AFTER_SERVICE_M" data-id="16872265"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Volkswagen Механический цех<br>(МЦ VW 01.02.2022) - наименование анкеты в 1С</b></span></div>
  </div>
  <div class="col" style="width: 95%">
    <div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/vw_bd/vw_bd_kc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="54"><br><img src="img/plus.png"></a></div>
      <div class="block_content" data-block="AFTER_SERVICE_M" data-id="16872265"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Volkswagen Кузовной цех<br>(КЦ VW 01.11.2021) - наименование анкеты в 1С</b></span></div>
  </div>
  <div class="col" style="width: 95%">
    <div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/vw_bd/vw_bd_op/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="55"><br><img src="img/plus.png"></a></div>
      <div class="block_content" data-block="AFTER_SERVICE_M" data-id="16872265"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Volkswagen послепродажный<br>(ОП VW 01.11.2021) – наименование анкеты в 1С</b></span></div>
  </div>
      </ul>
      </div>
    </div>
  </div>
</div>



<a data-hystmodal="#modalLong20" href="#modalLong20">
      <div class="thumbs" data-CODE='KUZ_VW_HD_JC_FD_VOLVO_PG_CTR_MITSUBISHI_FIAT_KIA' data-ID='16837845'>
      <img src="/upload/iblock/fe4/logo.png" style=""><!--"width: 61px; height: 100px;"-->
          <div class="caption">
            <span class="title">KIA</span>
          </div>
    </div>
</a>
<div class="hystmodal" id="modalLong20" aria-hidden="true">
        <div class="hystmodal__wrap">
            <div class="hystmodal__window" role="dialog" aria-modal="true">
                <button class="hystmodal__close" data-hystclose>Закрыть</button>
                <div class="hystmodal__styled">  
      <ul>
  <div class="col" style="width: 95%">
    <div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/kia/kia_mc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="56"><br><img src="img/plus.png"></a></div>
      <div class="block_content" data-block="AFTER_SERVICE_M" data-id="16837845"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>KIA Механический цех<br>(МЦ KIA 01.02.2022) – наименование анкеты в 1С</b></span></div>
  </div>
  <div class="col" style="width: 95%">
    <div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/kia/kia_kc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="57"><br><img src="img/plus.png"></a></div>
      <div class="block_content" data-block="AFTER_SERVICE_M" data-id="16837845"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>KIA Кузовной цех<br>(КЦ KIA 01.11.2021) – наименование анкеты в 1С</b></span></div>
  </div>
  <div class="col" style="width: 95%">
    <div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/kia/kia_op/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="58"><br><img src="img/plus.png"></a></div>
      <div class="block_content" data-block="AFTER_SERVICE_M" data-id="16837845"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>KIA послепродажный<br>
(ОП KIA 01.01.2021) - наименование анкеты в 1С</b></span></div>
  </div>
      </ul>
      </div>
    </div>
  </div>
</div>



<a data-hystmodal="#modalLong21" href="#modalLong21">
      <div class="thumbs" data-CODE='MASERATI' data-ID='12757098'>
      <img src="/upload/iblock/4ee/maserati.png" style="width: 65px; height: 100px;"><!--"width: 61px; height: 100px;"-->
          <div class="caption">
            <span class="title">Maserati</span>
          </div>
    </div>
</a>
<div class="hystmodal" id="modalLong21" aria-hidden="true">
        <div class="hystmodal__wrap">
            <div class="hystmodal__window" role="dialog" aria-modal="true">
                <button class="hystmodal__close" data-hystclose>Закрыть</button>
                <div class="hystmodal__styled">  
      <ul>
  <div class="col" style="width: 95%">
    <div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/maserati/maserati_mc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="59"><br><img src="img/plus.png"></a></div>
      <div class="block_content" data-block="AFTER_SERVICE_M" data-id="16837845"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Maserati Механический цех<br>(МЦ Мазерати 01.03.2022) - наименование анкеты в 1С</b></span></div>
  </div>
  <div class="col" style="width: 95%">
    <div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/maserati/maserati_kc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="60"><br><img src="img/plus.png"></a></div>
      <div class="block_content" data-block="AFTER_SERVICE_M" data-id="16837845"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Maserati Кузовной цех<br>(КЦ MZ 01.10.2019) - наименование анкеты в 1С</b></span></div>
  </div>
      </ul>
      </div>
    </div>
  </div>
</div>



<a data-hystmodal="#modalLong22" href="#modalLong22">
      <div class="thumbs" data-CODE='SALE_AM' data-ID='12757095'>
      <img src="/upload/iblock/d75/aston.png" style=""><!--"width: 61px; height: 100px;"-->
          <div class="caption">
            <span class="title">Aston Martin</span>
          </div>
    </div>
</a>
<div class="hystmodal" id="modalLong22" aria-hidden="true">
        <div class="hystmodal__wrap">
            <div class="hystmodal__window" role="dialog" aria-modal="true">
                <button class="hystmodal__close" data-hystclose>Закрыть</button>
                <div class="hystmodal__styled">  
      <ul>
  <div class="col" style="width: 95%">
    <div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/aston_martin/aston_martin_mc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="61"><br><img src="img/plus.png"></a></div>
      <div class="block_content" data-block="AFTER_SERVICE_M" data-id="12757095"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Aston Martin Механический цех<br>(МЦ Астон Мартин 01.02.2022) - наименование анкеты в 1С</b></span></div>
  </div>
  <div class="col" style="width: 95%">
    <div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/aston_martin/aston_martin_kc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="62"><br><img src="img/plus.png"></a></div>
      <div class="block_content" data-block="AFTER_SERVICE_M" data-id="12757095"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Aston Martin Кузовной цех<br>(КЦ ASM 01.10.2019) - наименование анкеты в 1С</b></span></div>
  </div>
      </ul>
      </div>
    </div>
  </div>
</div>


<a data-hystmodal="#modalLong23" href="#modalLong23">
      <div class="thumbs" data-CODE='SALE_RR' data-ID='12757092'>
      <img src="/upload/iblock/ab7/Rolls-Royce.png" style="width: 61px; height: 100px;"><!--"width: 61px; height: 100px;"-->
          <div class="caption">
            <span class="title">Rolls-Royce</span>
          </div>
    </div>
</a>
<div class="hystmodal" id="modalLong23" aria-hidden="true">
        <div class="hystmodal__wrap">
            <div class="hystmodal__window" role="dialog" aria-modal="true">
                <button class="hystmodal__close" data-hystclose>Закрыть</button>
                <div class="hystmodal__styled">  
      <ul>
  <div class="col" style="width: 95%">
    <div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/rolls_royse/rolls_royse_mc/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="63"><br><img src="img/plus.png"></a></div>
      <div class="block_content" data-block="AFTER_SERVICE_M" data-id="12757092"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Rolls-Royce Механический цех<br>(МЦ Rolls-Royce 01.02.2022) - наименование анкеты в 1С</b></span></div>
  </div>
  <div class="col" style="width: 95%">
    <div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/rolls_royse/rolls_royse_kc//Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="64"><br><img src="img/plus.png"></a></div>
      <div class="block_content" data-block="AFTER_SERVICE_M" data-id="12757092"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Rolls-Royce Кузовной цех<br>(КЦ RR 01.10.2019) - наименование анкеты в 1С</b></span></div>
  </div>
      </ul>
      </div>
    </div>
  </div>
</div>


<a data-hystmodal="#modalLong24" href="#modalLong24">
      <div class="thumbs" data-CODE='TRADE' data-ID='12757105'>
      <img src="/upload/iblock/ca3/trade_volg.png" style="width: 145px; height: 80px;"><!--"width: 61px; height: 100px;"-->
          <div class="caption">
            <span class="title">Trade Волгоградка</span>
          </div>
    </div>
</a>
<div class="hystmodal" id="modalLong24" aria-hidden="true">
        <div class="hystmodal__wrap">
            <div class="hystmodal__window" role="dialog" aria-modal="true">
                <button class="hystmodal__close" data-hystclose>Закрыть</button>
                <div class="hystmodal__styled">  
      <ul>
  <div class="col" style="width: 95%">
    <div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/avilon_trade/avilon_trade_prodazhi/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="65"><br><img src="img/plus.png"></a></div>
      <div class="block_content" data-block="AFTER_SERVICE_M" data-id="12757105"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Авилон Трейд Отдел розничных продаж TI<br>(TRADE-IN ПОКУПКА КЛИЕНТОМ А/М 01.09.2020) – наименование анкеты в 1С</b></span></div>
  </div>
  <div class="col" style="width: 95%">
    <div class="toggle">
      <object data="YourFile.pdf" type="application/x-pdf" title="Посмотреть" width="500" height="720">
          <a data-fancybox="modal" data-src="/knowledge_base/brand_surveys/avilon_trade/avilon_trade_zakupki/Опрос.pdf"href="#"><img src="/knowledge_base/img/Eye-icon.png" width="40px"></a></object><a href="#" class="js-open-modal" data-modal="66"><br><img src="img/plus.png"></a></div>
      <div class="block_content" data-block="AFTER_SERVICE_M" data-id="12757105"><span style="line-height:normal; font-family: Helvetica, sans-serif; font-size: 13.5pt;"><b>Авилон Трейд Отдел закупок TI<br>(TRADE-IN ПРОДАЖА КЛИЕНТОМ А/М 01.09.2020) – наименование анкеты в 1С</b></span></div>
  </div>
      </ul>
      </div>
    </div>
  </div>
</div>

</div>
</div>
<!-- пробник -->












<div class="hystmodal" id="modalLongnews" aria-hidden="true">
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
      "ID" => ""  ,
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
  <script src="/knowledge_base/scripts/jquery-1.8.3.js"></script>
  <script type="text/javascript" src="/knowledge_base/jquery.fancybox.min.js"></script>
  <script type="text/javascript" src="/knowledge_base/pools/menu.js"></script>
  <script type="text/javascript" src="/knowledge_base/scripts/left_menu.js"></script>
  <!-- Меню -->
<!-- Меню -->
<!-- //include($_SERVER["DOCUMENT_ROOT"]."/knowledge_base/menu.php");?> -->


<ul id="menu">
	<li><a href="/knowledge_base/">Главная</a></li>
	<li><a href="/knowledge_base/pools/">Опросы</a></li>
	<li><a data-hystmodal="#modalLongnews" href="#modalLongnews">Новости</a></li>
	</ul>
	<!-- END Меню -->







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
		//var blockText = $editedBlock.html();

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
				//result=$.parseJSON(html);

				/* $('.layout').html (html);
				console.log(html); */
			}
		})

		console.log(frameContent);
		console.log(blockCode);

		//CODE: blockCode,
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

				//console.log(Name);
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



</script>

	</font>
</div>

  </div>

  </div>
 </body>
</html>

<?

global $USER;
$arGroups = $USER->GetUserGroupArray();
$login = CUser::GetLogin();
$test = 1;

	if (in_array("27", $arGroups)) {
	    echo "<b>$login</b> - редактирование анкет <span style='color: green;'>разрешено</span>";
	}
	else
	{
		echo "<b>$login</b> - редактирование анкет <span style='color: red;'>запрещено</span>";
	}



?>


<script src="../dist/hystmodal.min.js"></script>
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


    <!-- Скрипт для добавления pdf-файла в модальном окне -->
<script>
!function(e){"function"!=typeof e.matches&&(e.matches=e.msMatchesSelector||e.mozMatchesSelector||e.webkitMatchesSelector||function(e){for(var t=this,o=(t.document||t.ownerDocument).querySelectorAll(e),n=0;o[n]&&o[n]!==t;)++n;return Boolean(o[n])}),"function"!=typeof e.closest&&(e.closest=function(e){for(var t=this;t&&1===t.nodeType;){if(t.matches(e))return t;t=t.parentNode}return null})}(window.Element.prototype);


document.addEventListener('DOMContentLoaded', function() {

   /* Записываем в переменные массив элементов-кнопок и подложку.
      Подложке зададим id, чтобы не влиять на другие элементы с классом overlay*/
   var modalButtons = document.querySelectorAll('.js-open-modal'),
       overlay      = document.querySelector('.js-overlay-modal'),
       closeButtons = document.querySelectorAll('.js-modal-close');


   /* Перебираем массив кнопок */
   modalButtons.forEach(function(item){

      /* Назначаем каждой кнопке обработчик клика */
      item.addEventListener('click', function(e) {

         /* Предотвращаем стандартное действие элемента. Так как кнопку разные
            люди могут сделать по-разному. Кто-то сделает ссылку, кто-то кнопку.
            Нужно подстраховаться. */
         e.preventDefault();
         /* При каждом клике на кнопку мы будем забирать содержимое атрибута data-modal
            и будем искать модальное окно с таким же атрибутом. */
         var modalId = this.getAttribute('data-modal'),
             modalElem = document.querySelector('.modal[data-modal="' + modalId + '"]');
         /* После того как нашли нужное модальное окно, добавим классы
            подложке и окну чтобы показать их. */
         modalElem.classList.add('active');
         overlay.classList.add('active');
      }); // end click
   }); // end foreach
   closeButtons.forEach(function(item){
      item.addEventListener('click', function(e) {
         var parentModal = this.closest('.modal');
         parentModal.classList.remove('active');
         overlay.classList.remove('active');
      });
   }); // end foreach
    document.body.addEventListener('keyup', function (e) {
        var key = e.keyCode;
        if (key == 27) {
            document.querySelector('.modal.active').classList.remove('active');
            document.querySelector('.overlay').classList.remove('active');
        };
    }, false);
    overlay.addEventListener('click', function() {
        document.querySelector('.modal.active').classList.remove('active');
        this.classList.remove('active');
    });
}); // end ready

</script>
<!-- Скрипт для добавления pdf-файла в модальном окне -->