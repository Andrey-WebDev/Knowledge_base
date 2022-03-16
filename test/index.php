<!-- ПЕРЕАДРЕСАЦИЯ -->
	<?
	if (isset($_GET["url"]) && $_GET["url"] == 'old'){
		include($_SERVER["DOCUMENT_ROOT"]."/knowledge_base/test/OLD.php");
	}
		else{
		include($_SERVER["DOCUMENT_ROOT"]."/knowledge_base/test/NEW.php");
	}?>
<!-- ПЕРЕАДРЕСАЦИЯ -->