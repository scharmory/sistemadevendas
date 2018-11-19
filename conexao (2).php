<html>
	<head>
		<title>Controle de Vendas </title>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	</head>
	
	<body>
		<img class="img-titulo" src="imagens/siver-roxo.png">
		<div class="centralizado">
		<?php
	function getConnection() {
	$host = "localhost";
	$banco = "controledevendas";
	$usr = "root";
	$senha = "";
	try {
		$conn = new PDO("mysql:host=$host; dbname=$banco", $usr, $senha);
		return array("conxexao" => $conn, "mensagem" => "Sucesso");
		} 
		catch (PDOException $e) {
		return array("conxexao" => null, "mensagem" => "Ocorreu o seguinte erro:<br>" . $e->getMessage());
		}
		}
		$teste = getConnection();
		print_r($teste["mensagem"]);
		?>
		</div>
	
	</body>

