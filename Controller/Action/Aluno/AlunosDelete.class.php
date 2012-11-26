<?php
require_once '../../../ChoiceOfGroups/Controller/Action/IAction.class.php';
require_once '../../../ChoiceOfGroups/Model/ServiceLocator.class.php';


class AlunosDelete implements IAction {
	public function execute(){
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$id = $_POST["txtCodigo"];
		}
		
		$_Alunos = new Alunos();
		$_Alunos->setId($id);

		
		$success = ServiceLocator::getAlunosService()->delete($id);
		return $success;
	}
}

?>
