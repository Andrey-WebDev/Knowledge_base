<?
	if (isset($_GET["url"]) && $_GET["url"] == 'new'){
		include($_SERVER["DOCUMENT_ROOT"]."/knowledge_base/NEW.php");
	}
		else{
		include($_SERVER["DOCUMENT_ROOT"]."/knowledge_base/OLD.php");
	}?>