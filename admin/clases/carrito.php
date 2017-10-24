<?php 
	class Carrito
	{
		private $productos;

		function __construct(){
			$this->productos = array();
		}

		public function addProducto($codigo, $imagen, $nombre, $precio){
			
			if($this->estaEnElCarrito($codigo)){
				$unProducto = $this->obtenerProducto($codigo);
				$unProducto->addCantidad();
			} else{
				$unProducto = new itemProducto($codigo, $imagen, $nombre, $precio);
				array_push($this->productos, $unProducto);
			}
		}

		public function estaEnElCarrito($codigo){
			foreach ($this->productos as $producto) {
				if($producto->codigo == $codigo){
					return 1;
				}
			}
			return 0;
		}

		public function obtenerProducto($codigo){
			foreach ($this->productos as $producto) {
				if($producto->codigo == $codigo){
					return $producto;
				}
			}
		}

		public function disminuirProducto($codigo, $pos){
			$unProducto = $this->obtenerProducto($codigo);
			if($unProducto->cantidad == 1){
				$this->deleteProducto($pos);
				return;
			}
			$unProducto->removeCantidad();
		}

		public function deleteProducto($pos){
			unset($this->productos[$pos]);
			$this->productos = array_values($this->productos);
		}

		public function cantProductos(){
			$cantidad = 0;
			foreach ($this->productos as $producto) {
				$cantidad += $producto->cantidad;
			}
			echo $cantidad;
		}

		public function emptyCarrito(){
			$this->productos = array();
		}

		public function showCarrito(){
			echo '<table class="table table-striped">
					<tr class="active">
						<td>Código</td>
						<td></td>
						<td>Producto</td>
						<td>Precio</td>
						<td>Cantidad</td>
						<td colspan="2">Operaciones</td>
					</tr>';
			for ($i=0;$i<count($this->productos);$i++){
				echo '<tr>
						<td>'.$this->productos[$i]->codigo.'</td>
						<td><img src="../'.$this->productos[$i]->imagen.'" width="70px" height="70px"></td>
						<td>'.$this->productos[$i]->nombre.'</td>
						<td>'.$this->productos[$i]->precio*$this->productos[$i]->cantidad.'</td>
						<td><a href="modificarCarrito.php?accion=agregar&codigo='.$this->productos[$i]->codigo.'&imagen='.$this->productos[$i]->imagen.'&producto='.$this->productos[$i]->nombre.'&precio='.$this->productos[$i]->precio.'"><img width="20px" heigth="20px" src="../imagenes/plus.png"></a> '.$this->productos[$i]->cantidad.' <a href="modificarCarrito.php?accion=disminuir&codigo='.$this->productos[$i]->codigo.'&pos='.$i.'"><img width="20px" heigth="20px" src="../imagenes/minus.png"></a></td>
						<td><a href="adminCarrito.php?accion=delete&pos='.$i.'"><button type="button" class="btn btn-info">Eliminar</button></a></td>
				</tr>';
				
		}
		echo '</table>';
		}

	}
	

?>