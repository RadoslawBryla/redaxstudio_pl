<?php
require("sites/classes.php");

function printSite(){
	$header = new headerH1("Co możemy dla Ciebie zrobić?");
	$header->printHeader();
	$blocks = array(
		array("block", "Serwis Komputerowy", "Jedną z naszych usług jest serwis komputerów i urządzeń moblinych. Masz problem z komputerem? Działa zbyt wolno? A może nie włącza się? Nie trać głowy - zgłoś się do nas!", "images/blocks/serwis.png"),
		array("block", "Optymalizacja oprogramowania", "Masz oprogramowanie w firmie, które nie spełnia Twoich wymagań? Chcesz zoptymalizować procesy zachodzące podczas pracy i zmniejszyć koszty? To robota dla nas!", "images/blocks/software.png"),
		array("block", "Sieci komputerowe", "Potrzebujesz w firmie lub domu zaprojektowania i montażu sieci komputerowej? Konfiguracja Cię przytłacza? Zostaw to nam!", "images/blocks/network.png"),
		array("block", "Projektowanie i tworzenie stron internetowych", "Potrzebujesz interaktywnej strony dla własnej firmy? A może chcesz uruchomić sklep internetowy? Wykonujemy szybkie strony  z użyciem profesjonalnych technologii.", "images/blocks/website.png"),
	);
	$blocksCount = 0;
	foreach ($blocks as $oneBlock) {
		$block1 = new block($oneBlock[0], $oneBlock[1], $oneBlock[2], $oneBlock[3]);
		//$blocksCount = $blocksCount + 1;
		//if (($blocksCount % 2) == 0) {
		//	$block1->printBlockLeft();
		//} else {
			$block1->printBlockRight();
		//}
	}
	$cont = new contact("Masz pytanie? Napisz, chętnie odpowiemy!");
	$cont->printContact();
}

printSite()
?>
