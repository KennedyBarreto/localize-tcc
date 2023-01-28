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
	<title>Localize</title>
	<head>      
		
		<link href="css/alterar-comercio.css" rel="stylesheet">
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
			<form method="post" action="efetuar-alterar-comercio.php">
				
				<input id="botao" type="submit" value=" Salvar " />
				
    		<p>Nome do Comercio: <input type="text" name="nomecomercio" value="<?PHP echo($nomecomercio); ?>" /></p>
			<p>Categoria <select id="select1" name="categoria">
				<option value="pet">Animais & Veterinarios</option>
				<option value="support">Assistencia Tecnica</option>
                <option value="casa">Materiais de Construção</option>
                <option value="eletro">Eletronicos & Eletrodomesticos</option>
                <option value="livro">Livraria & Bibliotecas</option>
				<option value="mecanico">Assistencia Mecanica</option>
				<option value="mercado">Supermercado</option>
				<option value="restaurante">Restaurante & Bares</option>
				<option value="roupa">Modas & Vestuario</option>
				<option value="saude">Clinicas & Farmacias</option>
				<option value="outros">Outros</option>
            </select></p>
			<p>Rua: <input type="text" name="rua" value="<?PHP echo($rua); ?>" /></p>
			<p>Numero: <input type="text" name="numero" value="<?PHP echo($numero); ?>" /></p>
			<p>Bairro: <input type="text" name="bairro" value="<?PHP echo($bairro); ?>" /></p>
			<p>Telefone: <input type="text" name="telefone" value="<?PHP echo($telefone); ?>" /></p>
			<p>Dias Funcionamento: 
			<select name="dias1" class="select2">
				<option value="SEG">Segunda</option>
				<option value="TER">Terca</option>
                <option value="QUA">Quarta</option>
                <option value="QUI">Quinta</option>
                <option value="SEX">Sexta</option>
				<option value="SAB">Sabado</option>
				<option value="DOM">Domingo</option>
            </select>
			<label>a</label>
			<select name="dias2" class="select2">
				<option value=""></option>
				<option value="SEG">Segunda</option>
				<option value="TER">Terca</option>
                <option value="QUA">Quarta</option>
                <option value="QUI">Quinta</option>
                <option value="SEX">Sexta</option>
				<option value="SAB">Sabado</option>
				<option value="DOM">Domingo</option>
            </select></p>
			<p>Horario de abertura: <input type="text" name="abertura" value="<?PHP echo($abertura); ?>" /></p>
			<p>Horario de fechamento: <input type="text" name="fechamento" value="<?PHP echo($fechamento); ?>" /></p>
				
			</form>
  		</div>
		</div>
		
		
		
	</body>
	
</html>