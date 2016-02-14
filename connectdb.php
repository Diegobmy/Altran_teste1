	<?php
	extract($_POST);
    define("SERVIDOR","127.0.0.1");
	define("BANCO","test_one");
	define ("USUARIO","root");
	define ("SENHA","");
	$link = mysqli_connect(SERVIDOR,USUARIO,SENHA) or die  ("Falha na conexão".mysql_error());
		mysqli_select_db($link,BANCO) or die ("Falha na conexão".mysqli_error());	
	?>	
	