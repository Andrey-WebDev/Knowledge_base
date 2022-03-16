<?include($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<link rel="stylesheet" href="/knowledge_base/pools/css/style.css">

<?
$sMenu = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/knowledge_base/pools/.menu.php");
$arMenu = unserialize($sMenu);

$key = intval($_GET["KEY"]);

if(!$key){
	$arKeysMenu = array_keys($arMenu);

	$key = end($arKeysMenu)+1;
}

$itemName = $arMenu[$key];
$fileName = "page".$key.".pdf";
$files_dir = $_SERVER["DOCUMENT_ROOT"]."/knowledge_base/pages_instructions/";

if (count($_POST)) {

	if(!strlen($_POST["MENU_NAME"]) && !strlen($_FILES["tmp_name"])){
		unlink($files_dir.$fileName);

		unset($arMenu[$key]);
		file_put_contents($_SERVER["DOCUMENT_ROOT"]."/knowledge_base/pools/.menu.php", serialize($arMenu));

		exit ("Item was deleted");
	}

	if(isset($_FILES["userfile"])){

		$errors = false;

		if(!strlen($_POST["MENU_NAME"])){
			echo "Введите название раздела";
			$errors = true;
		}

		if (!move_uploaded_file($_FILES['userfile']['tmp_name'], $files_dir.$fileName) || $errors) {
			echo "Ошибка загрузки файла";
			$errors = true;
		}

		if(!$errors){

			$arMenu[$key] = $_POST["MENU_NAME"];
			file_put_contents($_SERVER["DOCUMENT_ROOT"]."/knowledge_base/pools/.menu.php", serialize($arMenu));

			exit("Success");
		}
	}
}


$content = file_get_contents($files_dir.$fileName);
if(!strlen($content)){
	$content = "";
}
?>
<div class="addPDF">
<fieldset>
<legend>
<p>Загрузите файл в формате .pdf</p>
</legend>
<form method="POST" enctype="multipart/form-data">
<br>
	Название: <input value="<?=$itemName?>" name="MENU_NAME">
	<?/*$APPLICATION->ShowHead();
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
	);*/?>
	<input type="file" name="userfile">
	<div align="right">
	<input type="submit">
	</div>
</form>
</fieldset>
</div>