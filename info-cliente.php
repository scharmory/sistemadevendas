<!DOCTYPE html>
<?php
	include_once 'controller/ClienteController.class.php';
	$controle = new ClienteController();
	$cliente = new Cliente();
	if(isset($_POST['btn-cadastrar'])){
		if($_POST["codigo"] != 0){
			$controle -> atualizarCliente($_POST);
		}else{
			$controle->salvarClienteNoBanco($_POST);
		}
		header("location: clientes.php");
	}
	if(isset($_GET["id"])){
		$titulo = "Altere o Cliente";
		$id=$_GET["id"];
		$cliente = $controle -> buscarClientePorIdNoBanco($id);
	}else{
		$titulo = "Cadastre um Cliente";
	}

?>
<html>
	<head>
		<title>Controle de Vendas </title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	</head>
	
	<body>
		<div class="container">
			</br>
			 <img class="img-titulo" src="imagens/siver-roxo.png">
			 <a class=" btn btn-default float-left btn-cadastro" href="clientes.php" > Voltar </a>
			 <a class=" btn btn-default float-right btn-cadastro" href="sair.php" > Sair </a>
		</div>
			<?php 
				if (isset($mensagemCadastro)): 
					echo $mensagemCadastro;
				endif
			?>
					<div class="formulario-login1">
					<!-- formulário -->
						<div class="centralizado">
							<h3><?=$titulo?></h3>
						</div>
						<form id="formCadastro" name="formCadastro" method="POST">
							<input type="hidden" name="codigo" value="<?=$cliente->getIdCliente()?>" >
							<div class="form-group">
								<label for="nomec">Nome do Cliente</label>
								<input type="text" name="nomec" id="nomec" class="form-control" placeholder="Digite o nome do cliente" required value="<?=$cliente->getNome()?>"/>
							</div>
							<div class="form-group">
								<label for="endereco">Endereço</label>
								<input type="text" name="enderecoc" id="enderecoc" class="form-control" placeholder="Digite o endereço do cliente" required value="<?=$cliente->getEndereco()?>"/>
							</div>
							<div class="form-group">
								<label for="celular">Celular</label>
								<input type="text" name="celularc" id="celular" class="form-control" placeholder="Digite o número de celular do cliente"required value="<?=$cliente->getCelular()?>" />
							</div>
							<div class="form-group">
								<label for="estoque">Telefone</label>
								<input type="text" name="telefonec" id="telefonec" class="form-control" placeholder="Digite o número de telefone fixo do cliente"required  value="<?=$cliente->getTelefone()?>" />
							</div>
							<input type="submit" name="btn-cadastrar" class="btn btn-block btn-primary"  id="btn-enviar" value="Confirmar">
						</form>
					</div>
	</body>
</html>

