<?
	if (isset($_GET["url"]) && $_GET["url"] == 'new'){
		include($_SERVER["DOCUMENT_ROOT"]."/knowledge_base/indexNEW.php");
	}
		else{
		include($_SERVER["DOCUMENT_ROOT"]."/knowledge_base/OLD.php");
	}?>