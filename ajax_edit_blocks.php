<?
include($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

global $USER;

if($_POST["SAVE"] && $_POST["SAVE"] == "Y"){
	$elID = $_POST["BLOCK_ID"];// = 12757074;
	$propCode = $_POST["BLOCK_CODE"];// = "KUZ_TSEH";
	$iblockID = 95;
	$text = $_POST["HTML"];
	$time = time();
	$updateData = $time.";".$USER->GetID();
	$ArrProp[$propCode] = array('VALUE' => array('TYPE' => 'HTML', 'TEXT' => $text), "DESCRIPTION" => $updateData);
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