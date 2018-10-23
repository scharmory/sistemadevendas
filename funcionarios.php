<!DOCTYPE html>
		<?php

			include_once("controller/LoginController.class.php");
		    LoginController::verificaLogado();

		    include_once("controller/FuncionarioController.class.php");
		    include_once("model/Funcionario.class.php");		    
			$controle = new FuncionarioController();


			if (isset($_GET['id'])){
				$id=$_GET['id'];
				$controle -> excluir($id);
			}
		    
		?>
<html>
	<head>
		<title>Controle de Vendas - Funcionários </title>
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
		 	<a class=" btn btn-default pull-left btn-cadastro" href="cadFuncionario.php"> Cadastrar Funcionário </a>
	 		<a class=" btn btn-default float-right btn-cadastro" href="sair.php" > Sair </a>
	 		<div class="row">
				<?php
					$listaDeFuncionario = $controle->listarFuncionarios();
					foreach ($listaDeFuncionario as $funcionario) :
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
		                    <th>Salario</th>                              
		                    <th></th>
		                </tr>
		            </thead>
		            <tbody>
		                <?php
		                	$listaDeFuncionario = $controle->listarFuncionarios();
							foreach ($listaDeFuncionario as $funcionario) :
						?>
								<tr class='gradeA'>
									<td><?=$funcionario->getNome()?></td>
									<td><?=$funcionario->getEndereco()?></td>
									<td><?=$funcionario->getTelefone()?></td>
									<td><?=$funcionario->getSalario()?></td>
									<td>
										<a class="btn-cadastro" href="funcionarios.php?op=excluir&id=<?=$funcionario-> getIdFuncionario()?>" > excluir funcionário </a>
										<a class="btn-cadastro" href="dadosfuncionario.php?id=<?=$funcionario->getIdFuncionario()?>"> ver funcionario </a>
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


