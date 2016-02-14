<!doctype html>
<html lang="pt-br">
	<head>
		<meta charset="iso-8859-1">
		<title>Atualizando Pedidos</title>
		<style type="text/css">
		
		</style>
	</head>
    <body>

	<?php
	extract($_POST);
    require 'connectdb.php';
			
	if($_POST["del"]) {
	
	$excluir ="DELETE FROM PEDIDO WHERE cod_pedido = '$cod_pedido'";
	$resultado = mysqli_query($link,$excluir) or die ('Falha');
	header("Location:pedido.php");
	}
		
	?>	
	
	
    </body>
    </html>		