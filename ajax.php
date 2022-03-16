 <?
include($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule('iblock');

ini_set('error_reporting', E_ERROR);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$arresult = array();
$elemID = $_POST ['ID'];// = 12757074;
$elemCODE = $_POST ['CODE'];// = "KUZ_JLR_MB_BMW_AU";
$res=CIBlockElement::GetList(
	array(),
	array(
		'IBLOCK_CODE'=>'EDIT_DC',
		'ACTIVE'=>'Y',
		'ID'=>$elemID
	),
	false,
	false,
	array(
		'NAME',
		'ID',
		"IBLOCK_ID",
		"MODIFIED_BY",
		'PROPERTY_MEH_TSEH',
		'PROPERTY_KUZ_TSEH',
		'PROPERTY_SALES_DEPORT',
		"TIMESTAMP_X",
	)
);

while ($arres = $res->GetNextElement()){
	$arFields = $arres->GetFields();
	$arresult['NAME'] = $arFields['NAME'];
	$arresult['TIMESTAMP_X'] = $arFields['TIMESTAMP_X'];


	$arProps = $arres->GetProperties();
	$arresult['MEH_TSEH'] = array("TEXT" => $arProps['MEH_TSEH']['~VALUE']['TEXT'], "ID" => $arFields['ID'], "DESCR" => $arProps['MEH_TSEH']["DESCRIPTION"]);
	$arresult['KUZ_TSEH'] = array("TEXT" => $arProps['KUZ_TSEH']['~VALUE']['TEXT'], "ID" => $arFields['ID'], "DESCR" => $arProps['KUZ_TSEH']["~DESCRIPTION"]);
	$arresult['SALES_DEPORT'] = array("TEXT" => $arProps['SALES_DEPORT']['~VALUE']['TEXT'], "ID" => $arFields['ID'], "DESCR" => $arProps['SALES_DEPORT']["DESCRIPTION"]);
}

$arselect = array('PROPERTY_KUZ_TSEH', "ID", "IBLOCK_ID");

$arCODE = explode('_', $elemCODE);
if ($arCODE [0] == 'SALE'){
	$arselect = array ('PROPERTY_SALES_DEPORT', "ID", "IBLOCK_ID");
}

$res=CIBlockElement::GetList(
	array(),
	array(
		'IBLOCK_CODE' => 'EDIT_DC',
		'ACTIVE' => 'Y',
		'CODE' => $elemCODE
	),
	false,
	array('nTopCount'=>1),
	$arselect
);


while ($arres = $res->GetNextElement()){
	$arFields = $arres->GetFields();
	$arProps = $arres->GetProperties();

	/*echo "<pre>";
	print_r($arProps);
	echo "</pre>";*/

	if ($arCODE [0] == 'SALE'){
		$arresult['SALES_DEPORT'] = array("TEXT" => $arProps['SALES_DEPORT']['~VALUE']['TEXT'], "ID" => $arFields["ID"], "DESCR" => $arProps['SALES_DEPORT']["DESCRIPTION"]);
	}
	else {
		$arresult['KUZ_TSEH'] = array("TEXT" => $arProps['KUZ_TSEH']['~VALUE']['TEXT'], "ID" => $arFields['ID'], "DESCR" => $arProps['KUZ_TSEH']["~DESCRIPTION"]);
	}
}

$html = '';
$cellHaveText = 0;

foreach ($arresult as $key=>$arValues){
	if (is_array($arValues) && strlen($arValues["TEXT"])){
		$cellHaveText++;
	}
}

$cell_width = floor(95/$cellHaveText);


foreach ($arresult as $key => $arValues){

	if (is_array($arValues) && strlen($arValues["TEXT"])){

		// $arEditor = CUser::GetByID($arresult["EDITOR"])->fetch();
		// $editorName = $arEditor["NAME"]." ".$arEditor["SECOND_NAME"]." ".$arEditor["LAST_NAME"];

		$sEditorData = "";

		if (strlen($arValues["DESCR"])) {
			$arEditData = explode(";", $arValues["DESCR"]);
			$arEditor = CUser::GetByID($arEditData[1])->fetch();
			$sEditorData = $arEditor["NAME"]." ".$arEditor["SECOND_NAME"]." ".$arEditor["LAST_NAME"];
			if (strlen($arEditData[0])) {
				$sEditorData .= " ";
				$sEditorData .= date("d.m.Y H:i", $arEditData[0]);
			}
		}

		$html .='<div class="col" style="width: '.$cell_width.'%"><div class="block_content" data-block="'.$key.'" data-id="'.$arValues["ID"].'">'.$arValues["TEXT"].'</div>#EDITOR#'.'<img src="img/edit.png" class="edit_col"></div>';
		$editor = (strlen($sEditorData))?'<div class="editor">Изменил: '.$sEditorData.'</div>' : '';
		$html = str_replace("#EDITOR#", $editor, $html);
	}
}

//$html = str_replace("#DATE_UPDATE#", " в ".$arresult["TIMESTAMP_X"], $html);

//exit;

echo $html;
//echo json_encode($arresult);
exit;

 ?>