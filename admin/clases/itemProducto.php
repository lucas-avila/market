<?php

	class itemProducto
	{
		public $codigo;
		public $nombre;
		public $precio;
		public $imagen;
		public $cantidad;

		 function __construct($codigo, $imagen, $nombre, $precio){
			$this->codigo = $codigo;
			$this->nombre = $nombre;
			$this->precio = $precio;
			$this->imagen = $imagen;
			$this->cantidad = 1;
		}

		public function addCantidad(){
			$this->cantidad++;
		}

		public function removeCantidad(){
			$this->cantidad--;
		}


	}

?>