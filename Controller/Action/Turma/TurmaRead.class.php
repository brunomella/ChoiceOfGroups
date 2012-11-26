<?php
require_once '../../../ChoiceOfGroups/Controller/Action/IAction.class.php';
require_once '../../../ChoiceOfGroups/Model/ServiceLocator.class.php';


class TurmaRead implements IAction{
	public function execute(){
		$_Lista = array();
		$_Lista = ServiceLocator::getTurmaService()->read();
		return $_Lista;
	}
}

?>
