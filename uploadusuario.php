<?php
  // Create database connection
  $conexao= mysqli_connect('localhost','root','usbw','localize');

  // Initialize message variable
  $msg = "";


  // If upload button is clicked ...
  if (isset($_POST['alterar'])) {
	  $id_usuario = $_POST['id_usuario'];
  	// Get image name
  	$image = $_FILES['image']['name'];
  

  	
  	// image file directory
  	$target = "images/".basename($image);
	
$consulta = mysqli_query($conexao,"SELECT * FROM usuarioi WHERE id_usuario='$id_usuario'");
$linha = mysqli_num_rows($consulta);
 
 
if($linha == 0 && (empty($_POST['upload']))){

$sql = "INSERT INTO usuarioi (image, id_usuario) VALUES ('$image', '$id_usuario')";
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

$sql = "update usuarioi set image ='$image' where id_usuario = '$id_usuario'";
mysqli_query($conexao,$sql);


}
  }
  ?>