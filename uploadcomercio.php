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
	
$consulta = mysqli_query($conexao,"SELECT * FROM comercioi WHERE id_comercio='$id_comercio'");
$linha = mysqli_num_rows($consulta);
 
 
if($linha == 0 && (empty($_POST['upload']))){

$sql = "INSERT INTO comercioi (image, id_comercio, id_usuario) VALUES ('$image', '$id_comercio', '$id_usuario')";
  	// execute query
  	mysqli_query($conexao,$sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
		
  	}else{
  		$msg = "Failed to upload image";
  	}

}
else
{
	$nome = mysqli_query($conexao,"SELECT image FROM comercioi WHERE id_comercio='$id_comercio'");
if($image==$nome){
$sql = "update comercioi set image ='$image' where id_comercio = '$id_comercio'";
mysqli_query($conexao,$sql);
}
else
{
	$sql = "INSERT INTO comercioi (image, id_comercio, id_usuario) VALUES ('$image', '$id_comercio', '$id_usuario')";
  	// execute query
  	mysqli_query($conexao,$sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
		
  	}else
  		$msg = "Failed to upload image";
  	}
}	

}
  ?>

<script type="text/javascript">
		alert("Imagem adicionada com sucesso!")
		window.location="./imagens.php";
	
    </script>

<?php

  ?>