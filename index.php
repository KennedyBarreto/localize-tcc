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
      
    var texto = document.createTextNode("Ver Mais");
    link.setAttribute('href', "perfil-comercio.php?id_comercio="+id_comercio);
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
				  map.setZoom(16);
				  

                marker.addListener('click', function() {
					
					map.setCenter(marker.getPosition());
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
																			   
		<section id="sobre"></section>
	
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
    <input type="text" id="input-name" placeholder="Nome" name="nome">
    <input type="email" id="input-email" placeholder="Email" name="email">
    <input type="text" id="input-subject" placeholder="Assunto" name="assunto">
  </div>
  <div class="half right cf">
    <textarea name="menssagem" type="text" id="input-message" placeholder="Mensagem"></textarea>
  </div>  
  <input type="submit" value="Enviar" id="input-submit">
</form>
		 <section id="contato"></section>
	
	<script src="js/ancoragem.js"></script>
	
</body>
</html>