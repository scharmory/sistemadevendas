<?php
	include_once "controller/FuncionarioController.class.php";
	$controller = new FuncionarioController();
	if(isset($_POST["salvar"])) {
		 $controller -> atualizarFuncionario($_POST);
	}else{
		$id=$_GET["id"];
		$funcionario = $controller -> buscarFuncionarioPorIdNoBanco($id);
	}
?>
<!DOCTYPE html>
<html>
	<head>
			<title>Controle de Vendas - Funcionarios </title>
			<meta charset="utf-8">
			<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
			<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	</head>
	<body>
		<div class="container">
				<br>
				<img class="img-titulo" src="imagens/siver-roxo.png">
				<br>
				<a class=" btn btn-default float-left btn-cadastro" href="inicio.php" > Voltar </a>
			 	<a class=" btn btn-default pull-left btn-cadastro" href="cadfuncionario.php"> Cadastrar Funcionario </a>
		 		<a class=" btn btn-default float-right btn-cadastro" href="sair.php" > Sair </a>
		</div>
		<form method="post">
			<input type="hidden" name="codigo" value="<?=$funcionario->getIdFuncionario()?>" >
			<input type="text" name="nome" value="<?=$funcionario->getNome()?>" >
			<input type="text" name="endereco" value="<?=$funcionario->getEndereco()?>" >
			<input type="text" name="celular" value="<?=$funcionario->getTelefone()?>" >
			<input type="text" name="salario" value="<?=$funcionario->getSalario()?>" >

			<button type="submit" name="salvar">Salvar</button>
		</form>
	</body>
</html>