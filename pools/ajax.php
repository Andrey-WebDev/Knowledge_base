 <?
 include($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
 CModule::IncludeModule('iblock');
 $arresult = array();
 $elemID = $_POST ['ID'];//=12757105;
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
			'PROPERTY_AFTER_SERVICE_M',
			'PROPERTY_ADD_FIELD',
			'PROPERTY_AFTER_SERVICE_K',
			'PROPERTY_AFTER_SALES'
		)
	);

$html = '';
 $cellHaveText = 0;

	while ($arres=$res->fetch()){
		/* echo "<pre>";
		print_r($arres);
		echo "<pre>"; */
		$arresult['AFTER_SERVICE_M']= array("TEXT" => $arres ['PROPERTY_AFTER_SERVICE_M_VALUE']['TEXT'], "ID" => $arres['ID']);
		$arresult['ADD_FIELD']= array("TEXT" => $arres ['PROPERTY_ADD_FIELD_VALUE']['TEXT'], "ID" => $arres['ID']);
		$arresult['AFTER_SERVICE_K']= array("TEXT" => $arres ['PROPERTY_AFTER_SERVICE_K_VALUE']['TEXT'], "ID" => $arres['ID']);
		$arresult['AFTER_SALES']= array("TEXT" => $arres ['PROPERTY_AFTER_SALES_VALUE']['TEXT'], "ID" => $arres['ID']);;
		$arresult['NAME']=$arres ['NAME'];
		$cellHaveText++;
	}


$cell_width = floor(95/$cellHaveText);

$arGroups = $USER::GetUserGroup($USER->GetID());

/*  echo "<pre>";
print_r($arresult);
echo "</pre>"; */

 foreach ($arresult as $key=>$arValues){
	if (is_array($arValues) && strlen($arValues["TEXT"])){
		//var_dump($key);
		$html .= '<div class="col hide" style="width: '.$cell_width.'%"><div class="toggle"><img src="/knowledge_base/img/Eye-icon.png" width="40px" ></div><div class="block_content" data-block="'.$key.'" data-id="'.$arValues["ID"].'">'.$arValues["TEXT"];
	}

	if(in_array(27, $arGroups)  || in_array(1, $arGroups) || in_array(10, $arGroups)){
		$html .= '</div><img src="img/edit.png" class="edit_col">';
	}

	$html .= "</div></div>";
 }
//VAR_DUMP($html);

 echo $html;
 exit;

 ?>

 