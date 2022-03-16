<?include($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

$arResult = array();

$el = new CIBlockElement;

$arLoadProductArray = Array(
  "IBLOCK_ID"      => $_POST["IBLOCK"],
  "NAME"           => $_POST["NAME"],
  "ACTIVE"         => "Y",            // активен
  "DETAIL_TEXT"    => $_POST["TEXT"],
  "DETAIL_TEXT_TYPE" => "html"
  );

if($PRODUCT_ID = $el->Add($arLoadProductArray)){
	$arResult["STATUS"] = "OK";
	$arResult["TEXT"] = "Новость добавлена";
}
else{
	$arResult["STATUS"] = "Error";
	$arResult["TEXT"] = $el->LAST_ERROR;;
}

echo json_encode($arResult);
?>