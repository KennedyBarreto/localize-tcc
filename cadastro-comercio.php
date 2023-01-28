<?PHP
session_start();

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
	header('location:login.html');
}

?>
<!DOCTYPE html>
<html>
	<title>Cadastro de Comercio</title>
	<head>      

		<link href="css/cadastro-comercio.css" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
		<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

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
                                    <li><a href="index2.php">Home</a></li>
								  	<li><h2>Bem vindo, <a href="#"><?PHP echo($nome); ?> <i class="fas fa-user"></i></a></h2></li>
                              </ul>
                        </div>
                  </nav>

            </header>
		</div>
		
		<form id="SignupForm" action="efetuar-cadastro-comercio.php" method="post">
        <fieldset>
            <h1>Cadastro de Comercio</h1>
            <label>Nome do Estabelecimento</label>
            <input type="text" name="nomecomercio" />
			<label>CNPJ ou MEI</label>
            <input type="text" name="cnpj" />
            <label>Categoria</label>
            <select id="select1" name="categoria">
               <option value=""></option>
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
			
        </fieldset>
        <fieldset>
            <h1>Cadastro de Comercio</h1>
			<div class="col_1_of_2 span_1_of_1"><label>Endereço</label><input type="text" class="text" name="rua" ></div>
            <div class="col_1_of_2 span_1_of_2"><label>Numero</label><input type="text" class="text" name="numero" ></div>
            <label>Bairro</label>
            <input type="text" name="bairro" />
			<div class="col_1_of_2 span_1_of_3"><label>Latitude</label><input type="text" class="text" name="lat" id="lat"></div>
            <div class="col_1_of_2 span_1_of_4"><label>Longitude</label><input type="text" class="text" name="lng" id="lng"></div>
			<label>Para saber a Latitude e Logitude clique <a id="myBtn">Aqui</a>.</label>
        </fieldset>
        <fieldset>
            <h1>Cadastro de Comercio</h1>
            <label for="NameOnCard">Telefone</label>
            <input id="NameOnCard" type="text" name="telefone" />
			<label>Dias de Funcionamento</label>
            <select class="col_1_of_2 span_1_of_5" name="dias1">
				<option value="SEG">Segunda</option>
				<option value="TER">Terca</option>
                <option value="QUA">Quarta</option>
                <option value="QUI">Quinta</option>
                <option value="SEX">Sexta</option>
				<option value="SAB">Sabado</option>
				
            </select>
			<label class="col_1_of_2 span_1_of_7">a</label>
			<select class="col_1_of_2 span_1_of_6" name="dias2">
				<option value=""></option>
				<option value="TER">Terca</option>
                <option value="QUA">Quarta</option>
                <option value="QUI">Quinta</option>
                <option value="SEX">Sexta</option>
				<option value="SAB">Sabado</option>
				<option value="DOM">Domingo</option>
            </select>
            
            <div class="col_1_of_2 span_1_of_3"><label>Horario abertura</label><input type="text" class="text" name="abertura"></div>
            <div class="col_1_of_2 span_1_of_4"><label>Horario fechamento</label><input type="text" class="text" name="fechamento"></div>
            
            <input type="hidden" value="<?PHP echo($id_usuario); ?>" name="id_usuario">
            
        </fieldset>
        <p>
            <input id="SaveAccount" type="submit" value="Cadastrar" />
        </p>
        </form>
		
	<script  src="js/cadastro-comercio.js"></script>
		
		
		<div id="myModal" class="modal">

		<span class="close">&times;</span> 

		  <div class="modal-content">
			  
			<div class="selecionar">
			Digite um endereco: <input id="address" type="textbox" value="">
           <input id="submit" type="button" value="Buscar">
			</div>
				
            <div id="map"></div>
        
        <script type="text/javascript">
        var map;
        
        function initMap() {                            
            var latitude = 27.7172453; // YOUR LATITUDE VALUE
            var longitude = 85.3239605; // YOUR LONGITUDE VALUE
			
            var myLatLng = {lat: latitude, lng: longitude};
            
            map = new google.maps.Map(document.getElementById('map'), {
              center:  {lat: -23.199896806011044, lng: -47.28805967942615},
              zoom: 14,
              disableDoubleClickZoom: true, // disable the default map zoom on double click
            });
          google.maps.event.addListener(map, 'click', function(event) {
			  var latitude = event.latLng.lat();
    var longitude = event.latLng.lng();
	document.getElementById("lat").value = event.latLng.lat();
	document.getElementById("lng").value = event.latLng.lng();
    new google.maps.InfoWindow({
      position: event.latLng,
      content: "Coordenadas copiadas para o formulário!"
	  
	  
    }).open(map);
	
 });
 
 
 
          var geocoder = new google.maps.Geocoder();

        document.getElementById('submit').addEventListener('click', function() {
          geocodeAddress(geocoder, map);
        });
			
			
        }
          function geocodeAddress(geocoder, resultsMap) {
        var address = document.getElementById('address').value;
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
          
          } else {
            alert('Endereco invalido!');
          }
        });
      }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAU1iWt56jb-l8neUJh4dcGwWRfsXKpPg8&callback=initMap"
        async defer></script>
		  </div>
		 
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
		
		
	</body>
	
</html>