<?php
require_once '../../../ChoiceOfGroups/Controller/Action/IAction.class.php';
require_once '../../../ChoiceOfGroups/Model/ServiceLocator.class.php';


class AlunosRead implements IAction{
	public function execute(){
		$_Lista = array();
		$_Lista = ServiceLocator::getAlunosService()->read();
		return $_Lista;
	}
}

?>