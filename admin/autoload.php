<?php

	function __autoload($nombreclase){
		/*Se ejecuta automaticamente c/ vez que queremos instanciar
		una clase y no se encuentra su definiciòn.*/
		require ('clases/'.$nombreclase.'.php');
	}

	require ('define.php');
?>