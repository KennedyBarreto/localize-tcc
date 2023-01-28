<?php 

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
include("banco-comercio.php");

$nomecomercio=$_POST ['nomecomercio'];
$categoria=$_POST ['categoria'];
$rua=$_POST ['rua'];
$numero=$_POST ['numero'];
$bairro=$_POST ['bairro'];
$telefone=$_POST ['telefone'];
$dias1=$_POST ['dias1'];
$dias2=$_POST ['dias2'];
$abertura=$_POST ['abertura'];
$fechamento=$_POST ['fechamento'];

$resultado = mysqli_query($conexao,"SELECT*FROM comercio
WHERE id_usuario ='$id_usuario'") or die ("Erro na seleção da tabela.");

$dados=mysqli_fetch_array($resultado);
$cnpj = $dados['cnpj'];
$lat = $dados['lat'];
$lng = $dados['lng'];
$id_usuario = $dados['id_usuario'];
$id_comercio = $dados['id_comercio'];

if (altComercio($id_comercio,$nomecomercio,$cnpj,$categoria,$rua,$numero,$bairro,$lat,$lng,$telefone,$dias1,$dias2,$abertura,$fechamento,$id_usuario)){
	?>
    
    <script type="text/javascript">
		alert("Alteracao realizado com sucesso!")
		window.location="infos.php";
    </script>
	 
	 <?php
	   
}
else{
	?>
	<script type="text/javascript">
		alert("Erro ao alterar")
		window.location="alterar-comercio.php";
    </script>
	<?php
}
?>