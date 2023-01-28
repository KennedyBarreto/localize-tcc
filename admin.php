<?php
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
<link rel="stylesheet" href="css/index.css">
<title>Localize</title>
</head>

<body>
	
	<h1>Admin page</h1>
	
	<table border="1">
	<thead>
	<th>Nome</th>
	<th>Email</th>
	<th>Assunto</th>
	<th>Mensagem</th>
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
<br>
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
	<!--
	<a href="contato.php">Mensagens de contato</a><br>
	<a href="reportados.php">Comentarios reportados</a><br> -->
	<a href="logout.php">Logout</a>
	
</body>
</html>
