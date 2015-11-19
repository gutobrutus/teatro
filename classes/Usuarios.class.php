<?php 
	require_once 'Crud.class.php';
	
	class Usuarios extends Crud {
		protected $table = 'usuarios';
		private $login;
		private $senha;
		private $email;
		private $nome;
		private $adm;
		
		public function setLogin($login){
			$this->login = $login;
		}
		public function getLogin($login) {
			return $this->login;
		}
		public function setSenha($senha){
			$this->senha = $senha;
		}
		public function getSenha($senha) {
			return $this->senha;
		}
		public function setEmail($email){
			$this->email = $email;
		}
		public function getEmail($email) {
			return $this->email;
		}
		public function setNome($nome){
			$this->nome = $nome;
		}
		public function getNome($nome) {
			return $this->nome;
		}
		public function setAdm($adm){
			$this->adm = $adm;
		}
		public function getAdm($adm) {
			return $this->adm;
		}
		public function inserir() {
			$sql = "INSERT INTO $this->table (login, senha, email, nome, adm) VALUES (:login, :senha, :email, :nome, :adm)";
			$stmt = $this->getDB()->prepare($sql);
			$stmt->bindParam(':login', $this->login);
			$stmt->bindParam(':senha', $this->senha);
			$stmt->bindParam(':email', $this->email);
			$stmt->bindParam(':nome', $this->nome);
			$stmt->bindParam(':adm', $this->adm);
			return $stmt->execute();
		}
		public function atualizar($login) {
			$sql  = "UPDATE $this->table SET senha = :senha, email = :email, nome = :nome, adm = :adm WHERE login = :login";
			$stmt = $this->getDB()->prepare($sql);
			$stmt->bindParam(':senha', $this->senha);
			$stmt->bindParam(':email', $this->email);
			$stmt->bindParam(':nome', $this->nome);
			$stmt->bindParam(':adm', $this->adm);
			return $stmt->execute();
		}
	}
?>