<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
</head>
<body>
	<!--INICIO consultar_usuario.php-->
<?php
	include_once("controller/ClienteController.class.php");
    include_once("model/Cliente.class.php");		    
	$controle = new ClienteController();
 	$list = $controle->listarClientes();
?>
<div id="tabs">
    <ul><li><a href="#tabs-1">Lista de Usuarios</a></li></ul>
    <div id="tabs-1">
        <table class="display" id="consultar_usuarios">
            <thead>
                <tr>                    
                    <th>Nome</th>           
                    <th>E-mail</th>         
                    <th>Perfil</th>          
                    <th>Ativo</th>                              
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($list as $l) {
                    $cod = $l->getIdCliente();
                    $nome = $l->getNome();
                    
 
                    $linkDelete = "index.php?pg=usuario/deletarUsuario&cod_usuario=$cod";
                    $linkEdit = "index.php?pg=usuario/cad_usuario&cod_usuario=$cod&acao=editar";
 
                    echo "<tr class='gradeA'>";
                    echo "<td><center>$nome</center></td>";
                    echo "<td><center>$nome</center></td>";
                    echo "<td><center>$nome</center></td>";
                    echo "<td><center>$nome</center></td>";

                    
                    echo "<td><center>
                        <img style='cursor:pointer;' src='../../css/imagens/editar.png' 
alt='Editar' width='24' height='24' onclick='location.href=\"$linkEdit\"' />
                            <img style='cursor:pointer;' src='../../css/imagens/remover.png'
 alt='Remover' width='24' height='24' onclick='dialogoConfirm(\"Deletar\",\"Deseja Deletar ?\",\"$linkDelete\");' />
                            </td>";
                    echo "</tr>";
                }
                ?>  
            </tbody>
        </table>
    </div><!-- div tabs-1 -->
</div><!-- div tabs -->
<!--FIM consultar_usuario.php-->
	
 	<script type="text/javascript" src="DataTables/jQuery-3.3.1/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="DataTables/datatables.min.js"></script>
	<script type="text/javascript" src="main.js"></script>
</body>
</html>