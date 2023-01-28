<?PHP
require ("conexao.php");
include("banco-comercio.php");

$nome_usuario=$_POST ['nome_usuario'];
$nota=$_POST ['nota'];
$menssagem=$_POST ['menssagem'];

if (repComentario($nome_usuario,$nota,$menssagem)){
	?>
    
    <script type="text/javascript">
		alert("Comentario reportado")
		window.location="./comentarios.php";
    </script>
	
    <?php
}
else{
	echo("deu ruim");
}
?>