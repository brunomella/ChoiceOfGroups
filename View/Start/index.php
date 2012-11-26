<?php
require_once('../Template/Header.php');
require_once('../Template/Sidebar.php');
require_once('../Template/Footer.php');

#Topo
$header = new Header();
$header->setTitle("Choice Groups");
$header->execute();

#Menu Lateral
$sidebar = new Sidebar();
$sidebar->execute();
echo "
	<fieldset>
		<legend> Choice Groups Project </legend> 
		<img class='__painel' src='../Template/img/Wall.png' />
	</fieldset>
";

#Rodapé
$footer = new Footer();
$footer->execute();

$header = null;
$sidebar = null;
$footer = null;
$appManager = null;
$inicial = null;

?>

