<?php
require_once '../../../ChoiceOfGroups/Controller/Action/IAction.class.php';
require_once '../../../ChoiceOfGroups/Model/ServiceLocator.class.php';

class TurmaCreate implements IAction {
	public function execute(){
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$id = $_POST["txtCodigo"];
		}

		$_Turma = new MateriaTurma();
		$_Turma->setId($id);

		$success = ServiceLocator::getTurmaService()->delete($id);
		return $success;
	}
}

?>