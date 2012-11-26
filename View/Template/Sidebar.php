<?php
class Sidebar {
	public function execute() {
		$html = null; 
	    $html .="
	    	<div id='body'>
			<div id='menu'>
			<ul>
				<li><a href='../Instituicao/'>Instituição de Ensino</a></li>
				<li><a href='../Materia/'>Cadastro de Materias</a></li>
	    		<li><a href='../Turma/'>Cadastro de Turmas</a></li>
	    		<li><a href='../Aluno/'>Cadastro de Alunos</a></li>
	    		<li><a href='#'></a></li>
	    		<li><a href='../MateriaTurma/'>Turmas X Materias</a></li>
	    		<li><a href='#'></a></li>
	    		<li><a href='../Grupo/'>Gerar Grupos de Estudos</a></li>
			</ul>
		</div>
		<div id='content'>";
	    
		echo $html;
	}
}
?>