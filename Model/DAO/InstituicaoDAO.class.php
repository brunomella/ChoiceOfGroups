<?php
require_once '../../../ChoiceOfGroups/Model/DataBase/DBConnection.class.php';
require_once '../../../ChoiceOfGroups/Model/Entity/Instituicao.class.php';
require_once('IDAO.class.php');

class InstituicaoDAO implements IDAO {

	#CRUD = CREATE
	public function create($class) {
		try {
			#Variavel recebe instancia do objeto de conexão
			$_Connection = DBConnection::getInstance();

			#Variavel recebe objeto instanciado referente a classe
			$_Instituicao = $class;

			#Monta SQL
			$sql  = "INSERT INTO cad_instituicao";
			$sql .= "(instituicao, cidade, estado)";
			$sql .= "VALUES";
			$sql .= "(?, ?, ?)";

			#Troca parametros pelos valores recolhidos
			if ($result = $_Connection->prepare($sql)) {
				#aqui sera colocado o tipo do campo
				$result->bind_param('sss',
				$_Instituicao->getInstituicao,
				$_Instituicao->getCidade,
				$_Instituicao->getEstado);

				#Executa comando SQL
				$result->execute();
					
				#Verifica numero de erros
				if (!$result->errno == 0){
					throw new Exception($result->error);
					return false;
				}else
					return true;
					
				#Fecha Transação
				$result->close();
			}

			#Fecha Conexão
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
			$nomeInstituicao = "";
			$cidade = "";
			$municipio = "";

			$retorno = array();

			#Variavel recebe instancia do objeto de conexão
			$_Connection = DBConnection::getInstance();
			$_Instituicao = new Instituicao();

			#Monta SQL
			$sql = "SELECT * FROM cad_instituicao";

			$result = $_Connection->prepare($sql);

			$result->execute();

			if (!$result->errno == 0){
				throw new Exception($result->error);
				return null;
			}

			$result->bind_result(
					$id,
					$nomeInstituicao,
					$cidade,
					$municipio
			);

			while ($result->fetch()) {
				$retorno[] = $_Instituicao->setId($id);
				$_Instituicao->setInstituicao($nomeInstituicao);
				$_Instituicao->setCidade($cidade);
				$_Instituicao->setEstado($municipio);
			}

			$result->close();

			#Fecha Conexão
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
		$nomeInstituicao = "";
		$cidade = "";
		$municipio = "";

		#Inicializando os Objetos
		$_Connection = DBConnection::getInstance();
		$_Instituicao = new Instituicao();

		$sql =  "SELECT * FROM cad_instituicao ";
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
				$nomeInstituicao,
				$cidade,
				$municipio
		);


		$result->fetch();

		$_Instituicao->setId($id);
		$_Instituicao->setInstituicao($nomeInstituicao);
		$_Instituicao->setCidade($cidade);
		$_Instituicao->setEstado($estado);
			
		return $_Instituicao;

		$result->close();

		$_Connection->closeConnection();
		unset($_Connection);
	}

	#CRUD = READ
	public function readByCriteria($criteria) {
		trigger_error("Não implementado");
	}

	#CRUD = UPDATE
	public function update($class) {
		try {
			#Variavel recebe instancia do objeto de conexão
			$_Connection = DBConnection::getInstance();

			#Variavel recebe objeto instanciado referente a classe
			$_Instituicao = $class;

			#Monta SQL
			$sql  = "UPDATE cad_instituicao SET";
			$sql .= "(instituicao, cidade, estado)";
			$sql .= "WHERE id = ? LIMIT 1";

			#Troca parametros pelos valores recolhidos
			if ($result = $_Connection->prepare($sql)) {
				#aqui sera colocado o tipo do campo
				$result->bind_param('sssi',
				$_Instituicao->getInstituicao,
				$_Instituicao->getCidade,
				$_Instituicao->getEstado,
				$_Instituicao->getId);
					
				#Executa comando SQL
				$result->execute();
					
				#Verifica numero de erros
				if (!$result->errno == 0){
					throw new Exception($result->error);
					return false;
				}else
					return true;
					
				#Fecha Transação
				$result->close();
			}

			#Fecha Conexão
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
			#Variavel recebe instancia do objeto de conexão
			$_Connection = DBConnection::getInstance();

			#Monta SQL
			$sql  = " DELETE FROM cad_instituicao ";
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
