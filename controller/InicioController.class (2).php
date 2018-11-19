<?php
	include_once("model/Usuario.class.php");
	include_once("dao/DaoUsuario.class.php");
	class InicioController{
		public function logar($post){
			
			$dao = new DaoUsuario();
			$usuario = $dao->buscarUsuarioPorLogin($post['login']);
            ($usuario->getSenha()== $post['senha']){
            		header("location:inicio.php");

            	} else{
            		return "Acesso negado, efetue o login!";
            	}
            }

		}
	}
?>