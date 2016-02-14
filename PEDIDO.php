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
<script>function deleteForm(){return r = confirm("Deseja mesmo deletar o produto?");}</script>
		
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
              <li><a href="produto.php">Produtos</a></li>
			  <li><a href="CLIENTE.php">Clientes</a></li>
			  <li class="active"><a>Pedidos</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
	  
	  <?php
	require 'connectdb.php';
	$consultaP = "SELECT * FROM PRODUTO";
	$consultaC = "SELECT * FROM CLIENTE";
	$resultadoP=mysqli_query($link,$consultaP) or die ('Falha na Consulta');
	$resultadoC=mysqli_query($link,$consultaC) or die ('Falha na Consulta');
	
	?>
	  
	  <div class="well">
        <p><h1>Novo Pedido</h1>
	   <form action="add_pedido.php" method="post" style="margin:0px 50px;">
                <td><h4>Cliente:</h4>
				<select name="cliente" style="margin:0px 25px;">
				<?php
					while($linha = mysqli_fetch_assoc($resultadoC)){
					$cod_c = $linha['cod_cliente'];
					$nome_c = $linha['nome'];
					echo "<option value='".$cod_c."'>".$nome_c."</option>";
					}	
				?>
				</select><br>
				</td>
                <td><h4>Produtos:</h4>
				

					<select multiple="" class="form-control" name="produtos[]" id="sel2" style="margin:0px 25px;display:inline-block;max-width:10%;">
				<?php
					while($linha = mysqli_fetch_assoc($resultadoP)){
					$cod_p = $linha['cod_produto'];
					$nome_p = $linha['nome'];
					echo "<option value='".$cod_p."'>".$nome_p."</option>";
					}	
				?>
					</select>
					<p><small>Use ctrl para selecionar mais de um produto.</small></p>

				
				</td>
				<input type="submit" value="Cadastrar" />
		</form></p></div>
		
		<div class="col-md-6">
          <table class="table">
            <thead>
			  <tr>
                <th>Código</th>
                <th>Produto</th>
                <th>Cliente</th>
				<th></th>
              </tr>
            </thead>
            <tbody>
			
	<?php
	$consulta2 = "SELECT cod_pedido, Produto.nome AS 'produto_nome', Cliente.nome AS 'cliente_nome'
FROM Pedido
INNER JOIN Cliente
ON Pedido.cod_cliente=Cliente.cod_cliente
INNER JOIN Produto
ON Pedido.cod_produto=Produto.cod_produto";
	$resultado=mysqli_query($link,$consulta2) or die ('Falha na Consulta');
	while($linha = mysqli_fetch_assoc($resultado)){
	$cod = $linha['cod_pedido'];
	$codP = $linha['produto_nome'];
	$codC = $linha['cliente_nome'];
    echo '
              <tr>
			  <form onsubmit="return deleteForm()" action="up_pedido.php" method="post" >
                <td><input id="cod_pedido" name="cod_pedido" type="hidden" value="'.$cod.'"/>'.$cod.'</td>
				<td><input id="cod_produto" name="cod_produto" type="hidden" value="'.$codP.'"/>'.$codP.'</td>
				<td><input id="cod_cliente" name="cod_cliente" type="hidden" value="'.$codC.'"/>'.$codC.'</td>
				<td><input type="submit" value="Deletar" name="del"/></td>
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