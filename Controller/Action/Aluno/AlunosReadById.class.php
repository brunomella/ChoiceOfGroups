<?php
require_once '../../../ChoiceOfGroups/Controller/Action/IAction.class.php';
require_once '../../../ChoiceOfGroups/Model/ServiceLocator.class.php';

class AlunosReadById implements IAction {
	public function execute(){
		if($_SERVER["REQUEST_METHOD"] == "GET"){
			$id = $_GET["txtCodigo"];
		}
		
		$_Instituicao = ServiceLocator::getAlunosService()->readById($id);
		return $_Alunos;
	}
}


?>