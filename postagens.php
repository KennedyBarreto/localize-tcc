<?php
session_start();

	$id_usuario = $_SESSION['id_usuario'];
	$nome = $_SESSION['nome'];
	$sobrenome = $_SESSION['sobrenome'];

  // Create database connection
    $db = mysqli_connect("localhost", "root", "usbw", "localize");
  $result = mysqli_query($db, "SELECT * FROM comercio
WHERE id_usuario ='$id_usuario'");
$row= mysqli_fetch_array($result);
	$id_comercio  = $row['id_comercio'];

$result = mysqli_query($db, "SELECT*FROM usuario
WHERE id_usuario ='$id_usuario'");

$resultt = mysqli_query($db, "SELECT * FROM post
WHERE id_comercio ='$id_comercio'");
?>

<!DOCTYPE html>
<html>
	<title>Localize</title>
	<head>      
		
		<link href="css/postagens.css" rel="stylesheet">
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
		
		<div class="postagens">
			
			<h2>Minhas Postagens</h2>
			
			<?php
    		while ($row = mysqli_fetch_array($resultt)) {
			echo "<div class='comimg'>";
			echo "<img src='images/".$row['image']."' class='imgpost'>";
    		echo "<div class='texto'>";
      		echo "<h4>".$row['titulo']. "</h4>";
   			echo "<p>".$row['texto']. "</p>";
    		echo "</div>";
			echo "</div>";
			echo "<br>";
    		}
  			?>
			
		
		</div>
		
</body>
</html>