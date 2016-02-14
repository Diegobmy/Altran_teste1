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
	foreach ($produtos as &$produto) {
		$incluir="INSERT INTO PEDIDO (cod_pedido, cod_produto, cod_cliente) VALUES (NULL, $produto, $cliente);";
		$resultado = mysqli_query($link,$incluir) or die ('Falha na inclusão de Pedido');
		header("Location:pedido.php");
	}
	

	?>	
	
	
    </body>
    </html>		