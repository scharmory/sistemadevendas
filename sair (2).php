<?php
	session_start();
	session_destroy();
    unset($_SESSION['usuario']);
    unset($_SESSION['logado']);
    
    header("location: login.php");
    exit;
?>