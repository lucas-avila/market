<?php

	class Producto
	{
		private $base;

		function __construct($base)
		{
			$this->base = $base;
		}


		private function checkRespuesta($respuesta){
			if(!$respuesta && $this->base->error != ''){
				echo $this->base->error;
			} 

			return $respuesta;
		}

		public function getProductos(){
			$respuesta = $this->base->enviarQuery("SELECT * FROM productos");
		
			return $this->checkRespuesta($respuesta);
		}

		public function insertProducto($nombre, $descripcion, $precio){
			$respuesta = $this->base->enviarQuery("INSERT INTO productos (codigo, producto, descripcion, precio)
				VALUES (null, '$nombre', '$descripcion', '$precio') ");

			return($this->checkRespuesta($respuesta));
		}

		public function updateProducto($codigo, $nombre, $descripcion, $precio){
			$respuesta = $this->base->enviarQuery("UPDATE productos SET 
					producto = '$nombre',
					descripcion = '$descripcion',
					precio = '$precio'
				WHERE 
					codigo = '$codigo'");
			return($this->checkRespuesta($respuesta));
		}

		public function deleteProducto($codigo){
			$respuesta = $this->base->enviarQuery("DELETE 
				FROM 
					productos 
				WHERE 
					codigo = '$codigo'");
			return($this->checkRespuesta($respuesta));
		}

		public function mostrarProducto($codigo){

			$respuesta = $this->base->enviarQuery("SELECT * FROM productos WHERE codigo = '$codigo' ");

			return($this->checkRespuesta($respuesta));
		}
	}

?>