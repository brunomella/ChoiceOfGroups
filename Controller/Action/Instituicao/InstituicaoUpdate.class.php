<?php
require_once '../../../ChoiceOfGroups/Controller/Action/IAction.class.php';
require_once '../../../ChoiceOfGroups/Model/ServiceLocator.class.php';

class InstituicaoUpdate implements IAction {
	public function execute(){
			#captura dados dos inputs, botoes.. enfim... 
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			#recolher em variaveis valores que estão naqueles id's (HTML)
			$instituicao = $_POST["txtInstituicao"];
			$cidade = $_POST["txtCidade"];
			$estado = $_POST["txtMunicipio"];
			$id = $_POST["txtCodigo"];
		}
		
		$_Instituicao = new Instituicao();
		$_Instituicao->setId($id);
		$_Instituicao->setInstituicao($instituicao);
		$_Instituicao->setCidade($cidade);
		$_Instituicao->setEstado($estado);
		
		ServiceLocator::getInstituicaoService()->update($_Instituicao);
	}
}

?>