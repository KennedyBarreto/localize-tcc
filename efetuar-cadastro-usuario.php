<?PHP
require ("conexao.php");
include("banco-usuario.php");
ini_set('display_errors', 1);
$nome=$_POST ['nome'];
$sobrenome=$_POST ['sobrenome'];
$email=$_POST ['email'];
$senha=$_POST ['senha'];
$confirma=$_POST ['senha2'];

if ($senha != $confirma){
	
	?>
    
    <script type="text/javascript">
		alert("Senhas não conferem!")
		window.location="./cadastro-usuario.php";
    </script>
	
    <?php
	
	
}
elseif (cadUsuario($nome,$sobrenome,$email,$senha)){
	?>
    
    <script type="text/javascript">
		alert("Cadastro realizado com sucesso!")
		window.location="./login.php";
    </script>
	
    <?php
}
else{
	echo("Erro");
}
?>