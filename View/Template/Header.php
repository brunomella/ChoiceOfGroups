<?php
class Header {
	#Variaveis para uso do HTML
	private $title = "ChoiceOfGroups";
	private $description = "Projeto Choice of Groups";
	private $keywords = "Choice, Groups, Unic, Projeto, Web, PHP";
	private $css = "../Template/style.css";


	public function execute() {
		#Monta HTML do cabeçalho das paginas
		$html = "
		<!DOCTYPE html>
		<head>
			<meta http-equiv='content-type' content='text/html; charset=ISO-8859-1' />
			<title>$this->title</title>
			<meta name='description' content='$this->description' />
			<meta nem='keywords' content='$this->keywords' />
			<link rel='stylesheet' type='text/css' href='$this->css' />
		</head> 
		<body>
		<div id='header'>
		<a href='../Start/index.php'> <img src='../Template/img/logo.png' /> </a>
		</div>
		<div id='erros'>
			<ul>
		
			</ul>
		</div>
		";
		
		#Mostra HTML
		echo $html;
	}

	#Sets das variaveis
	public function setTitle($title) {
		$this->title = $title;
	}

	public function setDescription($description) {
		$this->description = $description;
	}

	public function setKeywords($keywords) {
		$this->keywords = $keywords;
	}

	public function setCss($css) {
		$this->css = $css;
	}
}
?>