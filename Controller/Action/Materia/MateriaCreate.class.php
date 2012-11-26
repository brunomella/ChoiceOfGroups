<?php
require_once '../../../ChoiceOfGroups/Controller/Action/IAction.class.php';
require_once '../../../ChoiceOfGroups/Model/ServiceLocator.class.php';

class MateriaCreate implements IAction {
	public function execute(){
		#captura dados dos inputs, botoes.. enfim...
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			#recolher em variaveis valores que est�o naqueles id's (HTML)
			$Materia = $_POST["txtMateria"];
			$Descricao = $_POST["txtDescricao"];
			$id = $_POST["txtCodigo"];
		}

		$_Materia = new Materia();
		$_Materia->setId($id);
		$_Materia->setMateria($materia);
		$_Materia->setDescricao($descricao);

		ServiceLocator::getMateriaService()->create($_Materia);
	}
}

?>
