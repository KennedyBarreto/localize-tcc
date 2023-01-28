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
	header('location:login.html');
}

require("conexao.php");

$resultado = mysqli_query($conexao,"SELECT*FROM comercio
WHERE id_usuario ='$id_usuario'") or die ("Erro na seleção da tabela.");

$dados=mysqli_fetch_array($resultado);
	$nomecomercio = $dados['nomecomercio'];
	$cnpj = $dados['cnpj'];
	$categoria = $dados['categoria'];
	$rua = $dados['rua'];
	$numero = $dados['numero'];
	$bairro = $dados['bairro'];
	$lat = $dados['lat'];
	$lng = $dados['lng'];
	$telefone = $dados['telefone'];
	$diasfun = $dados['diasfun'];
	$abertura = $dados['abertura'];
	$fechamento = $dados['fechamento'];
$db = mysqli_connect("localhost", "root", "usbw", "localize");
$result = mysqli_query($db, "SELECT*FROM usuario
WHERE id_usuario ='$id_usuario'");
?>
<!DOCTYPE html>
<html>
	<title>Meu Comercio</title>
	<head>      
		
		<link href="css/infos.css" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
		
		
		

	</head>
	
	<body>
		
		<div class="top">
		
			<img src="img/logo.png" class="logo"><a href="index3.php"><i class="fas fa-home"></i></a>
		
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
		
		<div class="clearfix">
  		<div class="info">
			<a href="alterar-comercio.php">Editar <i class="fas fa-edit"></i></a>
    		<p>Nome do Comercio: <b><?PHP echo($nomecomercio); ?></b></p>
			<p>Endereco: <b><?PHP echo($rua); ?>, <?PHP echo($numero); ?></b></p>
			<p>Bairro: <b><?PHP echo($bairro); ?></b></p>
			<p>Funcionamento: <b><?PHP echo($diasfun); ?>, das <?PHP echo($abertura); ?> as <?PHP echo($fechamento); ?></b></p>
			<p>CNPJ: <b><?PHP echo($cnpj); ?></b></p>
			<p>Telefone: <b><?PHP echo($telefone); ?></b></p>
			<p>Telefone 2: <b><?PHP echo($telefone); ?></b></p>
			<p>Email: <b> racaodoze@gmail.com</b></p>
			<p>Proprietario: <b><?PHP echo($nome); ?> <?PHP echo($sobrenome); ?></b></p>
  		</div>
		</div>
		
		
		
	</body>
	
</html>