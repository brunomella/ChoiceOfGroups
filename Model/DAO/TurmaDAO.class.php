<?php
require_once '../../../ChoiceOfGroups/Model/DataBase/DBConnection.class.php';
require_once '../../../ChoiceOfGroups/Model/Entity/Materia.class.php';
require_once('IDAO.class.php');
class TurmaDAO {

	#CRUD = CREATE
	public function create($class) {
		try {
			#Variavel recebe instancia do objeto de conexуo
			$_Connection = DBConnection::getInstance();

			#Variavel recebe objeto instanciado referente a classe
			$_Turma = $class;

			#Monta SQL
			$sql  = "INSERT INTO cad_turma";
			$sql .= "(turma, descricao)";
			$sql .= "VALUES";
			$sql .= "(?, ?)";

			#Troca parametros pelos valores recolhidos
			if ($result = $_Connection->prepare($sql)) {
				#aqui sera colocado o tipo do campo
				$result->bind_param('sss',
				$_Turma->getTurma,
				$_Turma->getDescricao);

				#Executa comando SQL
				$result->execute();
					
				#Verifica numero de erros
				if (!$result->errno == 0){
					throw new Exception($result->error);
					return false;
				}else
					return true;

				#Fecha Transaчуo
				$result->close();
			}

			#Fecha Conexуo
			$_Connection->closeConnection();

			#Libera da memoria
			unset($_Connection);

		} catch (Exception $e) {
			trigger_error($e->getMessage()." na Linha : ".$e->getLine());
		}
	}

	#CRUD = READ
	public function read() {
		try {
			$id = 0;
			$turma = "";
			$descricao = "";


			$retorno = array();

			#Variavel recebe instancia do objeto de conexуo
			$_Connection = DBConnection::getInstance();
			$_Turma = new Turma();

			#Monta SQL
			$sql = "SELECT * FROM cad_turma";

			$result = $_Connection->prepare($sql);

			$result->execute();

			if (!$result->errno == 0){
				throw new Exception($result->error);
				return null;
			}

			$result->bind_result(
					$id,
					$turma,
					$descricao
			);

			while ($result->fetch()) {
				$retorno[] = $_Turma->setId($id);
				$_Turma->setTurma($turma);
				$_Turma->setDescricao($descricao);

			}

			$result->close();

			#Fecha Conexуo
			$_Connection->closeConnection();

			#Libera da memoria
			unset($_Connection);

			return $retorno;

		} catch (Exception $e) {
			trigger_error($e->getMessage()." na Linha : ".$e->getLine());
		}
	}

	#CRUD = READ
	public function readById($id) {
		#Declarando Variaveis
		$id = 0;
		$turma = "";
		$descricao = "";

		#Inicializando os Objetos
		$_Connection = DBConnection::getInstance();
		$_Turma = new Turma();

		$sql =  "SELECT * FROM cad_turma ";
		$sql .= "WHERE id=? LIMIT 1";

		$result = $_Connection->prepare($sql);

		$result->bind_param('i', $id);

		$result->execute();

		if (!$result->errno == 0){
			throw new Exception($result->error);
			return null;
		}

		$result->bind_result(
				$id,
				$turma,
				$descricao
		);


		$result->fetch();

		$_Turma->setId($id);
		$_Turma->setTurma($turma);
		$_Turma->setDescricao($descricao);
			
		return $_Turma;

		$result->close();

		$_Connection->closeConnection();
		unset($_Connection);
	}

	#CRUD = READ
	public function readByCriteria($criteria) {
		trigger_error("Nуo implementado");
	}

	#CRUD = UPDATE
	public function update($class) {
		try {
			#Variavel recebe instancia do objeto de conexуo
			$_Connection = DBConnection::getInstance();

			#Variavel recebe objeto instanciado referente a classe
			$_Turma = $class;

			#Monta SQL
			$sql  = "UPDATE cad_turma SET";
			$sql .= "(turma, descricao)";
			$sql .= "WHERE id = ? LIMIT 1";

			#Troca parametros pelos valores recolhidos
			if ($result = $_Connection->prepare($sql)) {
				#aqui sera colocado o tipo do campo
				$result->bind_param('sssi',
				$_Turma->getTurma,
				$_Turma->getDescricao,
				$_Turma->getId);

				#Executa comando SQL
				$result->execute();

				#Verifica numero de erros
				if (!$result->errno == 0){
					throw new Exception($result->error);
					return false;
				}else
					return true;

				#Fecha Transaчуo
				$result->close();
			}

			#Fecha Conexуo
			$_Connection->closeConnection();

			#Libera Objeto
			unset($_Connection);

		} catch (Exception $e) {
			trigger_error($e->getMessage());
		}
	}

	#CRUD = DELETE
	public function delete($id) {
		try {
			#Variavel recebe instancia do objeto de conexуo
			$_Connection = DBConnection::getInstance();

			#Monta SQL
			$sql  = " DELETE FROM cad_turma ";
			$sql .= " WHERE ID_INSCRICAO=? LIMIT 1";

			#Troca parametros pelos valores recolhidos
			if ($result = $_Connection->prepare($sql)){
				$result->bind_param('i',
						$id
				);

				#Executa
				$result->execute();

				#Verifica Numeros de Erros
				if (!$result->errno == 0){
					throw new Exception($result->error);
					return false;
				}
				else
					return true;

				#Fecha
				$result->close();
			}

			#Fecha conexao com o banco
			$_Connection->closeConnection();

			#Libera Objeto
			unset($_Connection);

		} catch (Exception $e) {
			trigger_error($e->getMessage());
		}
	}
}




?>