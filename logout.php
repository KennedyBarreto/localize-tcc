<?PHP

require("conexao.php");
	
	session_destroy();

	//Limpa
	unset ($_SESSION['email']);
	unset ($_SESSION['senha']);
	
	//Redireciona para a página de autenticação
	header('location:index.php');

?>