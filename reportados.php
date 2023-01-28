<?PHP
require ("conexao.php");
include("banco-comercio.php"); 
ini_set('display_errors', 1);
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
	<th>ID</th>
	<th>Nome do Usuario</th>
	<th>Nota</th>
	<th>Mensagem</th>
	<th>EXCLUIR</th>
	</thead>
	<?php foreach ($listarComentario as $a){?>
	<tr>
	<tbody class="table-hover">
	<td><center><?php echo $a['id_comentario'];?></td></td></center>
	<td><center><?php echo $a['nome_usuario'];?></td></td></center>
	<td><center><?php echo $a['nota'];?></td></center>
	<td><center><?php echo $a['menssagem'];?></td></center>
	<td><center><a href="excluir-comentario.php?id_comentario=<?php echo $a['id_comentario'];?>">EXCLUIR</a></center></td>

	</tr>
</tbody>
<?php }?>
</table>

</body>
</html>