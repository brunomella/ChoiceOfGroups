<?php
require_once '../../../ChoiceOfGroups/Controller/Action/IAction.class.php';
require_once '../../../ChoiceOfGroups/Model/ServiceLocator.class.php';


class InstituicaoDelete implements IAction {
	public function execute(){
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$id = $_POST["txtCodigo"];
		}
		
		$_Instituicao = new Instituicao();
		$_Instituicao->setId($id);
		
		$success = ServiceLocator::getInstituicaoService()->delete($id);
		return $success;
	}
}

?>