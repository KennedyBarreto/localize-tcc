<?PHP
require ("conexao.php");
include("banco-comercio.php");
ini_set('display_errors', 1);
$nomecomercio=$_POST ['nomecomercio'];
$cnpj=$_POST ['cnpj'];
$categoria=$_POST ['categoria'];
$rua=$_POST ['rua'];
$numero=$_POST ['numero'];
$bairro=$_POST ['bairro'];
$lat=$_POST ['lat'];
$lng=$_POST ['lng'];
$telefone=$_POST ['telefone'];
$dias1=$_POST ['dias1'];
$dias2=$_POST ['dias2'];
$abertura=$_POST ['abertura'];
$fechamento=$_POST ['fechamento'];
$id_usuario=$_POST ['id_usuario'];

if (cadComercio($nomecomercio,$cnpj,$categoria,$rua,$numero,$bairro,$lat,$lng,$telefone,$dias1,$dias2,$abertura,$fechamento,$id_usuario)){
	?>
    
    <script type="text/javascript">
		alert("Cadastro realizado com sucesso!")
		window.location="./index3.php";
    </script>
	
    <?php
}
else{
	echo("deu ruim");
}
?>