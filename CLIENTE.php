<!DOCTYPE html>
<html>
	<head>
		<title>Test1 - Clientes</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
		<link href="css/bootstrap.min.css" rel = "stylesheet">
		<link href="css/styles.css" rel = "stylesheet">
	</head>
	<body>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="js/bootsrap.js"></script>
		
		<script>
		function deleteForm(){return r = confirm("Deseja mesmo deletar o cliente?");}
		function editForm(){return r = confirm("Deseja mesmo salvar as alterações ao cliente?");}
		
		
				function enable_input(impid) {
			inp1 = document.getElementById('nome'+impid);
			inp2 = document.getElementById('email'+impid);
			inp3 = document.getElementById('telefone'+impid);
				inp1.disabled = false;
				inp2.disabled = false;
				inp3.disabled = false;
				document.getElementById("edit"+impid).style.display = "none";
				document.getElementById("submit"+impid).style.display = "block";
			}
		</script>
		
	<nav class="navbar navbar-default">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">Controle de Estoque</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="PRODUTO.php">Produtos</a></li>
              <li class="active"><a>Clientes</a></li>
              <li><a href="Pedido.php">Pedidos</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
	  <div class="well">
        <p><h1>Novo Cliente</h1>
	   <form action="add_cliente.php" method="post" >
                <td><input id="nome" name="nome" type="text" placeholder="Nome" required></td>
                <td><input id="email" name="email" type="text" placeholder="E-mail" required></td>
                <td><input id="telefone" name="telefone" type="text" placeholder="Telefone" required></td>
				<input type="submit" value="Cadastrar" />
		</form></p></div>
		
		<div class="col-md-6">
          <table class="table">
            <thead>
			  <tr>
                <th>Código</th>
                <th>Name</th>
                <th>Email</th>
                <th>Telefone</th>
				<th></th>
				<th></th>
              </tr>
            </thead>
            <tbody>
			
	<?php
	require 'connectdb.php';
	$consulta = "SELECT * FROM CLIENTE";
	$resultado=mysqli_query($link,$consulta) or die ('Falha na Consulta');
	while($linha = mysqli_fetch_assoc($resultado)){
	$cod = $linha['cod_cliente'];
	$nome = $linha['nome'];
	$email = $linha['email'];
	$telefone = $linha['telefone'];
    echo '
              <tr>
			  <form onsubmit="return editForm()" action="up_cliente.php" method="post" >
                <td><input id="cod_cliente" name="cod_cliente" type="hidden" value="'.$cod.'"/>'.$cod.'</td>
                <td><input id="nome'.$cod.'" name="nome" type="text" value="'.$nome.'" disabled></td>
                <td><input id="email'.$cod.'" name="email" type="text" value="'.$email.'" disabled></td>
                <td><input id="telefone'.$cod.'" name="telefone" type="text" value="'.$telefone.'" disabled></td>
				<td>
				<input id="edit'.$cod.'" onclick="enable_input('.$cod.');" type="button" value="Editar" />
				<input id="submit'.$cod.'" type="submit" value="Salvar Alterações" name="edit" style="display: none;"/>
				</form>
				</td>
				<td>
				<form onsubmit="return deleteForm()" action="up_cliente.php" method="post" >
				<input id="cod_cliente" name="cod_cliente" type="hidden" value="'.$cod.'"/>
				<input type="submit" value="Deletar" name="del"/></td>
				</form>
              </tr>
	';
	}
		
		
		?>
            </tbody>
          </table>
        </div>
		
  
		
	</body>
</html>