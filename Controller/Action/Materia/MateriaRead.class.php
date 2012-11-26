<?php
require_once '../../../ChoiceOfGroups/Controller/Action/IAction.class.php';
require_once '../../../ChoiceOfGroups/Model/ServiceLocator.class.php';


class MateriaRead implements IAction{
	public function execute(){
		$_Lista = array();
		$_Lista = ServiceLocator::getMateriaService()->read();
		return $_Lista;
	}
}

?>