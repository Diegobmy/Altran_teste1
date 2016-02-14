<!doctype html>
<html lang="pt-br">
	<head>
		<meta charset="iso-8859-1">
		<title>Realizando cadastro de cliente</title>
		<style type="text/css">
		
		</style>
	</head>
    <body>

	<?php
	require 'connectdb.php';	
	extract($_POST);
	$incluir="INSERT INTO CLIENTE (cod_cliente, nome, email, telefone) VALUES (NULL, '$nome', '$email', '$telefone');";
	$resultado = mysqli_query($link,$incluir) or die ('Falha na inclusão de Cliente');
	header("Location:cliente.php");
	echo'<br/>Registro incluido: '.mysql_affected_rows();	
	?>	
	
	
    </body>
    </html>		