<?PHP
	
require("conexao.php");

$email = $_POST['email'];
$senha = $_POST['senha'];

$resultado = mysqli_query($conexao,"SELECT*FROM usuario
WHERE email = '$email' 
AND senha = '$senha'") or die ("Erro na seleção da tabela.");

if (mysqli_num_rows ($resultado) > 0) {
	
	session_start();
	$dados=mysqli_fetch_array($resultado);
	$_SESSION['email'] = $dados['email'];
	$_SESSION['senha'] = $dados['senha'];
	$_SESSION['nome'] = $dados['nome'];
	$_SESSION['sobrenome'] = $dados['sobrenome'];
	$_SESSION['id_usuario'] = $dados['id_usuario'];

	header('location:index2.php');
}

else if ($email=="root@root" and $senha=="root"){
	
	header('location:admin.php');
	
}

else {
	?>
<script type="text/javascript">
		alert("Email ou senha incorretos")
		window.location="./login.php";
    </script>
	<?php
	session_destroy();

	unset ($_SESSION['email']);
	unset ($_SESSION['senha']);

	
	
}
?>