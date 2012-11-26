<?php
require_once('../Template/Header.php');
require_once('../Template/Sidebar.php');
require_once('../Template/Footer.php');
require_once('../../Controller/AppManager.php');

#Topo
$header = new Header();
$header->setTitle("Grupos");
$header->execute();

#Menu Lateral
$sidebar = new Sidebar();
$sidebar->execute();
echo "
	<fieldset>
		<legend> Gerar Grupos </legend> 
		
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

