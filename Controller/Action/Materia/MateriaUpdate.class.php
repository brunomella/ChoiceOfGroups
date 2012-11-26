<?php
require_once '../../../ChoiceOfGroups/Controller/Action/IAction.class.php';
require_once '../../../ChoiceOfGroups/Model/ServiceLocator.class.php';

class MateriaUpdate implements IAction {
	public function execute(){
		#captura dados dos inputs, botoes.. enfim...
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			#recolher em variaveis valores que estão naqueles id's (HTML)
			$Materia = $_POST["txtMateria"];
			$Descricao = $_POST["txtDescricao"];
			$id = $_POST["txtCodigo"];
		}

		$_Materia = new Materia();
		$_Materia->setId($id);
		$_Materia->setMateria($materia);
		$_Materia->setDescricao($descricao);

		ServiceLocator::getMateriaService()->update($_Materia);
	}
}

?>
