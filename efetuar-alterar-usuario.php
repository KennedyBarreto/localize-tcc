<?PHP
require ("conexao.php");
include("banco-usuario.php");

$id_usuario=$_POST['id_usuario'];
$nome=$_POST ['nome'];
$sobrenome=$_POST ['sobrenome'];
$email=$_POST ['email'];
$senha=$_POST ['senha'];
$image=$_FILES ['image']['name'];
$target = "images/".basename($image);
if (altUsuario($id_usuario,$nome,$sobrenome,$email,$senha,$image) && move_uploaded_file($_FILES['image']['tmp_name'], $target)){
	?>
    
    <script type="text/javascript">
		alert("Alteracao realizada com sucesso!")
		window.location="./login.php";
    </script>
	
    <?php
}
else{
	echo("Erro");
}
?>