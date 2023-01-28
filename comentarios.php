<?PHP
	
	session_start();

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
	
?>

<!DOCTYPE html>
<html>
	<title>Localize</title>
	<head>      
		
		<link href="css/comentarios.css" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
		
		
		

	</head>
	
	<body>
		
		<div class="top">
		
			<img src="img/logo.png" class="logo"><i class="fas fa-home"></i>
		
		</div>
		
		<div class="lateral">
		
			<?php
    while ($row = mysqli_fetch_array($result)) {
		// Verificar se é nulo, se for exibir imagem padrão
	
      	echo "<img src='images/".$row['image']."' class='ftu' >";
    }
	
  ?>
			<p class="nomeu">Ola, <b><?PHP echo($nome); ?></b></p>
			<p class="linku"><i class="fas fa-edit"></i>&nbsp; <i class="fas fa-power-off"></i></p><br>
			
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
		
		
		<div class="comentarios">
		<h2>Comentarios</h2>
		
		
		<?PHP
		
		$resultado=mysqli_query($conexao,"SELECT * FROM comentario where id_comercio='$id_comercio'");
		while($exibir = mysqli_fetch_array($resultado)){
		
		echo "<div class='menssagem'>";
		$a = $exibir['nome_usuario'];
		$b = $exibir['nota'];
		$c = $exibir['menssagem'];
			
		echo "<p class='nota'>Nota: <b>$b <i class='fas fa-star'></i> </b></p>";	
		echo "<h3> $a </h3>";
		echo "<h4> $c </h4>";
		echo "<form method='post' action='reportar-comentario.php'>";
		echo "<input type='hidden' value='$a' name='nome_usuario'>";
		echo "<input type='hidden' value='$b' name='nota'>";
		echo "<input type='hidden' value='$c' name='menssagem'>";
		echo "<input  type='submit' value='Reportar' id='butao' />";
		echo "</form>";
		echo "</div>";
		}
		
		?>
	</div>
		
		
	</body>
	
</html>