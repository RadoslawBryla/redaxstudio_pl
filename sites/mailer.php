<?php
function sendEmail($receiver, $clientMessage){
	$to = $receiver;
	$from = 'RedaXStudio - Usługi informatyczne <sales@redaxstudio.pl>';
	$replyTo = 'RedaXStudio - Usługi informatyczne <sales@redaxstudio.pl>';
	$subject = 'Dziękujemy za wiadomość!';
	$message = sprintf('<html>
					<head>
						<style>
							* {
								font-family: "Roboto", sans-serif;
							}
							h1 {
							   font-size: 25px;
							}
							p {
							   font-size: 12px;
							}
							#message{
							  font-style: italic;
							}
						</style>
						<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
						<title>Dziękujemy za Twoją wiadomość!</title>
					</head>
					<body>
						<h1>Dzień dobry!</h1>
						<p>Otrzymaliśmy Twoją wiadomość, odpowiemy w najbliższym możliwym terminie. Poniżej treść wiadomości:</p>
						<p id = "message">%s</p>
						<br>
						<br>
						<hr>
						<p>Administratorem Twoich danych osobowych jest:</p>
						<p>RedaXStudio Radosław Bryła</p>
						<p>ul. Zielona 7</p>
						<p>38-321 Moszczenica</p>
						<p>NIP: 7382165518</p>
				</body>
			</html>
	    ', $clientMessage);

	$headers  = 'MIME-Version: 1.0'."\r\n";
	$headers .= 'Content-Type: text/html; charset=utf-8'."\r\n";
	$headers .= 'From: '.$from."\r\n";
	$headers .= 'Reply-To: '.$replyTo."\r\n";
    mail($to, $subject, $message, $headers);
}

function sendEmailToUs($name, $tele, $email, $topic, $msg){
	$to = 'sales@redaxstudio.pl';
	$from = 'RedaXStudio - Usługi informatyczne <sales@redaxstudio.pl>';
	$replyTo = 'RedaXStudio - Usługi informatyczne <sales@redaxstudio.pl>';
	$subject = 'Otrzymano wiadomość od klienta';
	$message = sprintf('<html>
					<head>
						<style>
							* {
								font-family: "Roboto", sans-serif;
							}
							h1 {
							   font-size: 25px;
							}
							p {
							   font-size: 12px;
							}
							#message{
							  font-style: italic;
							}
						</style>
						<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
						<title>Otrzymano wiadomość!</title>
					</head>
					<body>
						<h1>Otrzymano wiadomość!</h1>
						<p>Nadawca: %s</p>
						<p>Numer telefonu: %s</p>
						<p>Email: %s</p>
						<p>Temat: %s</p>
						<p>Wiadomość:</p>
						<p id = "message">%s</p>
				</body>
			</html>
	    ', $name, $tele, $email, $topic, $msg);

	$headers  = 'MIME-Version: 1.0'."\r\n";
	$headers .= 'Content-Type: text/html; charset=utf-8'."\r\n";
	$headers .= 'From: '.$from."\r\n";
	$headers .= 'Reply-To: '.$replyTo."\r\n";
    mail($to, $subject, $message, $headers);
}

function pushError($str){
		echo $str;
}

function validateData($data){
	$noNumber = '/^[a-zA-Z-zżźćńółęąśŻŹĆĄŚĘŁÓŃ]+$/';
	if (strlen(preg_replace('/ |	/i', '', $data->name)) <= 3 || !preg_match($noNumber, preg_replace('/ /i', '', $data->name))) {
        pushError("Nazwa powinna zawierać minimum 4 znaki oraz składać się tylko z liter i spacji. (php)");
		return 0;	
    }
	
	$reg = '/^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*(\.\w{2,})+$/';
    if (!preg_match($reg,$data->email)) {
        pushError("Wypełnij poprawnie pole z emailem.");
		return 0;
    }
	if (strlen(preg_replace('/ |	/i', '', $data->topic)) < 10 || !preg_match($noNumber, preg_replace('/ /i', '', $data->topic))) {
        pushError("Temat powinnien zawierać minimum 10 znaków oraz składać się tylko z liter i spacji.");
		return 0;
    }
	if (strlen(preg_replace('/ |	/i', '', $data->desc)) < 30 || !preg_match($noNumber, preg_replace('/ |\n|\,|\.|\?|\!|\(|\)|\-|\:/i', '', $data->desc))) {
        pushError("Opis powinien zawierać minimum 30 znaków oraz składać się tylko z liter, spacji oraz znaków: ',.?!'");
		return 0;
    }
	sendEmail($data->email, $data->desc);
	sendEmailToUs($data->name, $data->tele, $data->email, $data->topic, $data->desc);

	return 1;
}

$data = json_decode(file_get_contents("php://input"));
if (isset($data) and isset($data->name) and isset($data->email)) {
	require("classes.php");
	if (validateData($data) == 1) {
		pushError("Wiadomość została wysłana. Dziękujemy za kontakt.");
	}
}

?>