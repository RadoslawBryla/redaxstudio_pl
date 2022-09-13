<?php
class header2 {
	public $headMessage;
	public $imgSrc;
	public $linkSrc;
	public $linkText;
	
	public function __construct($headMessage, $linkSrc, $desc, $linkText) {
		$this->headMessage = $headMessage;
		$this->linkSrc = $linkSrc;
		$this->desc = $desc;
		$this->linkText = $linkText;
	}
	public function printHeader2(){
		echo sprintf('<div id = "header2">
			<div id = "lineContact">
				<h1>%s</h1>
				<hr>
				<p>%s</p>
					<div>
						<a class = "linkNormal" href="%s">
							<p>%s</p>
						</a>
					</div>
				
			</div>
		</div>', $this->headMessage, $this->desc, $this->linkSrc, $this->linkText);
	}
}
?>