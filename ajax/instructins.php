<?
$files_dir = $_SERVER["DOCUMENT_ROOT"]."/knowledge_base/pages_instructions/";
$fileName = $_POST["FILE"];
$caption = $_POST["NAME"];
$action = ($_POST["ACTION"] !== "false") ? $_POST["ACTION"] : false ;
$content = file_get_contents($files_dir.$fileName);

if($_POST["ACTION"] == "edit"){
	$caption = "Название: <input value=".$caption.">";
	include($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
	ob_start("callback");?>
	<?
	$APPLICATION->ShowHead();
	$APPLICATION->IncludeComponent("bitrix:fileman.light_editor","",
		Array(
			"CONTENT" => $content,
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
    );?>
	<?$content = ob_get_contents();
}
?>

<div class="popup">
	<div class="caption"><?=$caption?></div>
	<div class="content"><?=$content?></div>
	<?if(!$action){?>
		<div class="editBlock"><img src="img/edit.png"></div>
	<?}?>
	<input type="hidden" value="<?=$fileName?>" class="fileName">
</div>


