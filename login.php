<?php
	if (isset($_POST['btn-enviar'])){
		include_once("controller/LoginController.class.php");
		$controle  = new LoginController();
		
		$mensagem = $controle->logar($_POST);
	}
	if (isset($_POST['btn-cadastrar'])){
		include_once("controller/LoginController.class.php");
		$controle  = new LoginController();
		
		$mensagem = $controle->cadastrar($_POST);
	}
	
	
?>

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
			<button class=" btn btn-default pull-right btn-cadastro" type="button"  data-toggle="modal" data-target="#modalCadastro"> Cadastre-se </button>
			<div class="formulario-login">
				<form method="post">
					<div class="form-group">
						<label for="login">Login</label>
						<input type="text" name="login" id="login" class="form-control" placeholder="Digite o seu login"/>
					</div>
					<div class="form-group">
						<label for="senha">Senha</label>
						<input type="password" name="senha" id="senha" class="form-control" placeholder="Digite a sua senha"/>
					</div>
					
					<input type="submit" name="btn-enviar" class="btn btn-block btn-primary"  id="btn-enviar" value="Logar">
				</form>
				<?php
					if(isset($mensagem)){
				?>
					<div id="posiciona">
							 
						<img class="img-centralizado" src="imagens/atencao.png">
						<div class="text-center text-danger">
						 <?=$mensagem?>
						</div>
					</div>
				<?php
				
				}

				?>
			</div>
		</div>
		<!--Janela A ser aberta-->
		<!-- Modal -->
		<div id="modalCadastro" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal conteudo-->
				<div class="modal-content">
					<!-- Modal cabeçalho-->
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Cadastre-se</h4>
					</div>
					<!-- Modal corpo-->
					<div class="modal-body">
					<!-- formulário -->
						<form id="formCadastro" name="formCadastro" method="POST" onsubmit="return validarSenha();">
							<div class="form-group">
								<label for="clogin">Nome</label>
								<input type="text" name="cnome" id="nome" class="form-control" placeholder="Digite o seu nome" required/>
							</div>
							<div class="form-group">
								<label for="sobrenome">Sobrenome</label>
								<input type="text" name="csobrenome" id="sobrenome" class="form-control" placeholder="Digite o seu sobrenome" required/>
							</div>
							<div class="form-group">
								<label for="email">E-mail</label>
								<input type="text" name="cemail" id="email" class="form-control" placeholder="Digite o seu e-mail"required/>
							</div>
							<div class="form-group">
								<label for="csenha">Senha</label>
								<input type="password" name="csenha" id="csenha" class="form-control" placeholder="Digite a sua senha" required/>
							</div>
							<div class="form-group">
								<label for="csenha">Confirmar senha</label>
								<input type="password" name="confirmarsenha" id="confirmarsenha" class="form-control" placeholder="Confirme sua senha" required/>
							</div>
							
							<input type="submit" name="btn-cadastrar" class="btn btn-block btn-primary"  id="btn-enviar" value="Cadastrar">
						</form>
					</div>
					<!-- Modal rodape-->
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script src="bootstrap/js/bootstrap.min.js" ></script>
		<script>
			function validarSenha(){
			   NovaSenha = document.getElementById('csenha').value;
			   ConfirmarNovaSenha = document.getElementById('confirmarsenha').value;
			   if (NovaSenha != ConfirmarNovaSenha) {
					alert("SENHAS DIFERENTES!\nFAVOR DIGITAR SENHAS IGUAIS"); 
					return false;
				}
				return true;
			}
        </script>
	</body>
</html>