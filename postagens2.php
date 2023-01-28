<?PHP
	
	session_start();

	$email = $_SESSION['email'];
	$nome = $_SESSION['nome'];
	$sobrenome = $_SESSION['sobrenome'];
	$id_usuario = $_SESSION['id_usuario'];
$conexao= mysqli_connect('localhost','root','usbw','localize');
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
		
		<link href="css/postagens.css" rel="stylesheet">
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
			<a href="imagens.html" class="sub"><i class="fas fa-caret-right"></i> &nbsp; Imagens</a>
			<p class="nav">&nbsp;<i class="fas fa-clipboard"></i> &nbsp; Postagens</p>
			<a href="infos.php" class="sub"><i class="fas fa-caret-right"></i> &nbsp; Nova Postagem</a><br>
			<a href="imagens.html" class="sub"><i class="fas fa-caret-right"></i> &nbsp; Minhas Postagens</a>
			<p></p>
			<a href="comentarios.php"><p class="nav">&nbsp;<i class="fas fa-comment"></i> &nbsp; Comentarios</p></a>
		
		</div>
		
		
		<div class="postagens">
		<h2>Minhas Postagens</h2>
		
			<div class="postagem">
            	<div class="info">
                <h2>Nome do comercio</h2>
                <p>12/02</p>

                
                </div>
                <div class="texto">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard 			dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
                </div>
                				<?php
        		 while ($row = mysqli_fetch_array($result)) {
		// Verificar se é nulo, se for exibir imagem padrão
		echo "<img src='images/".$row['image']."' >";
      	
    }
	
  ?>
     
        	</div>
		
		</div>
		
        <div id="myModal" class="modal">
  			<span class="close">&times;</span>
  			<img class="modal-content" id="img01">
  			<div id="caption"></div>
		</div>
        
        
        <script>
		// Get the modal
		var modal = document.getElementById('myModal');
		
		// Get the image and insert it inside the modal - use its "alt" text as a caption
		var img = document.getElementById('myImg');
		var modalImg = document.getElementById("img01");
		var captionText = document.getElementById("caption");
		img.onclick = function(){
			modal.style.display = "block";
			modalImg.src = this.src;
			captionText.innerHTML = this.alt;
		}
		
		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];
		
		// When the user clicks on <span> (x), close the modal
		span.onclick = function() { 
			modal.style.display = "none";
		}
		</script>
        
        
	</body>
	
</html>