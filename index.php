<?php
	require("sites/header.php");
	session_start();
?>
<html lang = "pl">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link href="css/head.css" rel="stylesheet" type="text/css">
	<link href="css/block.css" rel="stylesheet" type="text/css">
	<link href="css/footer.css" rel="stylesheet" type="text/css">
	<link href="css/header.css" rel="stylesheet" type="text/css">
	<link href="css/contact.css" rel="stylesheet" type="text/css">
	
	<title>RedaXStudio - usługi informatyczne</title>

	<script src="scripts/validate.js"> </script>
	<script src="scripts/header.js"> </script>
	
	
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
	<link rel="icon" href="images/logo.png" sizes="144x144" type="image/png">
</head>
<body>
	<?php // Dla wszystkich podstron  ?>
		<header id = "header1">
			<div>
				<a class = "linkNormal" href="?action=1">
					<img id= "logo" alt="RedaXStudio" src="images/logo.png"/>
				</a>
			</div>
			<div>
				<nav>
					<ul id="menu">
						<li><a class = "linkNormal" href="?action=1">RedaXStudio</a></li>
						<li><a class = "linkNormal" href="?action=3">Kontakt</a></li>
					</ul>
				</nav>
			</div>
			<div>
				<p>
					<img class="phone" src = "images/phone.png"/>+48 507-559-813
				</p>
			</div>	
		</header>
	<main>
		<?php // Koniec dla wszystkich podstron ?>
		<?php
			$page = $_GET['action'] ?? "1";
			$pageTable["1"] = array("Profesjonalne usługi IT w jednym miejscu", "?action=3", "Szukasz nieszablonowych rozwiązań, które zrewolucjonizują Twoją firmę? Zgłoś się do nas.", "Skontakuj się z nami");
			$pageTable["3"] = array("Masz pytanie? Napisz, chętnie odpowiemy!", "?action=1", "Potrzebujesz innego rodzaju usługi IT? Zgłoś się do nas, pomożemy.", "Sprawdź nasze usługi");

			$header2 = new header2($pageTable[$page][0], $pageTable[$page][1], $pageTable[$page][2], $pageTable[$page][3]);
			$header2->printHeader2();
		?>
		<article id = "article1">
			<?php		
				require(sprintf("sites/%s.php", $page));
			?>
		<footer>
			<div id = "footer__information">
				<div id = "footer__logo"></div>
				<div id = "footer__company">
					<p>
						RedaXStudio Radosław Bryła<br>
						Ul. Zielona 7<br>
						38-321 Moszczenica<br>
						NIP: 7382165518<br>
					</p>
				</div>
				<div id = "footer__contact">
					<p>
					Kontakt:<br>
					<img class="phone" src = "images/phone.png"/> +48 507 559 813<br>
					<img class="phone" src = "images/email.png"/> sales@redaxstudio.pl<br>
					</p>
				</div>
			</div>
			<p>Zaprojektowano przez RedaXStudio</p>
		</footer>	
		</article>
		
	</main>
	
</body>

</html>