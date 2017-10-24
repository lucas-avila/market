<?php
	require "../autoload.php";
	session_start();

	switch ($_GET['accion']) {
		case 'agregar':
			$_SESSION['carrito']->addProducto($_GET['codigo'], $_GET['imagen'], $_GET['producto'], $_GET['precio']);
			header('location: showCarrito.php');
			break;
		case 'mostrar':
			header('location: showCarrito.php');
			break;
		case 'vaciar':
			$_SESSION['carrito']->emptyCarrito();
			header('location: ../../index.php');
			break;
		case 'delete':
			$_SESSION['carrito']->deleteProducto($_GET['pos']);
			header('location: showCarrito.php');
		case 'disminuir':
			$_SESSION['carrito']->disminuirProducto($_GET['codigo'], $_GET['pos']);
			header('location: showCarrito.php');
		default:
			break;
	}

?>