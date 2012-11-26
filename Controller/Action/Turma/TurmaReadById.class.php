<?php
require_once '../../../ChoiceOfGroups/Controller/Action/IAction.class.php';
require_once '../../../ChoiceOfGroups/Model/ServiceLocator.class.php';

class TurmaReadById implements IAction {
	public function execute(){
		if($_SERVER["REQUEST_METHOD"] == "GET"){
			$id = $_GET["txtCodigo"];
		}

		$_Turma = ServiceLocator::getTurmaService()->readById($id);
		return $_Turma;
	}
}


?>