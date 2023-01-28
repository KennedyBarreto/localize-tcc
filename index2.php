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

require("conexao.php");

$busca = "Select * FROM viewstotal";
$exe = mysqli_query($conexao,$busca);

$resultado = (mysqli_fetch_array($exe));
$numero = $resultado['views'];

$visitantes = $numero + 1;
$altera = "UPDATE viewstotal SET views = '$visitantes' WHERE views = '$numero'";
$exe1 = mysqli_query($conexao,$altera);
// imagem padrao


$db = mysqli_connect("localhost", "root", "usbw", "localize");
$result = mysqli_query($db, "SELECT*FROM usuario
WHERE id_usuario ='$id_usuario'");
?>
<!DOCTYPE html>
<html>
<head>
      <meta charset="UTF-8">	
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Home</title>
      <link rel="stylesheet" href="css/index2.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	
	<script src="https://maps.googleapis.com/maps/api/js?key=&v=3.0&sensor=true&language=ee&dummy=dummy.js"></script>
	
      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>
<body>
      <div class="wrapper">
            <header>

                  <nav> 

                        <div class="logo">
                              <img src="img/logo.png">
                        </div>

                        <div class="menu">
                              <ul>
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Sobre</a></li>
                                    <li><a href="#">Contato</a></li>
								    <li><a href="cadastro-comercio.php">Cadastro de Comercio</a></li>
								  	<li><h2>Bem vindo, <a href="#"><button id="myBtn"><?PHP echo($nome); ?></button> <i class="fas fa-user"></i></a></h2></li>
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
		
		
		
		
		
        
		
            

<!-- The Modal -->
<div id="myModal" class="modal">

<span class="close">&times;</span> 

  <!-- Modal content -->
  <div class="modal-content">
    
    <div class="infos"> 
    <h3><?PHP echo($nome); ?> <?PHP echo($sobrenome); ?></h3>
	<p><?PHP echo($email); ?></p>	
    </div>
	  <h4><a href="alterar-usuario2.php"><i class="fas fa-user-edit"></i></a> &nbsp; <a href="logout.php"><i class="fas fa-sign-out-alt"></i></a></h4>
  </div>
 <h2><?php
    while ($row = mysqli_fetch_array($result)) {
		// Verificar se é nulo, se for exibir imagem padrão
	
      	echo "<img src='images/".$row['image']."' class='userimg' >";
    }
	
  ?></h2>
	
  </div>
		
		
		<script>
		// Get the modal
			var modal = document.getElementById('myModal');

			// Get the button that opens the modal
			var btn = document.getElementById("myBtn");

			// Get the <span> element that closes the modal
			var span = document.getElementsByClassName("close")[0];

			// When the user clicks the button, open the modal 
			btn.onclick = function() {
				modal.style.display = "block";
			}

			// When the user clicks on <span> (x), close the modal
			span.onclick = function() {
				modal.style.display = "none";
			}

			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
				if (event.target == modal) {
					modal.style.display = "none";
				}
			}
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
			 &nbsp; Digite um endereço: <input id="address" type="textbox" value="">
      		 &nbsp;	<input id="submit" type="button" value="Buscar">
			  
		</div>
		  
		  <div id="borda">
		<br>
		</div>
		  
		  <div id="map"></div>
		  
		  <script>
    	  var gmarkers1 = [];
      var customLabel = {
        pet: { icon:'img/pet.png'  }, support: { icon:'img/support.png' }, casa: { icon:'img/casa.png' }, eletro: { icon:'img/eletro.png' }, livro: { icon:'img/livro.png' }, mecanico: { icon:'img/mecanico.png' }, mercado: { icon:'img/mercado.png' }, restaurante: { icon:'img/restaurante.png' }, roupa: { icon:'img/roupa.png' }, saude: { icon:'img/saude.png' }, outros: { icon:'img/outros.png' },
        

      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
         center: {lat: -23.199896806011044, lng: -47.28805967942615},
          zoom: 15,
		  styles:[ { "elementType": "geometry", "stylers": [ { "color": "#f5f5f5" } ] }, { "elementType": "labels.icon", "stylers": [ { "visibility": "off" } ] }, { "elementType": "labels.text.fill", "stylers": [ { "color": "#616161" } ] }, { "elementType": "labels.text.stroke", "stylers": [ { "color": "#f5f5f5" } ] }, { "featureType": "administrative", "elementType": "geometry", "stylers": [ { "visibility": "off" } ] }, { "featureType": "administrative.land_parcel", "elementType": "labels.text.fill", "stylers": [ { "color": "#bdbdbd" } ] }, { "featureType": "poi", "stylers": [ { "visibility": "off" } ] }, { "featureType": "poi", "elementType": "geometry", "stylers": [ { "color": "#eeeeee" } ] }, { "featureType": "poi", "elementType": "labels.text.fill", "stylers": [ { "color": "#757575" } ] }, { "featureType": "poi.park", "elementType": "geometry", "stylers": [ { "color": "#e5e5e5" } ] }, { "featureType": "poi.park", "elementType": "labels.text.fill", "stylers": [ { "color": "#9e9e9e" } ] }, { "featureType": "road", "elementType": "geometry", "stylers": [ { "color": "#ffffff" } ] }, { "featureType": "road", "elementType": "labels.icon", "stylers": [ { "visibility": "off" } ] }, { "featureType": "road.arterial", "elementType": "labels.text.fill", "stylers": [ { "color": "#757575" } ] }, { "featureType": "road.highway", "elementType": "geometry", "stylers": [ { "color": "#dadada" } ] }, { "featureType": "road.highway", "elementType": "labels.text.fill", "stylers": [ { "color": "#616161" } ] }, { "featureType": "road.local", "elementType": "labels.text.fill", "stylers": [ { "color": "#9e9e9e" } ] }, { "featureType": "transit", "stylers": [ { "visibility": "off" } ] }, { "featureType": "transit.line", "elementType": "geometry", "stylers": [ { "color": "#e5e5e5" } ] }, { "featureType": "transit.station", "elementType": "geometry", "stylers": [ { "color": "#eeeeee" } ] }, { "featureType": "water", "elementType": "geometry", "stylers": [ { "color": "#c9c9c9" } ] }, { "featureType": "water", "elementType": "labels.text.fill", "stylers": [ { "color": "#9e9e9e" } ] } ] 
       
        });

        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('resultado.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
            	
            	//PEGA O ID E PASSA PRA VARIAVEL
            	var id_comercio = markerElem.getAttribute('id_comercio');
            	var id_usuario = markerElem.getAttribute('id_usuario');
            
              var nomecomercio = markerElem.getAttribute('nomecomercio');
              var rua = markerElem.getAttribute('rua');
              var type = markerElem.getAttribute('categoria');
              var numero = markerElem.getAttribute('numero');
              var bairro = markerElem.getAttribute('bairro');
              var diasfun = markerElem.getAttribute('diasfun');
               var abertura = markerElem.getAttribute('abertura');
                var fechamento = markerElem.getAttribute('fechamento');
                var telefone = markerElem.getAttribute('telefone');

              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('h2');

              strong.textContent = nomecomercio
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));
var yeet = [type];
              var text = document.createElement('text');
              text.textContent = rua+" nº"+numero+" "+bairro;
              infowincontent.appendChild(text);
              infowincontent.appendChild(document.createElement('br'));
               var text = document.createElement('text');
              text.textContent = "Telefone: "+telefone;
              infowincontent.appendChild(text);
              infowincontent.appendChild(document.createElement('br'));
               var text = document.createElement('text');
              text.textContent = "Dias de Funcionamento: "+diasfun;
              infowincontent.appendChild(text);
               infowincontent.appendChild(document.createElement('br'));
               var text = document.createElement('text');
              text.textContent = "Aberto das "+abertura+ " às "+fechamento;
              infowincontent.appendChild(text);
  var link = document.createElement('a');
     infowincontent.appendChild(document.createElement('br'));
      
    var texto = document.createTextNode("Ver Comercio");
    link.setAttribute('href', "perfil-comercio2.php?id_comercio="+id_comercio);
    link.appendChild(texto);
    infowincontent.appendChild(link);


              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
				icon: icon.icon,
				type: type,
animation: google.maps.Animation.DROP
               
              });

                 gmarkers1.push(marker);

              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);

                marker.addListener('click', function() {
          map.setZoom(16);
        });

              });
            });
          });
           var geocoder = new google.maps.Geocoder();

        document.getElementById('submit').addEventListener('click', function() {
          geocodeAddress(geocoder, map);
        });
        }

filterMarkers = function (type) {
            for (i = 0; i < gmarkers1.length; i++) {
                marker = gmarkers1[i];
                // If is same category or category not picked
                if (marker.type == type || type.length === 0) {
                    marker.setVisible(true);
                }
                    // Categories don't match 
                else {
                    marker.setVisible(false);
                }
            }
        }
        
function toggleBounce() {
        if (marker.getAnimation() !== null) {
          marker.setAnimation(null);
        } else {
          marker.setAnimation(google.maps.Animation.BOUNCE);
        }
      }

      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}

      function geocodeAddress(geocoder, resultsMap) {
        var address = document.getElementById('address').value;
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
          
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }
    </script>

		  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAU1iWt56jb-l8neUJh4dcGwWRfsXKpPg8&callback=initMap" type="text/javascript"></script>
	
		<div class="box2" id="sobre">
   			<p class="box2t">Localize</p>
			<p class="box2a" style="text-align: center;">&nbsp;	Uma ferramenta de busca e divulgação para clientes e comerciantes de Salto e região</p>
  		</div>
		
		<div class="box">
   			<p class="imgsobre"><img src="img/loupe.png" class="lupa"></p>
			<p class="txtsobre">Descubra comercios e estabelecimentos dentre mais de 10 nichos e categorias diferentes, além de sempre ter disponivel todas as suas informações importantes</p>
  		</div>
		
  		<div class="box">
   			<p class="imgsobre"><img src="img/analytics.png" class="analy"></p>
			<p class="txtsobre"> Tenha acesso a várias métricas e estatisticas relacionadas ao seu comercio, além de poder criar postagens personalizadas para manter-se em contato com os clientes e divulgar produtos ou serviços</p>
  		</div>
		

		<h1>&nbsp;</h1>
<form method="post" action="efetuar-cadastro-contato.php">
	<p class="titucont">Contato</p>
  <div class="half left cf">
    <input type="text" id="input-name" value="<?PHP echo($nome); ?> <?PHP echo($sobrenome); ?>" name="nome">
    <input type="email" id="input-email" value="<?PHP echo($email); ?>" name="email">
    <input type="text" id="input-subject" placeholder="Assunto" name="assunto">
  </div>
  <div class="half right cf">
    <textarea name="menssagem" type="text" id="input-message" placeholder="Mensagem"></textarea>
  </div>  
  <input type="submit" value="Enviar" id="input-submit">
</form>
	<div id="contato"></div>
		  	
</body>
</html>