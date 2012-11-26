<?php
require_once('../Template/Header.php');
require_once('../Template/Sidebar.php');
require_once('../Template/Footer.php');
require_once('../../Controller/AppManager.php');

#Topo
$header = new Header();
$header->execute();

#Menu Lateral
$sidebar = new Sidebar();
$sidebar->execute();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
	$action = $_GET["action"];
}

switch ($action) {
	case 'MateriaCreate':
		$codigo = null;
		$materia = "";
		$descricao = "";

		//$appManager = new AppManager();
		$action = "MateriaCreate";
		$appManager = null;
		break;

	case 'MateriaUpdate':
		$appManager = new AppManager();
		$i = $appManager->execute("MateriaReadById");

		$codigo = $i->getCodigo();
		$materia = $i->getMateria();
		$descricao = $i->getDescricao();

		$action = "MateriaUpdate";
		unset($i);
		unset($appManager);
		//$i = null;
		//$appManager = null;
		break;

	case 'MateriaDelete':
		$appManager = new AppManager();
		$i = $appManager->execute("MateriaReadById");
			
		$codigo = $inicial->getCodigo();

		$action = "MateriaDelete";
		unset($i);
		unset($appManager);
		//$inicial = null;
		//$appManager = null;
		break;
	default:
		break;
}
$html = "";
$html = "
<fieldset>
<legend> Cadastro de Materias </legend>

<form id='frm-cadastro' method='post' action='index.php'>
<label for='action'>
<input type='hidden' size='30' name='action' value='$action'/>
</label>
";
#IF/ELSE BONITÃO
(isset($codigo)) ? $html .= "
<label for='txtCodigo'> Codigo <input type='text' readonly='readonly' size='30' name='txtCodigo' id='txtCodigo' value='$codigo'/>
</label>" : $html = $html;
$html .= "	<label for='txtMateria'> Nome da Materia
<input type='text' size='100' name='txtMateria' id='txtMateria' value='$aluno'/>
</label>

<label for='txtDescricao'> Descrição
<input type='text' size='100' name='txtdescricao' id='txtDescricao' value='$descricao'/>
</label>

<input type='submit' class='btn' name='enviar' value='Enviar' />
<input type='reset' class='btn' name='reset' value='Limpar' />

</form>

</fieldset>
";

echo $html;

#Rodapé
$footer = new Footer();
$footer->execute();

$header = null;
$sidebar = null;
$footer = null;
$appManager = null;
$inicial = null;

?>
