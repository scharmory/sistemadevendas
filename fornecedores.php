<!DOCTYPE html>
		<?php
		    include_once("controller/LoginController.class.php");
		    LoginController::verificaLogado();

		    include_once("controller/FornecedorController.class.php");
		    include_once("model/Fornecedor.class.php");		    
			$controle = new FornecedorController();
			$mostra = "none";

			if (isset($_GET['id'])){

				$id=$_GET['id'];
				$retorno = $controle -> excluir($id);
				echo $retorno;
			}
		?>
<html>
	<head>
		<title>Controle de Vendas - Fornecedores </title>
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
						$mensagem =  "Cliente Excluído!";
						$titulo = "Sucesso";
						$tipo = "success";
					}else{
						$mensagem = "Não foi possível excluir o cliente, verifique se já foi realizada uma venda para ele";
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
		 	<a class=" btn btn-default pull-left btn-cadastro" href="info-fornecedor.php"> Cadastrar Fornecedor </a>
	 		<a class=" btn btn-default float-right btn-cadastro" href="sair.php" > Sair </a>
	 		
			<div class="row">
				<table class="table" id="tabela_registro">
		            <thead>
		                <tr>                       
		                    <th>Nome</th>         
		                    <th>Endereço</th>          
		                    <th>Telefone</th> 
		                   	<th></th>                             
		                </tr>
		            </thead>
		            <tbody>
		                <?php
		                	$listaDeFornecedores = $controle->listarFornecedores();
							foreach ($listaDeFornecedores as $fornecedor) :
						?>
								<tr class='gradeA'>
									<td><?=$fornecedor->getNome()?></td>
									<td><?=$fornecedor->getEndereco()?></td>
									<td><?=$fornecedor->getTelefone()?></td>
									<td>
										<a class="btn-excluir" href="fornecedores.php?op=excluir&id=<?=$fornecedor-> getIdFornecedor()?>" >  <i class="far fa-trash-alt"></i> </a>
										<a class="btn-editar"  href="info-fornecedor.php?id=<?=$fornecedor->getIdFornecedor()?>"><i class="fas fa-pencil-alt"></i> </a>
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




