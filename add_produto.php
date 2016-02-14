<!doctype html>
<html lang="pt-br">
	<head>
		<meta charset="iso-8859-1">
		<title>Realizando cadastro de produto</title>
		<style type="text/css">
		
		</style>
	</head>
    <body>

	<?php
	require 'connectdb.php';	
	extract($_POST);
	$incluir="INSERT INTO PRODUTO (cod_produto, nome, descricao, preco) VALUES (NULL, '$nome', '$descricao', '$preco');";
	$resultado = mysqli_query($link,$incluir) or die ('Falha na inclusão de Produto');
	header("Location:produto.php");
	echo'<br/>Registro incluido: '.mysql_affected_rows();	
	?>	
	
	
    </body>
    </html>		