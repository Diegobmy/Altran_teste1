<!DOCTYPE html>
<html>
	<head>
		<title>Test1 - Produtos</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
		<link href="css/bootstrap.min.css" rel = "stylesheet">
		<link href="css/styles.css" rel = "stylesheet">
	</head>
	<body>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="js/bootsrap.js"></script>
		
		<script>
		function deleteForm(){return r = confirm("Deseja mesmo deletar o produto?");}
		function editForm(){return r = confirm("Deseja mesmo salvar as alterações ao produto?");}
		
				function enable_input(impid) {
			inp1 = document.getElementById('nome'+impid);
			inp2 = document.getElementById('descricao'+impid);
			inp3 = document.getElementById('preco'+impid);
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
              <li class="active"><a>Produtos</a></li>
			  <li><a href="CLIENTE.php">Clientes</a></li>
              <li><a href="Pedido.php">Pedidos</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
	  <div class="well">
        <p><h1>Novo Produto</h1>
	   <form action="add_produto.php" method="post" >
                <td><input id="nome" name="nome" type="text" placeholder="Nome" required></td>
                <td><input id="descricao" name="descricao" type="text" placeholder="Descrição" required></td>
                <td><input id="preco" name="preco" type="text" placeholder="Preço" required></td>
				<input type="submit" value="Cadastrar" />
		</form></p></div>
		
		<div class="col-md-6">
          <table class="table">
            <thead>
			  <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
				<th></th>
				<th></th>
              </tr>
            </thead>
            <tbody>
			
	<?php
	require 'connectdb.php';
	$consulta = "SELECT * FROM PRODUTO";
	$resultado=mysqli_query($link,$consulta) or die ('Falha na Consulta');
	while($linha = mysqli_fetch_assoc($resultado)){
	$cod = $linha['cod_produto'];
	$nome = $linha['nome'];
	$descricao = $linha['descricao'];
	$preco = $linha['preco'];
    echo '
              <tr>
			  <form onsubmit="return editForm()" action="up_produto.php" method="post" >
                <td><input id="cod_produto" name="cod_produto" type="hidden" value="'.$cod.'"/>'.$cod.'</td>
                <td><input id="nome'.$cod.'" name="nome" type="text" value="'.$nome.'" disabled></td>
                <td><input id="descricao'.$cod.'" name="descricao" type="text" value="'.$descricao.'" disabled></td>
                <td><input id="preco'.$cod.'" name="preco" type="text" value="'.$preco.'" disabled></td>
				<td>
				<input id="edit'.$cod.'" onclick="enable_input('.$cod.');" type="button" value="Editar" />
				<input id="submit'.$cod.'" type="submit" value="Salvar Alterações" name="edit" style="display: none;"/>
				</form>
				</td>
				<td>
				<form onsubmit="return deleteForm()" action="up_produto.php" method="post" >
				<input id="cod_produto" name="cod_produto" type="hidden" value="'.$cod.'"/>
				<input type="submit" value="Deletar" name="del"/></td>
				</form>
				</td>
              </tr>
	';
	}
		
		
		?>
            </tbody>
          </table>
        </div>
		
  
		
	</body>
</html>