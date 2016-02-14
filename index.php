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
              <li><a href="cliente.php">Clientes</a></li>
              <li><a href="Pedido.php">Pedidos</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
	  <form action="/criar_tabelas.php">
<center><button type="submit" class="btn btn-primary btn-lg">Criar DB e Tabelas</button></center>
		</form>
	</body>
</html>