<Doctype html>
<html lang="pt-br">
	<head>
		<meta charset="ISO-8859-1">
		<title> Título </title>
	</head>
	<body>
<?php
		define("SERVIDOR","127.0.0.1");
		define("BANCO","TEST_ONE");
		echo SERVIDOR.'<br>';
		define("USUARIO","root");
		define("SENHA","");
		$link = mysql_connect(SERVIDOR,USUARIO,SENHA) or die ("Falha ao conectar ao servidor.".mysql_error());
		$cria = "CREATE DATABASE IF NOT EXISTS TEST_ONE";	
			mysql_query($cria) or die ("Falha na criação de banco de dados.".mysql_error());
			mysql_select_db(BANCO,$link) or die ("Falha ao selecionar banco de dados.".mysql_error());
			
$tab_produto="CREATE TABLE IF NOT EXISTS PRODUTO(		cod_produto INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
														nome VARCHAR(40) NOT NULL ,
														descricao VARCHAR(40) NOT NULL ,
														preco DECIMAL(19,2) NOT NULL
														)";
														
$tab_cliente="CREATE TABLE IF NOT EXISTS CLIENTE(		cod_cliente INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
														nome VARCHAR(40) NOT NULL ,
														email VARCHAR(40) NOT NULL ,
														telefone INT(9) NOT NULL
														)";
														
$tab_pedido="CREATE TABLE IF NOT EXISTS PEDIDO(		cod_pedido INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
														cod_produto INT NOT NULL, 
														cod_cliente INT NOT NULL, 
														FOREIGN KEY (cod_produto) REFERENCES PRODUTO(cod_produto),
														FOREIGN KEY (cod_cliente) REFERENCES CLIENTE(cod_cliente)
														)";
													
			mysql_query($tab_produto) or die ("Falha na criação da tabela de produtos.".mysql_error());
			mysql_query($tab_cliente) or die ("Falha na criação da tabela de cleintes.".mysql_error());
			mysql_query($tab_pedido) or die ("Falha na criação da tabela de pedidos.".mysql_error());
			
header("Location:produto.php");
?>

	</body>
</html>
			