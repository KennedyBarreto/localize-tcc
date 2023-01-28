<?PHP
ini_set('display_errors', 1);
require("conexao.php");

$busca = "Select * FROM viewstotal";
$exe = mysqli_query($conexao,$busca);

$resultado = (mysqli_fetch_array($exe));
$numero = $resultado['views'];

$visitantes = $numero + 1;
$altera = "UPDATE viewstotal SET views = '$visitantes' WHERE views = '$numero'";
$exe1 = mysqli_query($conexao,$altera);

?>
<!DOCTYPE html>
<html>
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Home</title>
      <link rel="stylesheet" href="css/index.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	
	
	
      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>
<body>
      <div class="wrapper">
            <header>
				<section id="home"></section>
                  <nav> 

                        <div class="logo">
                              <img src="img/logo.png">
                        </div>

                        <div class="menu">
                              <ul>
                                    <li><a href="#home">Home</a></li>
									<li><a href="#home">Recomendados</a></li>
                                    <li><a href="#sobre">Sobre</a></li>
                                    <li><a href="#contato">Contato</a></li>
								  	<li><h2><a href="login.php">Entrar</a> | <a href="cadastro-usuario.php">Cadastro</a></h2></li>
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
	
		  <div id="selecionar">
   			Selecione o tipo de comércio:
			<select id="type" onchange="filterMarkers(this.value);">
                <option value="">Todos</option>
				<option value="pet">Animais & Veterinarios</option>
				<option value="support">Assistencia Tecnica</option>
                <option value="casa">Materiais de Construção</option>
                <option value="eletro">Eletronicos & Eletrodomesticos</option>
                <option value="livro">Livraria & Bibliotecas</option>
				<option value="mecanico">Assistencia Mecanica</option>
				<option value="mercado">Supermercado</option>
				<option value="restaurante">Restaurante & Bares</option>
				<option value="roupa">Modas & Vestuario</option>
				<option value="saude">Clinicas & Farmacias</option>
				<option value="outros">Outros</option>
            </select>
			 &nbsp; Ordenar por: <select id="type" onchange="filterMarkers(this.value);">
                <option value="">Melhor Avaliados </option>
				<option value="pet">Animais & Veterinarios</option>
				<option value="support">Assistencia Tecnica</option>
                <option value="casa">Materiais de Construção</option>
                <option value="eletro">Eletronicos & Eletrodomesticos</option>
                <option value="livro">Livraria & Bibliotecas</option>
				<option value="mecanico">Assistencia Mecanica</option>
				<option value="mercado">Supermercado</option>
				<option value="restaurante">Restaurante & Bares</option>
				<option value="roupa">Modas & Vestuario</option>
				<option value="saude">Clinicas & Farmacias</option>
				<option value="outros">Outros</option>
            </select>
			  
		</div>
		  
		  
</body>
</html>