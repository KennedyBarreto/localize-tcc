<?PHP
session_start();
ini_set('display_errors', 1);
$id_usuario = $_SESSION['id_usuario'];
$email = $_SESSION['email'];
$nome = $_SESSION['nome'];
$sobrenome = $_SESSION['sobrenome'];

if ( !isset($_SESSION['email']) and !isset($_SESSION['senha']) ) {

	session_destroy();

	unset ($_SESSION['email']);
	unset ($_SESSION['senha']);
	
	header('location:login.php');
}
	
	
	require("conexao.php");
	

	
	$resultado = mysqli_query($conexao,"SELECT*FROM comercio
	WHERE id_usuario ='$id_usuario'") or die ("Erro na seleção da tabela.");

	$dados=mysqli_fetch_array($resultado);
	$id_comercio = $dados['id_comercio'];
	$nomecomercio = $dados['nomecomercio'];
	$rua = $dados['rua'];
	$numero = $dados['numero'];
	$bairro = $dados['bairro'];
	$telefone = $dados['telefone'];
	$diasfun = $dados['diasfun'];
	$abertura = $dados['abertura'];
	$fechamento = $dados['fechamento'];

	$busca = "Select * FROM comercio where id_comercio='$id_comercio'";
	$exe = mysqli_query($conexao,$busca);

	$resultado = (mysqli_fetch_array($exe));
	$numero = $resultado['views'];

	$visitantes = $numero + 1;
	$altera = "UPDATE COMERCIO SET views = '$visitantes' where id_comercio='$id_comercio'";
	$exe1 = mysqli_query($conexao,$altera);

	$resultado2 = mysqli_query($conexao,"SELECT sum(nota) FROM comentario where id_comercio='$id_comercio'");
	while($sum = mysqli_fetch_array($resultado2)){
		$soma = $sum['sum(nota)'];
	}

	$resulatdo3 = mysqli_query($conexao,"SELECT*FROM comentario where id_comercio='$id_comercio'");
	$num = mysqli_num_rows($resulatdo3);

	if ($num ==0){
		$media = 0;
	}
	
	else{
		$media = $soma/$num;
	}
$db = mysqli_connect("localhost", "root", "usbw", "localize");
$result = mysqli_query($db, "SELECT*FROM usuario
WHERE id_usuario ='$id_usuario'");
?>

  

<!DOCTYPE html>
<html>
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
      <link rel="stylesheet" href="css/imagens.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	
	<script src="https://maps.googleapis.com/maps/api/js?key=&v=3.0&sensor=true&language=ee&dummy=dummy.js"></script>
	
      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
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
     
	<div class="imagens">
	<h2> Perfil </h2>
	<form method="POST" action="upload.php" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image">
  	</div>
  	<input type="hidden" name="id_comercio" value="<?PHP echo($id_comercio); ?>" />
  	<div>
		<br>
  		<button type="submit" name="upload" id="submit">Salvar</button>
  	</div>
  </form>
	<br><br>
	<h2> Capa </h2>
	<form method="POST" action="uploadcapa.php" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image">
  	</div>
  	<input type="hidden" name="id_comercio" value="<?PHP echo($id_comercio); ?>" />
  	<div>
		<br>
  		<button type="submit" name="upload" id="submit">Salvar</button>
  	</div>
  </form>
	<br><br>
	
	<h2> Imagens do Estabelecimento </h2>
	<form method="POST" action="uploadcomercio.php" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image">
  	</div>
  	<input type="hidden" name="id_comercio" value="<?PHP echo($id_comercio); ?>" />
  	<div>
		<br>
  		<button type="submit" name="upload" id="submit">Salvar</button>
  	</div>
  </form>
	<br><br>
		
		</div>
		
</body>
</html>