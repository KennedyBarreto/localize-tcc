<?PHP
require ("conexao.php");
include("banco-comercio.php");
ini_set('display_errors', 1);
$id_comercio=$_POST['id_comercio'];
$id_usuario=$_POST['id_usuario'];
$titulo=$_POST ['titulo'];
$texto=$_POST ['texto'];
$image=$_FILES ['image']['name'];
$target = "images/".basename($image);

if (Post($id_comercio,$id_usuario,$titulo,$texto,$image) && move_uploaded_file($_FILES['image']['tmp_name'], $target)){
	?>
    
    <script type="text/javascript">
		alert("Postagem realizada com sucesso!")
		window.location="./postagens.php";
    </script>
	
    <?php
}
else{
	echo("Erro");
}
?>