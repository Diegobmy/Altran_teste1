<!doctype html>
<html lang="pt-br">
	<head>
		<meta charset="iso-8859-1">
		<title>Atualizando Clientes</title>
		<style type="text/css">
		
		</style>
	</head>
    <body>

	<?php
	extract($_POST);
    require 'connectdb.php';
			
			if($_POST["edit"]) {
	$update="UPDATE CLIENTE set nome='$nome' ,email='$email' ,telefone='$telefone'
	                           where cod_cliente = '$cod_cliente'";
	
	$resultado = mysqli_query($link,$update) or die ('Falha na atualização de cliente');
	header("Location:CLIENTE.php");
	}
	if($_POST["del"]) {
	
	$excluir ="DELETE FROM CLIENTE where cod_cliente = '$cod_cliente'";
	$resultado = mysqli_query($link,$excluir) or die ('Falha');
	$excluir2 ="DELETE FROM PEDIDO WHERE cod_cliente = '$cod_cliente'";
	$resultado2 = mysqli_query($link,$excluir2) or die ('Falha');
	header("Location:CLIENTE.php");
	}
		
	?>	
	
	
    </body>
    </html>		