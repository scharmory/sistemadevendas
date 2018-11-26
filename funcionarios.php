<!DOCTYPE html>
		<?php

			include_once("controller/LoginController.class.php");
		    LoginController::verificaLogado();

		    include_once("controller/FuncionarioController.class.php");
		    include_once("model/Funcionario.class.php");		    
			$controle = new FuncionarioController();
			$mostra = "none";

			if (isset($_GET['id'])){

				$id=$_GET['id'];
				$retorno = $controle -> excluir($id);
				echo $retorno;
			}
		    
		?>
<html>
	<head>
		<title>Controle de Vendas - Funcionários </title>
		<meta charset="utf-8">
		<link href="fontawesome-5.0.13/css/fontawesome-all.min.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" href="datatables/datatables.min.css" />
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	</head>
	<body>
		<div class="container">
			<?php
				if(isset($retorno)){
					$mostra = "block";
					if($retorno > 0){
						$mensagem =  "Funcionário Excluído com Sucesso!!!";
						$titulo = "Sucesso";
						$tipo = "success";
					}else{
						$mensagem = "Não foi possível excluir o funcionário";
						$titulo = "Atenção";
						$tipo = "warning";
					}
				}

			?>
			<div class="alert alert-<?=$tipo?> alert-dismissible fade show" role="alert" style="display:<?=$mostra?>">
			  <strong><?=$titulo?> !</strong> <?=$mensagem?>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button> 
			</div>
			<br>
			<img class="img-titulo" src="imagens/siver-roxo.png">
			<br>
			<a class=" btn btn-default float-left btn-cadastro" href="inicio.php" > Voltar </a>
		 	<a class=" btn btn-default pull-left btn-cadastro" href="info-funcionario.php"> Cadastrar Funcionário </a>
	 		<a class=" btn btn-default float-right btn-cadastro" href="sair.php" > Sair </a>
			<div class="row">
				<table class="table" id="tabela_registro">
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
										<a class="btn-excluir" href="funcionarios.php?op=excluir&id=<?=$funcionario-> getIdFuncionario()?>" >  <i class="far fa-trash-alt"></i> </a>
										<a class="btn-editar"  href="info-funcionario.php?id=<?=$funcionario->getIdFuncionario()?>" ><i class="fas fa-pencil-alt"></i> </a>
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


