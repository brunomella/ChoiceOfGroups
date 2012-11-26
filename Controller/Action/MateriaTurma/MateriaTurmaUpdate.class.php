<?php
require_once '../../../ChoiceOfGroups/Controller/Action/IAction.class.php';
require_once '../../../ChoiceOfGroups/Model/ServiceLocator.class.php';

class MateriaTurmaUpdate implements IAction {
	public function execute(){
		#captura dados dos inputs, botoes.. enfim...
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			#recolher em variaveis valores que est�o naqueles id's (HTML)
			$materiaId = $_POST["txtMateriaId"];
			$turmaId = $_POST["txtTurmaId"];
			$id = $_POST["txtCodigo"];
		}

		$_MateriaTurma = new MateriaTurma();
		$_MateriaTurma->setId($id);
		$_MateriaTurma->setMateriaId($materiaId);
		$_MateriaTurma->setTurmaId($turmaId);

		ServiceLocator::getMateriaTurmaService()->update($_MateriaTurma);
	}
}

?>
