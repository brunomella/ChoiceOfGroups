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
	case 'MateriaTurmaCreate':
		$codigo = null;
		$materiaId = ""; //nao sei se é null verificar
		$turmaId = ""; // nao sei se é null verificar

		//$appManager = new AppManager();
		$action = "MateriaTurmaCreate";
		$appManager = null;
		break;

	case 'MateriaTurmaUpdate':
		$appManager = new AppManager();
		$i = $appManager->execute("MateriaTurmaReadById");

		$codigo = $i->getCodigo();
		$materiaId = $i->getMateriaId();
		$turmaId = $i->getTurmaId();

		$action = "MateriaTurmaUpdate";
		unset($i);
		unset($appManager);
		//$i = null;
		//$appManager = null;
		break;

	case 'MateriaTurmaDelete':
		$appManager = new AppManager();
		$i = $appManager->execute("MateriaTurmaReadById");
			
		$codigo = $inicial->getCodigo();

		$action = "MateriaTurmaDelete";
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
<legend> Cadastro de Materias/Turmas </legend>

<form id='frm-cadastro' method='post' action='index.php'>
<label for='action'>
<input type='hidden' size='30' name='action' value='$action'/>
</label>
";
#IF/ELSE BONITÃO
(isset($codigo)) ? $html .= "
<label for='txtCodigo'> Codigo <input type='text' readonly='readonly' size='30' name='txtCodigo' id='txtCodigo' value='$codigo'/>
</label>" : $html = $html;
$html .= "

<label for='txtMateriaId'> Materia ID
<input type='text' size='100' name='txtMateriaId' id='txtMateriaId' value='$materiaId'/>
</label>

<label for='txtTurmaId'> Turma ID
<input type='text' size='100' name='txtTurmaId' id='txtTurmaId' value='$turmaId'/>
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
