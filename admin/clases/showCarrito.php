<?php  
	require '../autoload.php';
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
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
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
			<a href="../../index.php" class="navbar-brand">Carrito de Compras</a>
		</div>
		
	</div>
</nav>

<a href="adminCarrito.php?accion=vaciar" style="float:left"><button type="button" class="btn btn-info">Vaciar carrito</button></a>
<a href="adminCarrito.php?accion=mostrar" style="float:right"><button type="button" class="btn btn-info"><img src="../imagenes/cart.png" height="20px" width="20px"> (<?php $_SESSION['carrito']->cantProductos();?>) </button></a><br /><br />
<?php

	// Ver comentario en autoload.php. 
	// Me sirve para evitar tener 3000 includes, esto me permite que lo auto-incluya.

	$base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
	$producto = new Producto($base);

	$_SESSION['carrito']->showCarrito();


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