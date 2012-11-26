<?php
require_once '../Template/Header.php';
require_once '../Template/Sidebar.php';
require_once '../Template/Footer.php';
require_once '../../Controller/AppManager.class.php';
require_once '../../Model/DAO/InstituicaoDAO.class.php';
require_once '../../Model/Entity/Instituicao.class.php';

$funcionafeladaputa = array();

#Chama Acao para mostrar Todos os itens cadastrados
$appManager = new AppManager();
$instituicao = $appManager->execute("InstituicaoRead");

#Apelando
$dao = new InstituicaoDAO();
$funcionafeladaputa = $dao->read();

#Topo
$header = new Header();
$header->setTitle("Instituição");
$header->setDescription("Instituição do projeto Choice Groups");
$header->execute();

#Menu Lateral
$sidebar = new Sidebar();
$sidebar->execute();

#Responsavel por recolher as "actions" da pagina
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$action = $_POST["action"];
}

$html = "";
$html = "
	<fieldset>
		<legend> Cadastro de Instituições </legend> 
		<div id='novo'><a href='ShowForm.php?action=InstituicaoCreate'> <img src='../Template/img/Novo.png' /> Novo</a></div>
		
		<table>
    		<thead>
			<tr>
				<th>#</th>
				<th>Instituição</th>
				<th></th>
				<th></th>
			</tr>
			</thead>
			<tbody>";
#Apelaçao nivel 999999
foreach ($funcionafeladaputa as $merda) {		
	$Id = $merda->getId();

	$html .= " <tr>
					<td width='10'>$Id</td>
					<td>$descricao</td>
					<td width='80'><a href='ShowForm.php?action=InstituicaoUpdate&codigo=$id'><img src='../Template/img/Editar.png' /> Editar</a></td>
					<td width='110'><a href='ShowForm.php?action=InstituicaoDelete&codigo=$id'><img src='../Template/img/Excluir.png' /> Remover</a></td>
				</tr> ";
}
			
$html .= "</tbody>
		</table>
	</fieldset>";

#Mostra HTML
echo $html;

#Rodapé
$footer = new Footer();
$footer->execute();

#Libera Objetos
unset($instituicao);
unset($header);
unset($sidebar);
unset($footer);
?>

