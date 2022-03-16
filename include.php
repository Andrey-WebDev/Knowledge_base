<?
require_once('OLD.php');
if ($update == 'Y') {
	function warning()
		{
			echo "
			<div class='warning'>
				Уважаемые коллеги! В связи с проведением <br>
				плановых работ по обновлению компонентов БЗ,<br>
				возможны кратковременные сбои в работе.<br>
				Приносим извенения за доставленные неудобства.
			</div>";
		}
}
else
{
	function warning()
		{
			echo "";
		}
}