<?php
session_start();
ini_set('display_errors', 1);
$id_usuario = $_SESSION['id_usuario'];
  // Create database connection
  $conexao= mysqli_connect('localhost','root','usbw','localize');

  // Initialize message variable
  $msg = "";


  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
	  $id_comercio = $_POST['id_comercio'];
  	// Get image name
  	$image = $_FILES['image']['name'];
  

  	
  	// image file directory
  	$target = "images/".basename($image);
	
$consulta = mysqli_query($conexao,"SELECT perfil FROM comercio WHERE id_comercio='$id_comercio'");
$linha = mysqli_num_rows($consulta);
 
if($linha == 0 && (empty($_POST['upload']))){
echo "Nenhuma imagem selecionada";

}
else
{
	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
$sql = "update comercio set perfil ='$image' where id_comercio = '$id_comercio'";
mysqli_query($conexao,$sql);
	}
?>

<script type="text/javascript">
		alert("Imagem Alterada com sucesso!")
		window.location="./imagens.php";
    </script>

<?php
}
  }
  ?>