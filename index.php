<?php  
	require 'admin/autoload.php';
	session_start();
	if(!isset($_SESSION['carrito']))
		$_SESSION['carrito'] = new Carrito();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Carrito de Compras</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<link rel="stylesheet" type="text/css" href="admin/bootstrap/css/bootstrap.min.css">
	<link href="http://fonts.googleapis.com/css?family=Asap:400,700" rel="stylesheet" type="text/css">
</head>
<body>
<div id="wrap">  <div id="main"> 
<div class="container">
<nav class="navbar navbar-inverse" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#acolapsar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span> 
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="./" class="navbar-brand">Carrito de Compras</a>
		</div>
		
	</div>
</nav>

<a href="admin/clases/adminCarrito.php?accion=vaciar" style="float:left"><button type="button" class="btn btn-info">Vaciar carrito</button></a>
<a href="admin/clases/adminCarrito.php?accion=mostrar" style="float:right"><button type="button" class="btn btn-info"><img src="admin/imagenes/cart.png" height="20px" width="20px"> (<?php $_SESSION['carrito']->cantProductos();?>) </button></a><br /><br />
<?php

	// Ver comentario en autoload.php. 
	// Me sirve para evitar tener 3000 includes, esto me permite que lo auto-incluya.

	$base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
	$producto = new Producto($base);

	$productoOK = $producto->getProductos();
	
	if ($productoOK){
		echo '<table class="table table-striped">
				<tr class="active">
					<td>Código</td>
					<td></td>
					<td>Producto</td>
					<td>Descripcion</td>
					<td>Precio</td>
					<td colspan="2">Operaciones</td>
				</tr>';
		for ($i=0;$i<count($productoOK);$i++){
			echo '<tr>
					<td>'.$productoOK[$i]['codigo'].'</td>
					<td><img src="admin/'.$productoOK[$i]['imagen'].'" width="70px" height="70px"></td>
					<td>'.$productoOK[$i]['producto'].'</td>
					<td>'.$productoOK[$i]['descripcion'].'</td>
					<td>'.$productoOK[$i]['precio'].'</td>
					<td><a href="admin/clases/adminCarrito.php?accion=agregar&codigo='.$productoOK[$i]['codigo'].'&imagen='.$productoOK[$i]['imagen'].'&producto='.$productoOK[$i]['producto'].'&precio='.$productoOK[$i]['precio'].'"><button type="button" class="btn btn-info">Agregar</button></a></td>
				</tr>';
			
		}
		echo '</table>';
	}
	else{
		echo 'Aún no hay datos ingresados';
	}


?>
</div>
</div> 
<div id="push"></div>
</div> 
<footer><div class="container">Este es el pie de página</div></footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>