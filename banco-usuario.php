<?PHP 

function cadUsuario($nome,$sobrenome,$email,$senha){
	$conexao= mysqli_connect('localhost','root','usbw','localize');
	$query= "INSERT INTO usuario(nome,sobrenome,email,senha,image)
	VALUES ('{$nome}','{$sobrenome}','{$email}','{$senha}','padrao.png')";
	return mysqli_query($conexao,$query);
}

function 
altUsuario($id_usuario,$nome,$sobrenome,$email,$senha,$image){
	$conexao= mysqli_connect('localhost','root','usbw','localize');
	$query="update usuario set nome='$nome',sobrenome='$sobrenome',email='$email', senha='$senha', image='$image' where id_usuario='$id_usuario'";
	return mysqli_query($conexao,$query);
}


?>