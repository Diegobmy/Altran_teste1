<!doctype html>
<html lang="pt-br">
	<head>
		<meta charset="iso-8859-1">
		<title>Atualizando Produtos</title>
		<style type="text/css">
		
		</style>
	</head>
    <body>

	<?php
	extract($_POST);
    require 'connectdb.php';
			
			if($_POST["edit"]) {
	$update="UPDATE PRODUTO set nome='$nome' ,descricao='$descricao' ,preco='$preco'
	                           where cod_produto = '$cod_produto'";
	
	$resultado = mysqli_query($link,$update) or die ('Falha na atualização de cliente');
	header("Location:PRODUTO.php");
	}
	if($_POST["del"]) {
	
	$excluir ="DELETE FROM PRODUTO where cod_produto = '$cod_produto'";
	$resultado = mysqli_query($link,$excluir) or die ('Falha');
	$excluir2 ="DELETE FROM PEDIDO WHERE cod_produto = '$cod_produto'";
	$resultado2 = mysqli_query($link,$excluir2) or die ('Falha');
	header("Location:produto.php");
	}
		
	?>	
	
	
    </body>
    </html>		