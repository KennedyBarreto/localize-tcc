<?PHP
require ("conexao.php");
include("banco-comercio.php"); 
ini_set('display_errors', 1);
$listarContato=listarContato();
$listarComentario=listarComentario();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Localize</title>
</head>

<body>
	
	<a href="admin.php">Voltar</a><br><br>
	
	<table border="1">
	<thead>
	<th>Nome</th>
	<th>Email</th>
	<th>Assunto</th>
	<th>Menssagem</th>
	</thead>
	<?php foreach ($listarContato as $a){?>
	<tr>
	<tbody class="table-hover">
	<td><center><?php echo $a['nome'];?></td></td></center>
	<td><center><?php echo $a['email'];?></td></center>
	<td><center><?php echo $a['assunto'];?></td></center>
	<td><center><?php echo $a['menssagem'];?></td></center>

	</tr>
</tbody>
<?php }?>
</table>

</body>
</html>