<!DOCTYPE html>

<html>
	<head>
		<title>Controle de Vendas </title>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	</head>
	<body>
		<div class="container">
			</br>
			<img class="img-titulo" src="imagens/siver-roxo.png">
		</div>
		<div class="info">
			<div class="centralizado">
				<h1> Dados do cliente</h1>
			</div>
			<br/>
		
				<?php			
						$nome = $_POST ['nome'];
						$sobrenome = $_POST ['sobrenome'];
						$email = $_POST ['email'];
						$csenha = $_POST ['csenha'];
							
						echo "<h1> O nome é: ".$nome. "</h1>";
						echo "<h1> O sobrenome é: ".$sobrenome. "</h1>";
						echo "<h1> O email é: ".$email. "</h1>";
						echo "<h1> A senha é: ".$csenha. "</h1>";
			?>
		</div>
	</body>
</html>