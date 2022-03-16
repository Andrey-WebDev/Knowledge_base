<?
include($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
 
if($_POST["SAVE"] && $_POST["SAVE"] == "Y"){
	$elID = $_POST["BLOCK_ID"];
	$propCode = $_POST["BLOCK_CODE"];
	$iblockID = 95;
	$text = $_POST["HTML"];
	$ArrProp[$propCode] = array('VALUE' => array('TYPE' => 'HTML', 'TEXT' => $text));	
	$el = new CIBlockElement;	
	$arLoadProductArray = Array(
		"MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
	);

	$res = $el->Update($elID, $arLoadProductArray);	
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