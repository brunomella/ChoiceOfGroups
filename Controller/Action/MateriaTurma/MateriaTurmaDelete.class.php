<?php
require_once '../../../ChoiceOfGroups/Controller/Action/IAction.class.php';
require_once '../../../ChoiceOfGroups/Model/ServiceLocator.class.php';

class MateriaTurmaCreate implements IAction {
	public function execute(){
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$id = $_POST["txtCodigo"];
		}

		$_MateriaTurma = new MateriaTurma();
		$_MateriaTurma->setId($id);

		$success = ServiceLocator::getMateriaService()->delete($id);
		return $success;
	}
}

?>