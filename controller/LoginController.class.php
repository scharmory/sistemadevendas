<?php
	include_once("model/Usuario.class.php");
	include_once("dao/DaoUsuario.class.php");
	class LoginController{
		public function logar($post){
			
			$dao = new DaoUsuario();
			$usuario = $dao->buscarUsuarioPorLogin($post['login']);
            if (is_null ($usuario->getIdUsuario())) {
            	return "Usuário não encontrado!";

            } else{
            	if ($usuario->getSenha()== $post['senha']){
            		session_start();
            		$_SESSION['usuario'] = $usuario->getNome();
            		$_SESSION['logado'] = true;
            		header("location:inicio.php");

            	} else{
            		return "Senha Incorreta!";
            	}
            }

		}
		public function verificaLogado(){
			session_start();
		    if($_SESSION['logado']!= true){
		    	unset($_SESSION);
		       	header("location: login.php");

		    }

		}
		public function cadastrar($dadosDoFormulario){
			$dao = new DaoUsuario();
			$dao->salvarUsuarioNoBanco($dadosDoFormulario);
		}
	}

?>