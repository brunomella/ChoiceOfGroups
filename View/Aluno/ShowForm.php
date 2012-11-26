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
	case 'AlunosCreate':
		$codigo = null;
		$aluno = "";
		$observacao = "";
		$email = "";

		//$appManager = new AppManager();
		$action = "AlunosCreate";
		$appManager = null;
		break;

	case 'AlunosUpdate':
		$appManager = new AppManager();
		$i = $appManager->execute("AlunosReadById");

		$codigo = $i->getCodigo();
		$aluno = $i->getAluno();
		$observacao = $i->getObservacao();
		$email = $i->getEmail();

		$action = "AlunosUpdate";
		unset($i);
		unset($appManager);
		//$i = null;
		//$appManager = null;
		break;

	case 'AlunosDelete':
		$appManager = new AppManager();
		$i = $appManager->execute("AlunosReadById");
			
		$codigo = $inicial->getCodigo();

		$action = "AlunosDelete";
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
<legend> Cadastro de Alunos </legend>

<form id='frm-cadastro' method='post' action='index.php'>
<label for='action'>
<input type='hidden' size='30' name='action' value='$action'/>
</label>
";
#IF/ELSE BONITÃO
(isset($codigo)) ? $html .= "
<label for='txtCodigo'> Codigo <input type='text' readonly='readonly' size='30' name='txtCodigo' id='txtCodigo' value='$codigo'/>
</label>" : $html = $html;
$html .= "	<label for='txtAluno'> Nome do Aluno
<input type='text' size='100' name='txtAluno' id='txtAluno' value='$aluno'/>
</label>

<label for='txtObservacao'> Observação
<input type='text' size='100' name='txtObservacao' id='txtObservacao' value='$observacao'/>
</label>

<label for='txtEmail'> Email
<input type='text' size='2' name='txtEmail' id='txtEmail' value='$email'/>
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
