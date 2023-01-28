<?PHP
session_start();
ini_set('display_errors', 1);
$email = $_SESSION['email'];
$nome = $_SESSION['nome'];
$sobrenome = $_SESSION['sobrenome'];
$id_usuario = $_SESSION['id_usuario'];

require("conexao.php");

$resultado = mysqli_query($conexao,"SELECT*FROM comercio WHERE id_usuario = '$id_usuario'") or die ("Erro na seleção da tabela.");

	$num = mysqli_num_rows ($resultado);


if ($num == 1){
	header('location:index3.php');
}


else if ( !isset($_SESSION['email']) and !isset($_SESSION['senha']) ) {
	//Destrói
	session_destroy();

	//Limpa
	unset ($_SESSION['email']);
	unset ($_SESSION['senha']);
	
	//Redireciona para a página de autenticação
	header('location:login.php');
}


	$id_comercio = $_GET['id_comercio'];
	
	require("conexao.php");

	$resultado = mysqli_query($conexao,"SELECT*FROM comercio
	WHERE id_comercio ='$id_comercio'") or die ("Erro na seleção da tabela.");

	$dados=mysqli_fetch_array($resultado);
	$nomecomercio = $dados['nomecomercio'];
	$rua = $dados['rua'];
	$numero = $dados['numero'];
	$bairro = $dados['bairro'];
	$telefone = $dados['telefone'];
	$diasfun = $dados['diasfun'];
	$abertura = $dados['abertura'];
	$fechamento = $dados['fechamento'];

	$busca = "Select * FROM comercio where id_comercio='$id_comercio'";
	$exe = mysqli_query($conexao,$busca);

	$resultado = (mysqli_fetch_array($exe));
	$numero = $resultado['views'];

	$visitantes = $numero + 1;
	$altera = "UPDATE COMERCIO SET views = '$visitantes' where id_comercio='$id_comercio'";
	$exe1 = mysqli_query($conexao,$altera);

	$resultado2 = mysqli_query($conexao,"SELECT sum(nota) FROM comentario where id_comercio='$id_comercio'");
	while($sum = mysqli_fetch_array($resultado2)){
		$soma = $sum['sum(nota)'];
	}

	$resulatdo3 = mysqli_query($conexao,"SELECT*FROM comentario where id_comercio='$id_comercio'");
	$num = mysqli_num_rows($resulatdo3);

	if ($num ==0){
		$media = 0;
	}
	
	else{
		$media = $soma/$num;
	}
	$db = mysqli_connect("localhost", "root", "usbw", "localize");
$result = mysqli_query($db, "SELECT perfil FROM comercio
WHERE id_comercio ='$id_comercio'");
$result2 = mysqli_query($db, "SELECT capa FROM comercio
WHERE id_comercio ='$id_comercio'");
$result3 = mysqli_query($db, "SELECT*FROM comercioi
WHERE id_comercio ='$id_comercio'");

$resultt = mysqli_query($db, "SELECT * FROM post
WHERE id_comercio ='$id_comercio'");
?>
<!DOCTYPE html>
<html>
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Perfil Comercio</title>
      <link rel="stylesheet" href="css/perfil-comercio.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	
	<script src="https://maps.googleapis.com/maps/api/js?key=&v=3.0&sensor=true&language=ee&dummy=dummy.js"></script>
	
      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>
<body>
      <div class="wrapper">
            <header>

                  <nav> 

                        <div class="logo">
                              <img src="img/logo2.png">
                        </div>

                        <div class="menu">
                              <ul>
                                    <li><a href="index2.php">Home</a></li>
                             
								    <li><a href="cadastro-comercio.php">Cadastro de Comercio</a></li>
								  	<li><h2>Bem vindo, <a href="#"><?PHP echo($nome); ?> <i class="fas fa-user"></i></a></h2></li>
                              </ul>
                        </div>
                  </nav>

            </header>
		</div>
      <script type="text/javascript">

      // Menu-toggle button

      $(document).ready(function() {
            $(".menu-icon").on("click", function() {
                  $("nav ul").toggleClass("showing");
            });
      });

      // Scrolling Effect

      $(window).on("scroll", function() {
            if($(window).scrollTop()) {
                  $('nav').addClass('black');
            }

            else {
                  $('nav').removeClass('black');
            }
      })

      </script>
	
	<div class="perfil">
		<?php
    while ($row = mysqli_fetch_array($result)) {
		// Verificar se é nulo, se for exibir imagem padrão
	
      	echo "<img src='images/".$row['perfil']."' >";
    }
	
  ?>
		<h1><?PHP echo($nomecomercio); ?></h1>
		<hr>
	</div>
	
	<div class="balls">
	<div class="star"><p><i class="fas fa-star"></i> <?PHP echo number_format((float)$media, 2, '.', ''); ?></p></div>
	<div class="coment"><p><i class="fas fa-comment"></i> <?PHP echo($num); ?></p></div>
	</div>
	
	<div class="imgcapa"> <?php
    while ($row = mysqli_fetch_array($result2)) {
		// Verificar se é nulo, se for exibir imagem padrão
	
      	echo "<img src='images/".$row['capa']."' >";
    }
	
  ?> </div>
	
	<div class="capa"></div>	
	
	<div class="imagens">
		<h2>Imagens do Estabelecimento</h2>
			<div class="row">
		 <?php
			$cont = 0;
    while ($row = mysqli_fetch_array($result3)) {
		// Verificar se é nulo, se for exibir imagem padrão
		
		$cont++;
		echo $cont;
		echo "  <div class='column'>";
      	echo "<img src='images/".$row['image']."' style='width:100%' onclick='openModal();currentSlide($cont)' class='hover-shadow cursor' >";
		echo " </div>";
    }
  ?>
			
		</div>
		</div>

		<div id="myModal" class="modal">
		  <span class="close cursor" onclick="closeModal()">&times;</span>
		  <div class="modal-content">

			<div class="mySlides">
			  <div class="numbertext">1 / 6</div>
			  <img src="img/1.jpg" style="width:100%">
			</div>

			<div class="mySlides">
			  <div class="numbertext">2 / 6</div>
			  <img src="img/2.jpg" style="width:100%">
			</div>

			<div class="mySlides">
			  <div class="numbertext">3 / 6</div>
			  <img src="img/3.jpg" style="width:100%">
			</div>

			<div class="mySlides">
			  <div class="numbertext">4 / 6</div>
			  <img src="img/1.jpg" style="width:100%">
			</div>
			  
			  <div class="mySlides">
			  <div class="numbertext">5 / 6</div>
			  <img src="img/2.jpg" style="width:100%">
			</div>
			  
			  <div class="mySlides">
			  <div class="numbertext">6 / 6</div>
			  <img src="img/3.jpg" style="width:100%">
			</div>

			<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
			<a class="next" onclick="plusSlides(1)">&#10095;</a>

			<div class="caption-container">
			  <p id="caption"></p>
			</div>
			</div>
			</div>
	
	
			<script>
		function openModal() {
		  document.getElementById('myModal').style.display = "block";
		}

		function closeModal() {
		  document.getElementById('myModal').style.display = "none";
		}

		var slideIndex = 1;
		showSlides(slideIndex);

		function plusSlides(n) {
		  showSlides(slideIndex += n);
		}

		function currentSlide(n) {
		  showSlides(slideIndex = n);
		}

		function showSlides(n) {
		  var i;
		  var slides = document.getElementsByClassName("mySlides");
		  var dots = document.getElementsByClassName("demo");
		  var captionText = document.getElementById("caption");
		  if (n > slides.length) {slideIndex = 1}
		  if (n < 1) {slideIndex = slides.length}
		  for (i = 0; i < slides.length; i++) {
			  slides[i].style.display = "none";
		  }
		  for (i = 0; i < dots.length; i++) {
			  dots[i].className = dots[i].className.replace(" active", "");
		  }
		  slides[slideIndex-1].style.display = "block";
		  dots[slideIndex-1].className += " active";
		  captionText.innerHTML = dots[slideIndex-1].alt;
		}
		</script>
	
	<div class="endereco">
		<h2>Endereço</h2>
		<p>Rua: <b><?PHP echo($rua); ?></b></p>
		<p>N°: <b><?PHP echo($numero); ?></b></p>
		<p>Bairro: <b><?PHP echo($bairro); ?></b></p>
	</div>
	
	<div class="funcionamento">
		<h2>Funcionamento</h2>
		<p>Dias de Funcionamento: <b><?PHP echo($diasfun); ?></b></p>
		<p>Horario de Abertura: <b><?PHP echo($abertura); ?></b></p>
		<p>Horario de Fechamento: <b><?PHP echo($fechamento); ?></b></p>
	</div>
	
	<div class="contato">
		<h2>Contato</h2>
		<p>Telefone 1: <b><?PHP echo($telefone); ?></b></p>
		<p>Telefone 2: <b><?PHP echo($telefone); ?></b></p>
		<p>Email: <b>caminhosupermercado@gmail.com</b></p>
	</div>
	
	<div class="comentarios">
		<h2>Comentarios</h2>
		
		
		<?PHP
		
		$resultado=mysqli_query($conexao,"SELECT * FROM comentario where id_comercio='$id_comercio'");
		while($exibir = mysqli_fetch_array($resultado)){
		
		echo "<div class='menssagem'>";
		$a = $exibir['nome_usuario'];
		$b = $exibir['nota'];
		$c = $exibir['menssagem'];
			
		echo "<p class='nota'>Nota: <b>$b <i class='fas fa-star'></i> </b></p>";	
		echo "<h3> $a </h3>";
		echo "<h4> $c </h4>";
		echo "</div>";
		}
		
		?>
	</div>
	
	<div class="postagens">
		<h2>Postagens</h2>
		
			<?php
    		while ($row = mysqli_fetch_array($resultt)) {
			echo "<div class='comimg'>";
			echo "<img src='images/".$row['image']."' class='imgpost'>";
    		echo "<div class='texto'>";
      		echo "<h4>".$row['titulo']. "</h4>";
   			echo "<p>".$row['texto']. "</p>";
    		echo "</div>";
			echo "</div>";
			echo "<br>";
    		}
  			?>
	</div>
	
	<div class="avaliacao">
		<h2>Avalie esse comercio</h2>
		<div class="menssagem2">
			<form method="post" action="efetuar-cadastro-comentario.php">
					
				<div class="estrelas">
					
				Nota: 	
				  <input type="radio" id="cm_star-empty" name="nota" value="0" checked/>					
				  <label for="cm_star-1"><i class="fa"></i></label>
				  <input type="radio" id="cm_star-1" name="nota" value="1"/>
				  <label for="cm_star-2"><i class="fa"></i></label>
				  <input type="radio" id="cm_star-2" name="nota" value="2"/>
				  <label for="cm_star-3"><i class="fa"></i></label>
				  <input type="radio" id="cm_star-3" name="nota" value="3"/>
				  <label for="cm_star-4"><i class="fa"></i></label>
				  <input type="radio" id="cm_star-4" name="nota" value="4"/>
				  <label for="cm_star-5"><i class="fa"></i></label>
				  <input type="radio" id="cm_star-5" name="nota" value="5"/>

				</div>
				<h3><?PHP echo($nome); ?> <?PHP echo($sobrenome); ?></h3>
				<textarea name="menssagem" type="text" id="message" placeholder="Menssagem"></textarea>
				
				<input type="hidden" value="<?PHP echo($nome); ?> <?PHP echo($sobrenome); ?>" name="nome_usuario">
				
				<input type="hidden" value="<?PHP echo($id_comercio); ?>" name="id_comercio">
				
				<input type="submit" value="Enviar">
				
			</form>
		</div>
	</div>
	
	<br><br>
	
</body>
</html>