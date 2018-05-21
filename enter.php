<?php
			$certo=$_POST["login"];
			$correta=$_POST["senha"];
			if (($certo=="Ivete Modas")&& ($correta=="1234")){
			header('Location: index.html');   
				
			} else {
			header('Location: login.php?erro=true');
				echo"Tente novamente";		
			}
			
		
?>