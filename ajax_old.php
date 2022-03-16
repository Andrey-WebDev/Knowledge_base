 <?
 include($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
 CModule::IncludeModule('iblock');
 $arresult = array();
 $elemID = $_POST ['ID'];// =12757105;
 $elemCODE = $_POST ['CODE'];
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
			"MODIFIED_BY",
			'PROPERTY_MEH_TSEH',
			'PROPERTY_KUZ_TSEH',
			'PROPERTY_SALES_DEPORT',
			"TIMESTAMP_X",
		)
	);
	
	while ($arres=$res->fetch()){
		$arresult['EDITOR']= $arres["MODIFIED_BY"];
		$arresult['MEH_TSEH']= array("TEXT" => $arres ['PROPERTY_MEH_TSEH_VALUE']['TEXT'], "ID" => $arres['ID']);
		$arresult['KUZ_TSEH']= array("TEXT" => $arres ['PROPERTY_KUZ_TSEH_VALUE']['TEXT'], "ID" => $arres['ID']);
		$arresult['SALES_DEPORT']= array("TEXT" => $arres ['PROPERTY_SALES_DEPORT_VALUE']['TEXT'], "ID" => $arres['ID']);;
		$arresult['NAME']=$arres ['NAME'];
		$arresult['TIMESTAMP_X']=$arres ['TIMESTAMP_X'];
	} 
	
	$arselect=array('PROPERTY_KUZ_TSEH', "ID");
	
	$arCODE=explode('_', $elemCODE);
	if ($arCODE [0]=='SALE'){
		$arselect = array ('PROPERTY_SALES_DEPORT', "ID");
	}
	
	$res=CIBlockElement::GetList(
		array(),
		array('IBLOCK_CODE'=>'EDIT_DC','ACTIVE'=>'Y','CODE' => $elemCODE ),
		false,
		array('nTopCount'=>1),
		$arselect
	); 
	
	
	while ($arres=$res->fetch()){
		if ($arCODE [0] == 'SALE'){
			$arresult['SALES_DEPORT'] = array("TEXT" => $arres['PROPERTY_SALES_DEPORT_VALUE']['TEXT'], "ID" => $arres["ID"]);
		}
		else {
			$arresult['KUZ_TSEH']= array("TEXT" => $arres['PROPERTY_KUZ_TSEH_VALUE']['TEXT'], "ID" => $arres["ID"]);
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
$arEditor = CUser::GetByID($arresult["EDITOR"])->fetch();
$editorName = $arEditor["NAME"]." ".$arEditor["SECOND_NAME"]." ".$arEditor["LAST_NAME"];

 foreach ($arresult as $key=>$arValues){
	if (is_array($arValues) && strlen($arValues["TEXT"])){
		$html .='<div class="col" style="width: '.$cell_width.'%"><div class="block_content" data-block="'.$key.'" data-id="'.$arValues["ID"].'">'.$arValues["TEXT"].'</div><div class="editor">Изменил: '.$editorName.'#DATE_UPDATE#</div><img src="img/edit.png" class="edit_col"></div>';
	}
 }

$html = str_replace("#DATE_UPDATE#", " в ".$arresult["TIMESTAMP_X"], $html);
 
 echo $html;
 exit;
 ?>