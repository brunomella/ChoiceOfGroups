<?php
require_once '../../../ChoiceOfGroups/Controller/Action/IAction.class.php';
require_once '../../../ChoiceOfGroups/Model/ServiceLocator.class.php';

class AlunosUpdate implements IAction {
	public function execute(){
			#captura dados dos inputs, botoes.. enfim... 
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			#recolher em variaveis valores que estão naqueles id's (HTML)
			$aluno = $_POST["txtAluno"];
			$email = $_POST["txtEmail"];
			$observacao = $_POST["txtMunicipio"];
			$turmaId = $_POST["txtTurmaId"];
			$id = $_POST["txtCodigo"];
		}
		
		$_Alunos = new Alunos();
		$_Alunos->setId($id);
		$_Alunos->setTurmaId($turmaId);
		$_Alunos->setAluno($aluno);
		$_Alunos->setEmail($email);
		$_Alunos->setObservacao($observacao);
				
		ServiceLocator::getAlunosService()->update($_Alunos);
	}
}

?>
