<?php
	
	require("conexao.php");
	include("banco-comercio.php");
	
	$id_comentario = $_GET['id_comentario'];
	echo $id_comentario;
	
	if(excluirComentario($id_comentario)){
	?>
    
    <script type="text/javascript">
		alert("Comentario excluido!")
		window.location="reportados.php";
    </script>
	 
	 <?php
	}
	else{
	 ?>
	<script type="text/javascript">
		alert("Erro ao excluir")
    </script>
	<?php
	}
	
?>
