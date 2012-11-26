<?php
//Institui��o
require_once 'Action/Instituicao/InstituicaoRead.class.php';

class AppManager {

	public function execute($action){
		switch ($action) {

			case "AlunosRead":
				#Instancia da Ac�o
				$_AlunosRead = new AlunosRead();
				#Recebe lista
				$_Lista = $_AlunosRead->execute();
				#Libera Objeto
				unset($_AlunosRead);
				#Retorna Lista
				return $_Lista;
				break;

			case "InstituicaoRead":
				#Instancia da Ac�o
				$_InstituicaoRead = new InstituicaoRead();
				#Recebe lista
				$_Lista = $_InstituicaoRead->execute();
				#Libera Objeto
				unset($_InstituicaoRead);
				#Retorna Lista
				return $_Lista;
				break;

			case "MateriaRead":
				#Instancia da Ac�o
				$_MateriaRead = new MateriaRead();
				#Recebe lista
				$_Lista = $_MateriaRead->execute();
				#Libera Objeto
				unset($_MateriaRead);
				#Retorna Lista
				return $_Lista;
				break;

			case "MateriaTurmaRead":
				#Instancia da Ac�o
				$_MateriaTurmaRead = new MateriaTurmaRead();
				#Recebe lista
				$_Lista = $_MateriaTurmaRead->execute();
				#Libera Objeto
				unset($_MateriaTurmaRead);
				#Retorna Lista
				return $_Lista;
				break;
					
			case "TurmaRead":
				#Instancia da Ac�o
				$_TurmaRead = new TurmaRead();
				#Recebe lista
				$_Lista = $_TurmaRead->execute();
				#Libera Objeto
				unset($_TurmaRead);
				#Retorna Lista
				return $_Lista;
				break;

			default: break;
		}
	}
}


?>