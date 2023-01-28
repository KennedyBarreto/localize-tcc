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
	header('location:login.php');
}

require("conexao.php");

$resultado = mysqli_query($conexao,"SELECT*FROM usuario") or die ("Erro na seleção da tabela.");

$num = mysqli_num_rows ($resultado);

$busca = mysqli_query($conexao,"Select * FROM viewstotal");
$dados = (mysqli_fetch_array($busca));
$views = $dados['views'];

$sql = mysqli_query($conexao,"SELECT*FROM comercio WHERE id_usuario='$id_usuario'");
$dados2 = (mysqli_fetch_array($sql));
$views_unicas = $dados2['views'];

	$sql2 = mysqli_query($conexao,"SELECT*FROM comercio WHERE id_usuario='$id_usuario'");
	$dados3 = (mysqli_fetch_array($sql2));
	$id_comercio  = $dados3['id_comercio'];

	$resultado2 = mysqli_query($conexao,"SELECT sum(nota) FROM comentario where id_comercio='$id_comercio'");
	while($sum = mysqli_fetch_array($resultado2)){
		$soma = $sum['sum(nota)'];
	}

	$resulatdo3 = mysqli_query($conexao,"SELECT*FROM comentario where id_comercio='$id_comercio'");
	$num2 = mysqli_num_rows($resulatdo3);

	if ($num2 ==0){
		$media = 0;
		$media_certo =0;
	}
	
	else{
		$media = $soma/$num2;
		
		$media_certo = number_format($media, 1, '.', '');
	}

	$resultado4 = mysqli_query($conexao,"SELECT*FROM comentario WHERE id_comercio='$id_comercio'");
		$a=0;
		$b=0;
		$c=0;
		$d=0;
		$e=0;
	while($nota = mysqli_fetch_array($resultado4)){
		$n = $nota['nota'];
		if($n == 1){
			$a++;
		}
		else if($n == 2){
			$b++;
		}
		else if($n == 3){
			$c++;
		}
		else if($n == 4){
			$d++;
		}
		else{
			$e++;
		}
	}

	$resultado5 = mysqli_query($conexao,"SELECT*FROM comentario WHERE id_comercio='$id_comercio'");
		$aa=0;
		$bb=0;

	while($nota2 = mysqli_fetch_array($resultado5)){
		$n2 = $nota2['nota'];
		if($n2 < 3){
			$aa++;
		}
		else if($n2 >= 3){
			$bb++;
		}
	}

	$resultado6 = mysqli_query($conexao,"SELECT*FROM comentario WHERE id_comercio='$id_comercio'");
	$total = mysqli_num_rows($resultado6);
	
	if($total==0){
		$total2=0;
		$total3=0;
	}
	else{
		$total2=($bb*100)/$total;
		$total3=($aa*100)/$total;
	}

$db = mysqli_connect("localhost", "root", "usbw", "localize");
$result = mysqli_query($db, "SELECT*FROM usuario
WHERE id_usuario ='$id_usuario'");
?>
<!DOCTYPE html>
<html>
	<title>Meu Comercio</title>
	<head>      
		
		<link href="css/metricas.css" rel="stylesheet">
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
			<p class="linku"><a href="alterar-usuario2.php" style="text-decoration: none;color: white"><i class="fas fa-edit"></a></i>&nbsp;<a href="logout.php" style="text-decoration: none;color: white"> <i class="fas fa-power-off"></a></i></p><br>
			
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
  			<div class="box1">
    			<p><i class="fas fa-user"></i> &nbsp;&nbsp; Total Usuarios:</p>
				<p class="ttu"><?PHP echo($num); ?></p>
  			</div>
  			<div class="box2">
    			<p><i class="fas fa-eye"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Visualizações:</p>
				<p class="ttu"><?PHP echo($views); ?></p>
  			</div>
  			<div class="box3">
   				 <p><i class="fas fa-eye"></i> &nbsp;&nbsp;&nbsp; Visualizações Unicas:</p>
				<p class="ttu"><?PHP echo($views_unicas); ?></p>
  			</div>
			<div class="box4">
   				 <p><i class="fas fa-star"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nota Media:</p>
				<p class="ttu"><?PHP echo($media_certo); ?></p>
  			</div>
			<div class="box5">
   				 <p><i class="fas fa-comment"></i> &nbsp;&nbsp;&nbsp;&nbsp; Comentarios:</p>
				<p class="ttu"><?PHP echo($num2); ?></p>
  			</div>
		</div>
		
		<div class="clearfix">
  			
			<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
			<script src="code/highcharts.js"></script>
			<script src="code/modules/exporting.js"></script>
			<script src="code/modules/export-data.js"></script>

			<div id="container" class="box"></div>

			<script type="text/javascript">

		// Build the chart
		Highcharts.chart('container', {
			chart: {
				plotBackgroundColor: null,
				plotBorderWidth: null,
				plotShadow: false,
				type: 'pie'
			},
			title: {
				text: 'Avaliacoes'
			},
			tooltip: {
				pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
			},
			plotOptions: {
				pie: {
					allowPointSelect: true,
					cursor: 'pointer',
					dataLabels: {
						enabled: false
					},
					showInLegend: true
				}
			},
			series: [{
				name: 'Total',
				colorByPoint: true,
				data: [{
					name: 'Gostaram',
					y: <?PHP echo($bb); ?>,
					
				},{
					name: 'Nao Gostaram',
					y: <?PHP echo($aa); ?>
				}]
			}]
		});
				</script>

			
			<div id="container1" class="box"></div>



		<script type="text/javascript">

Highcharts.chart('container1', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: 0,
        plotShadow: false
    },
    title: {
        text: 'Notas',
        align: 'center',
        verticalAlign: 'middle',
        y: 40
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            dataLabels: {
                enabled: true,
                distance: -50,
                style: {
                    fontWeight: 'bold',
                    color: 'white'
                }
            },
            startAngle: -90,
            endAngle: 90,
            center: ['50%', '75%'],
            size: '110%'
        }
    },
    series: [{
        type: 'pie',
        name: 'Total',
        innerSize: '50%',
        data: [
            ['1', <?PHP echo($a); ?>],
            ['2', <?PHP echo($b); ?>],
            ['3', <?PHP echo($c); ?>],
            ['4', <?PHP echo($d); ?>],
            ['5', <?PHP echo($e); ?>]
            
        ]
    }]
});


		</script>
			
		</div>
		
		
		
		
	</body>
	
</html>