<?php 
session_start();
if (!isset($_SESSION['usuario'])){
	echo '  <script type="text/javascript">
                alert("Para acceder a este contenido tiene que estar logueado");
                window.location="index.php"
            </script>';
} /* Esto tiene que estar en todos los archivos que quiero proteger por sesión*/
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
			<a href="../inicio.php" class="navbar-brand">ABM Productos</a>
			<a href="salir.php" class="navbar-brand">Cerrar Sesion</a>
		</div>
		
	</div>
</nav>

<?php 
	require "../autoload.php";

	$base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
	$producto = new Producto($base);

	$respuesta = $producto->insertProducto($_POST['nombre'], $_POST['descripcion'], $_POST['precio']);

	if($respuesta){
		echo '<div class="alert alert-success" role="alert">
				  <h4 class="alert-heading">Well done!</h4>
				  <p>Se añadió con exito tu producto :)</p>
				  <hr>
				  <p class="mb-0">Podés volver a la página principal.</p>
			</div>';
	} else{
		echo '<div class="alert alert-danger" role="alert">
				  <h4 class="alert-heading">Ooops!</h4>
				  <p>No se pudo añadir tu producto.</p>
				  <hr>
				  <p class="mb-0">Si querés podés volver a intentarlo pero no te aseguro nada...</p>
			</div>';
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