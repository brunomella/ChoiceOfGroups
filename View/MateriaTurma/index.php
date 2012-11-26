<?php
require_once('../Template/Header.php');
require_once('../Template/Sidebar.php');
require_once('../Template/Footer.php');
require_once('../../Controller/AppManager.php');
require_once '../../Model/DAO/MateriaTurmaDAO.class.php';
require_once '../../Model/Entity/MateriaTurma.class.php';

#Chama Acao para mostrar Todos as Materia/Turma
$appManager = new AppManager();
$materiaTurma = $appManager->execute("MateriaTurmaRead");

#Topo
$header = new Header();
$header->setTitle("Materia X Turma");
$header->execute();

#Menu Lateral
$sidebar = new Sidebar();
$sidebar->execute();

#Responsavel por recolher as "actions" da pagina
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$action = $_POST["action"];
}

echo "
	<fieldset>
		<legend> Materia X Turma </legend> 
		<div id='novo'><a href='ShowForm.php?action=TurmaMateriaCreate'> <img src='../Template/img/Novo.png' /> Novo</a></div>
		
		<table>
    		<thead>
			<tr>
				<th>#</th>
				<th>Turma</th>
				<th>Materia</th>
				<th></th>
				<th></th>
			</tr>
			</thead>
			<tbody>
				<tr>
					<td width='10'>1</td>
					<td>Turma A</td>
					<td>Programa��o Web</td>
					<td width='80'><a href='#'><img src='../Template/img/Editar.png' /> Editar</a></td>
					<td width='110'><a href='#'><img src='../Template/img/Excluir.png' /> Remover</a></td>
				</tr>
			</tbody>
		</table>		
	</fieldset>
";

#Rodap�
$footer = new Footer();
$footer->execute();

$header = null;
$sidebar = null;
$footer = null;
$appManager = null;
$inicial = null;

?>

