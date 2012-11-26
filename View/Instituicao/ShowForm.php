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
	case 'InstituicaoCreate':
		$codigo = null;
		$instituicao = "";
		$cidade = "";
		$estado = "";
		$data = null;
		
		//$appManager = new AppManager();
		$action = "InstituicaoCreate";
		$appManager = null;
		break;

	case 'InstituicaoUpdate':
		$appManager = new AppManager();
		$i = $appManager->execute("InstituicaoReadById");
		
		$codigo = $i->getCodigo();
		$instituicao = $i->getNome();
		$cidade = $i->getDescricao();
		$estado = $i->getAno();
		$data = $i->getAno();
		
		$action = "InstituicaoUpdate";
		unset($i);
		unset($appManager);
		//$i = null;
		//$appManager = null;
		break;

	case 'InstituicaoDelete':
		$appManager = new AppManager();
		$i = $appManager->execute("InstituicaoReadById");
			
		$codigo = $inicial->getCodigo();

		$action = "InstituicaoDelete";
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
		<legend> Cadastro de Instituições </legend> 
		
		<form id='frm-cadastro' method='post' action='index.php'>
			<label for='action'>
				<input type='hidden' size='30' name='action' value='$action'/>
			</label>
";
#IF/ELSE BONITÃO
(isset($codigo)) ? $html .= "
		    <label for='txtCodigo'> Codigo <input type='text' readonly='readonly' size='30' name='txtCodigo' id='txtCodigo' value='$codigo'/>
								</label>" : $html = $html;		
$html .= "	<label for='txtInstituicao'>Nome da Instituição
				<input type='text' size='100' name='txtInstituicao' id='txtInstituicao' value='$instituicao'/>
			</label>
			
			<label for='txtCidade'>Cidade
				<input type='text' size='100' name='txtCidade' id='txtCidade' value='$cidade'/>
			</label>
			
			<label for='txtMunicipio'> UF
				<input type='text' size='2' name='txtMunicipio' id='txtMunicipio' value='$estado'/>
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

