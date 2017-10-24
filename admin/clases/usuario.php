<?php 
	class Usuario
	{
		private $usuario;
		private $password;
		private $base;

		function __construct($base)
		{
			$this->base = $base;
		}

		public function validarUsuario($user, $pass){
			$respuesta = $this->base->enviarQuery("SELECT * FROM usuarios 
				WHERE 
					usuario = '$user' 
				AND 
					password = '$pass'");

			if(!$respuesta && $this->base->error != ''){
				echo $this->base->error;
				return respuesta;
			} 

			return $respuesta;
		}

	}
?>