<?PHP 

function cadComercio($nomecomercio,$cnpj,$categoria,$rua,$numero,$bairro,$lat,$lng,$telefone,$dias1,$dias2,$abertura,$fechamento,$id_usuario){
	$conexao= mysqli_connect('localhost','root','usbw','localize');
	$query= "INSERT INTO comercio(nomecomercio,cnpj,categoria,rua,numero,bairro,lat,lng,telefone,diasfun,abertura,fechamento,id_usuario,perfil,capa)VALUES('{$nomecomercio}','{$cnpj}',
	'{$categoria}','{$rua}','{$numero}','{$bairro}','{$lat}','{$lng}','{$telefone}','{$dias1}-{$dias2}','{$abertura}','{$fechamento}','{$id_usuario}','padrao.png','capa.jpg')";
	return mysqli_query($conexao,$query);
}

function altComercio($id_comercio,$nomecomercio,$cnpj,$categoria,$rua,$numero,$bairro,$lat,$lng,$telefone,$dias1,$dias2,$abertura,$fechamento,$id_usuario){
	$conexao= mysqli_connect('localhost','root','usbw','localize');
	$query="update comercio set nomecomercio='$nomecomercio',cnpj='$cnpj',categoria='$categoria', rua='$rua', numero='$numero', bairro='$bairro',lat='$lat',lng='$lng',telefone='$telefone',diasfun='$dias1-$dias2',abertura='$abertura',fechamento='$fechamento',id_usuario='$id_usuario' where id_comercio='$id_comercio'";
	return mysqli_query($conexao,$query);
}


function cadComentario($nome_usuario,$nota,$menssagem,$id_comercio){
	$conexao= mysqli_connect('localhost','root','usbw','localize');
	$query= "INSERT INTO comentario(nome_usuario,nota,menssagem,id_comercio)VALUES('{$nome_usuario}','{$nota}','{$menssagem}','{$id_comercio}')";
	return mysqli_query($conexao,$query);
}

function cadContato($nome,$email,$assunto,$menssagem){
	$conexao= mysqli_connect('localhost','root','usbw','localize');
	$query= "INSERT INTO contato(nome,email,assunto,menssagem)VALUES('{$nome}','{$email}','{$assunto}','{$menssagem}')";
	return mysqli_query($conexao,$query);
}

function repComentario($nome_usuario,$nota,$menssagem){
	$conexao= mysqli_connect('localhost','root','usbw','localize');
	$query= "INSERT INTO comentario_reportado(nome_usuario,nota,menssagem)VALUES('{$nome_usuario}','{$nota}','{$menssagem}')";
	return mysqli_query($conexao,$query);
}

function listarContato(){
	$conexao= mysqli_connect('localhost','root','usbw','localize');
	$listarContato= array();
	$resultado= mysqli_query($conexao,"select*from contato");
	while ($a=mysqli_fetch_assoc($resultado)){array_push ($listarContato, $a);}
	return $listarContato;
}

function listarComentario(){
	$conexao= mysqli_connect('localhost','root','usbw','localize');
	$listarComentario= array();
	$resultado= mysqli_query($conexao,"select*from comentario_reportado");
	while ($a=mysqli_fetch_assoc($resultado)){array_push ($listarComentario, $a);}
	return $listarComentario;
}

function excluirComentario($id_comentario){
	$conexao= mysqli_connect('localhost','root','usbw','localize');
	$query2="delete from comentario where id_comentario = $id_comentario";
	return mysqli_query($conexao,$query2);
}

function Post($id_comercio,$id_usuario,$titulo,$texto, $image){
	$conexao= mysqli_connect('localhost','root','usbw','localize');
	$query= "INSERT INTO post(image,titulo,texto,id_comercio,id_usuario)VALUES('{$image}','{$titulo}','{$texto}','{$id_comercio}','{$id_usuario}')";
	return mysqli_query($conexao,$query);
}

?>


