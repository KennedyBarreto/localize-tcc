﻿<?PHP
require ("conexao.php");
include("banco-comercio.php");

$nome_usuario=$_POST ['nome_usuario'];
$nota=$_POST ['nota'];
$menssagem=$_POST ['menssagem'];
$id_comercio=$_POST ['id_comercio'];

if (cadComentario($nome_usuario,$nota,$menssagem,$id_comercio)){
	?>
    
    <script type="text/javascript">
		alert("Comentario enviado com sucesso!")
		window.location="./index3.php";
    </script>
	
    <?php
}
else{
	echo("deu ruim");
}
?>