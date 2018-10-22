<!DOCTYPE html>
		<?php
		    include_once("controller/LoginController.class.php");
		    LoginController::verificaLogado();

		    include_once("controller/ClienteController.class.php");
		    include_once("model/Cliente.class.php");		    
			$controle = new ClienteController();


			if (isset($_GET['id'])){
				$id=$_GET['id'];
				$controle -> excluir($id);
			}
		?>
<html>
	<head>
		<title>Controle de Vendas - Clientes </title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" href="datatables/datatables.min.css" />
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	</head>
	<body>
		<div class="container">
			<br>
			<img class="img-titulo" src="imagens/siver-roxo.png">
			<br>
			<a class=" btn btn-default float-left btn-cadastro" href="inicio.php" > Voltar </a>
		 	<a class=" btn btn-default pull-left btn-cadastro" href="cadcliente.php"> Cadastrar Clientes </a>
	 		<a class=" btn btn-default float-right btn-cadastro" href="sair.php" > Sair </a>
	 		<div class="row">
				<?php
					$listaDeClientes = $controle->listarClientes();
					foreach ($listaDeClientes as $cliente) :
				?>
						<div class="caixa-produto col-md-3">
						 	<h1><?=$cliente->getNome()?></h1>
						 	<h1>Cod.<?=$cliente->getIdCliente()?></h1>
							<h1><?=$cliente->getEndereco()?></h1>
							<h1><?=$cliente->getCelular()?></h1>
							<h1><?=$cliente->getTelefone()?></h1>
							<a class="btn btn-default btn-cadastro" href="clientes.php?op=excluir&id=<?=$cliente-> getIdCliente()?>" > excluir cliente </a>
							<a class="btn btn-default btn-cadastro" href="dadoscliente.php?id=<?=$cliente->getIdCliente()?>"> ver cliente </a>
						</div>
				<?php
					endforeach;
				?>
			</div>
			<div class="row">
				<table class="display" id="tabela_registro">
		            <thead>
		                <tr>                       
		                    <th>Nome</th>         
		                    <th>Endereço</th>          
		                    <th>Celular</th>
		                    <th>Telefone</th>                              
		                    <th></th>
		                </tr>
		            </thead>
		            <tbody>
		                <?php
		                	$listaDeClientes = $controle->listarClientes();
							foreach ($listaDeClientes as $cliente) :
						?>
								<tr class='gradeA'>
									<td><?=$cliente->getNome()?></td>
									<td><?=$cliente->getEndereco()?></td>
									<td><?=$cliente->getCelular()?></td>
									<td><?=$cliente->getTelefone()?></td>
									<td>
										<a class="btn-cadastro" href="clientes.php?op=excluir&id=<?=$cliente-> getIdCliente()?>" > excluir cliente </a>
										<a class="btn-cadastro" href="dadoscliente.php?id=<?=$cliente->getIdCliente()?>"> ver cliente </a>
									</td>
								</tr>
						<?php
							endforeach;
						?>
					</tbody>
				</table>
			</div>
		</div>

		<script type="text/javascript" src="js/jquery.js"></script>
		<script src="bootstrap/js/bootstrap.min.js" ></script>
		<script type="text/javascript" src="datatables/datatables.min.js"></script>
		<script type="text/javascript" src="main.js"></script>
	</body>
</html>


