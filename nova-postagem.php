<?PHP
	
	session_start();
ini_set('display_errors', 1);
	$email = $_SESSION['email'];
	$nome = $_SESSION['nome'];
	$sobrenome = $_SESSION['sobrenome'];
	$id_usuario = $_SESSION['id_usuario'];

	//Caso o usuário não esteja autenticado, limpa os dados e redireciona
	if ( !isset($_SESSION['email']) and !isset($_SESSION['senha']) ) {
	//Destrói
	session_destroy();

	//Limpa
	unset ($_SESSION['email']);
	unset ($_SESSION['senha']);
	
	//Redireciona para a página de autenticação
	header('location:login.php');
}

	require("conexao.php");

	$sql2 = mysqli_query($conexao,"SELECT*FROM comercio WHERE id_usuario='$id_usuario'");
	$dados3 = (mysqli_fetch_array($sql2));
	$id_comercio  = $dados3['id_comercio'];

	$db = mysqli_connect("localhost", "root", "usbw", "localize");
$result = mysqli_query($db, "SELECT*FROM usuario
WHERE id_usuario ='$id_usuario'");
// PEGA OS DADOS DA TABELA POST
$result2 = mysqli_query($db, "SELECT*FROM post
WHERE id_comercio='$id_comercio'");
?>

<!DOCTYPE html>
<html>
	<title>Localize</title>
	<head>      
		
		<link href="css/nova-postagem.css" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
		
		
		

	</head>
	
	<body>
		
		<div class="top">
		
			<img src="img/logo.png" class="logo"><a href="index3.php"><i class="fas fa-home"></a></i>
		
		</div>
		
		<div class="lateral">
		
			<?php
    while ($row = mysqli_fetch_array($result)) {
		// Verificar se é nulo, se for exibir imagem padrão
	
      	echo "<img src='images/".$row['image']."' class='ftu' >";
    }
	
  ?>
			<p class="nomeu">Ola, <b><?PHP echo($nome); ?></b></p>
			<p class="linku"><a href="alterar-usuario2.php" style="text-decoration: none;color: white"><i class="fas fa-edit"></a></i>&nbsp;<a href="logout.php" style="text-decoration: none;color: white"> <i class="fas fa-power-off"></a></i></p><br>
			
			<a href="metricas.php"><p class="nav">&nbsp;<i class="fas fa-chart-pie"></i> &nbsp;  Metricas</p></a>
			<p class="nav">&nbsp;<i class="fas fa-file-invoice"></i> &nbsp; Informacoes do comercio</p>
			<a href="infos.php" class="sub"><i class="fas fa-caret-right"></i> &nbsp; Informacoes Gerais</a><br>
			<a href="imagens.php" class="sub"><i class="fas fa-caret-right"></i> &nbsp; Imagens</a>
			<p class="nav">&nbsp;<i class="fas fa-clipboard"></i> &nbsp; Postagens</p>
			<a href="nova-postagem.php" class="sub"><i class="fas fa-caret-right"></i> &nbsp; Nova Postagem</a><br>
			<a href="postagens.php" class="sub"><i class="fas fa-caret-right"></i> &nbsp; Minhas Postagens</a>
			<p></p>
			<a href="comentarios.php"><p class="nav">&nbsp;<i class="fas fa-comment"></i> &nbsp; Comentarios</p></a>
		
		</div>
	
    	<div class="postagem">
    
		<h2> Nova Postagem </h2><br>
	<form method="POST" action="uploadpost.php" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
	 <labeL>Titulo: </labeL><input type="text" name="titulo"><br><br>
  	 
	 <labeL></labeL><textarea name="texto" type="text" id="texto" placeholder="Texto"></textarea><br><br>
     
    <div>
		
		<label class="imgperfil">
   			Selecione uma imagem <i class="fas fa-upload"></i>
   		 <input type="file" name="image" style="display:none">
			<input type="hidden" name="size" value="1000000">
		</label>
  	</div>
    
  	</div>
  	<input type="hidden" name="id_comercio" value="<?PHP echo($id_comercio); ?>" />
	<input type="hidden" name="id_usuario" value="<?PHP echo($id_usuario); ?>" />
  	<div>
  		<button type="submit" name="upload" id="submit"> Postar </button>
  		</div>
  		</form>
		</div>
		
        
	</body>
	
</html>