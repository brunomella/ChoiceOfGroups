<?php
require_once '../../../ChoiceOfGroups/Controller/Action/IAction.class.php';
require_once '../../../ChoiceOfGroups/Model/ServiceLocator.class.php';

class TurmaCreate implements IAction {
	public function execute(){
		#captura dados dos inputs, botoes.. enfim...
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			#recolher em variaveis valores que estão naqueles id's (HTML)
			$instituicaoId = $_POST["txtInstituicaoId"];
			$descricao = $_POST["txtDescricao"];
			$turma = $_POST["txtTurma"];
			$id = $_POST["txtCodigo"];
		}

		$_Turma = new Turma();
		$_Turma->setId($id);
		$_Turma->setTurma($turma);
		$_Turma->setDescricao($descricao);
		$_Turma->setInstituicaoId($instituicaoId);

		ServiceLocator::getTurmaService()->create($_Turma);
	}
}

?>
