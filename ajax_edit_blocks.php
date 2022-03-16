<?
include($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

global $USER;

/*$_POST["HTML"] = '<h2><b>Кузовной цех Mercedes-Benz/BMW/JLR/AUDI</b>   </h2><h1><b>18.07.2017</b></h1>  <div><div>Мастера:</div><div><p>8-джалалетдинов</p> <p>9-ежова</p> <p>10-волкова</p> <p>Сафронов Леонов руководство</p><p><br></p> <p>СБ Кириллова Никулина 3948</p></div></div>';*/

if($_POST["SAVE"] && $_POST["SAVE"] == "Y"){
	$elID = $_POST["BLOCK_ID"];// = 12757074;
	$propCode = $_POST["BLOCK_CODE"];// = "KUZ_TSEH";
	$iblockID = 95;
	$text = $_POST["HTML"];
	$time = time();
	//$updateData = array('date' => $time, 'user' => $USER->GetID());
	$updateData = $time.";".$USER->GetID();
	$ArrProp[$propCode] = array('VALUE' => array('TYPE' => 'HTML', 'TEXT' => $text), "DESCRIPTION" => $updateData);

	/* $el = new CIBlockElement;

	$arLoadProductArray = Array(
		"MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
	); */

	// $res = $el->Update($elID, $arLoadProductArray);

	/*echo "<pre>";
	print_r($ArrProp);
	echo "</pre>";

	exit;*/

	CIBlockElement::SetPropertyValuesEx($elID, $iblockID, $ArrProp);

	echo $text;
}
else{
	$APPLICATION->ShowHead();
	$APPLICATION->IncludeComponent("bitrix:fileman.light_editor", "", array(
	"CONTENT" => $_POST["TEXT"],
	"INPUT_NAME" => "",
	"INPUT_ID" => "",
	"WIDTH" => "100%",
	"HEIGHT" => "500px",
	"RESIZABLE" => "Y",
	"AUTO_RESIZE" => "Y",
	"VIDEO_ALLOW_VIDEO" => "N",
	"USE_FILE_DIALOGS" => "N",
	"ID" => "",
	"JS_OBJ_NAME" => ""
	),
	false
);?>

	<button class="saveResult">Сохранить</button>
 <?}?>