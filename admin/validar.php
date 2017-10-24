<?php
session_start(); /* Para guardar datos de una sesion y usarla durante toda la navegación del usuario.
-> Se guarda en una cookie y si cierro el browser se pierde.
-> Otra variable es $_SESSION_COOKIE que no se borra aunque el browser se cierre. Podemos setearle un tiempo de vida.
-> Todo archivo que lea o cree una $_SESSION tiene que tener el session_start al inicio*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
	<?php
	require 'autoload.php';

	$base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
	$usuario = new Usuario($base);

	$usuarioOk = $usuario->validarUsuario($_POST['usuario'],md5($_POST['password']));

	if (!$usuarioOk){
	?>
	<script type="text/javascript">
		alert('Usuario y/o password inexistentes');
		window.location='index.php'
	</script>	
	<?php
	}
	else{
		$_SESSION['usuario'] = $_POST['usuario'];
		$_SESSION['password'] = $_POST['password'];
	?>
	<script type="text/javascript">
		window.location='inicio.php'
	</script>
	<?php
	}

	?>
</body>
</html>