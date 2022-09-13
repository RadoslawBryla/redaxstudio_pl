<?php
	

	
class block {
	public $head;
	public $desc;
	public $imgSrc;
	public $type;

	public function __construct($type, $head, $desc, $imgSrc) {
		$this->type = $type;
		$this->head = $head;
		$this->desc = $desc;
		$this->imgSrc = $imgSrc;
	}
	
	public function printBlockLeft() {
		echo sprintf('<div class = %s>
				<div class="block__img" style="background-image: url(%s);" ></div>
				<div>
					<h2>%s</h2>
					<p>%s</p>
				</div>
			</div>', $this->type, $this->imgSrc, $this->head, $this->desc);
	}
	
	public function printBlockRight() {
		echo sprintf('<div class = %s>
				<div>
					<h2>%s</h2>
					<p>%s</p>
				</div>
				<div class="block__divImg">
					<div class="block__img" style="background-image: url(%s);" ></div>
				</div>
			</div>', $this->type, $this->head, $this->desc, $this->imgSrc);
	}
	
	public function printBlockWithoutImage() {
		echo sprintf('<div class = %s>
				<div>
					<h2>%s</h2>
					<p>%s</p>
				</div>
			</div>', $this->type, $this->head, $this->desc);
	}
}

class headerH1 {
	public $desc;
	
	public function __construct($desc) {
		$this->desc = $desc;
	}
	
	public function printHeader(){
		echo sprintf('<h1 id = "headerH1">%s</h1>', $this->desc);
	}		
	
}
//Testowy bład, który jest bardzo długi i reprezentuje pomyłkę użytkownika, który wpisał tekst.
class contact {
	public $headMessage;
	
	public function __construct($headMessage) {
		$this->headMessage = $headMessage;
	}
	
	public function printContact(){
		echo sprintf('<div class = "contact">
				<div>
					<h2>%s</h2>
					<form id = "contact__form">
						<div id ="contact_all">
							<div id ="contact_info">
								<input id = "contact__names" class="contact__name" type="text" name="name" placeholder="Nazwa wyświetlana*">
								<input id = "contact__mail" class="contact__name" type="email" name="mail" placeholder="Adres e-mail*">
								<input id = "contact__tele" class="contact__name" type="tel" name="tel" placeholder="Telefon">
								<input id = "contact__topic" class="contact__name" type="text" name="topic" placeholder="Temat*">
							</div>
							<div id = "contact__desc">
								<textarea id="contact__area" class="contact__name" type="text" name="desc" placeholder="Wiadomość*"></textarea>
							</div>
						</div>
						<div id ="contact__validate">
							<p id = "validate_error">
								
							</p>
							<button class = "linkNormal" id = "validate__button" type="submit">Wyślij</button>
						<div>
					</form>
				</div>
			</div>', $this->headMessage);
	}
}



?>