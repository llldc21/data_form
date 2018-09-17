<?php 
	//include_once('conn.php');

	class Usuario{
		private $nome;
		private $email;
		private $emailRecu;
		private $senha;
		private $dataNasc;

		public function Cadastrar(){
			$sql = 'INSERT INTO tb_usuario VALUES (NULL,"'.$this->nome.'","'.$this->email.'","'.$this->dataNasc.'","'.$this->senha.'","'.$this->emailRecu.'")';	
			if ($GLOBALS['conexao']->query($sql)) {
				echo "foi";
			}else{
				echo "não";
			}

		  }
		
		public function setNome($nome){
			$this->nome = $nome;
		}
		public function getNome(){
			return $this->nome;
		}

		public function setSenha($senha){
			$this->senha = $senha;
		}
		public function getSenha(){
			return $this->senha;
		}

		public function setEmail($email){
			$this->email = $email;
		}

		public function getEmail(){
			return $this->email;
		}

		public function setEmailRecu($emailRecu){
			$this->emailRecu = $emailRecu;
		}

		public function getEmailRecu(){
			return $this->emailRecu;
		}

		public function setdataNasc($dataNasc){
			$this->dataNasc = $dataNasc;
		}
		public function getdataNasc(){
			return $this->dataNasc;
		}


		

	}

	

?>