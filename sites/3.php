<?php
require("sites/classes.php");

function printSite(){
	$header = new headerH1("Wypełnij poniższy formularz, aby się z nami skontaktować:");
	$header->printHeader();
	$cont = new contact("");
	$cont->printContact();
}
printSite()
?>
