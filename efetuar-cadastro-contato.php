<?PHP
require ("conexao.php");
include("banco-comercio.php");

$nome=$_POST ['nome'];
$email=$_POST ['email'];
$assunto=$_POST ['assunto'];
$menssagem=$_POST ['menssagem'];

if (cadContato($nome,$email,$assunto,$menssagem)){
	?>
    
    <script type="text/javascript">
		alert("Sua mensagem foi enviada!")
		window.location="./index.php";
    </script>
	
    <?php
}
else{
	echo("deu ruim");
}
?>