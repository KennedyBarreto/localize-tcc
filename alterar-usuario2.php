<?PHP
session_start();

$email = $_SESSION['email'];
$nome = $_SESSION['nome'];
$sobrenome = $_SESSION['sobrenome'];
$id_usuario = $_SESSION['id_usuario'];

$db = mysqli_connect("localhost", "root", "usbw", "localize");
$result = mysqli_query($db, "SELECT*FROM usuario
WHERE id_usuario ='$id_usuario'");
?>
<!DOCTYPE html>
<html>
	<title>Cadastro de Usuario</title>
	<head>      
		
		<link href="css/cadastro-usuario.css" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
		
	</head>
	
	<body>
		
		<div class="wrapper">
            <header>

                  <nav> 

                        <div class="logo">
                              <a href="index2.php"><img src="img/logo.png"></a>
                        </div>

                        <div class="menu">
                              <ul>
                                    <li><a href="index2.php"><i class="fas fa-home"></i></a></li>
                
                              </ul>
                        </div>
                  </nav>

            </header>
		</div>
		
		<div class="main">
		<form method="post" action="efetuar-alterar-usuario.php " enctype="multipart/form-data">
				
			
			<div class="imgperfil">
				
				<?php
    while ($row = mysqli_fetch_array($result)) {
		// Verificar se é nulo, se for exibir imagem padrão
	
      	echo "<img src='images/".$row['image']."' class='perfil' >";
    }
	
  ?>
				<br><p>Imagem de perfil</p>
			</div>
  	
  	<div>
		
		<label class="imgperfil">
   			 <i class="fas fa-pen"></i>
   		 <input type="file" name="image" style="display:none">
			<input type="hidden" name="size" value="1000000">
		</label>
  	</div>
  	<input type="hidden" name="id_usuario" value="<?PHP echo($id_usuario); ?>" />
 
	<br><br>
			<h1>Alteracao de Usuario</h1>
			
		   <div class="lable">
			   
		        <div class="col_1_of_2 span_1_of_2"><label>Nome</label><input type="text" class="text" value="<?PHP echo($nome); ?>" name="nome"></div>
                <div class="col_1_of_2 span_1_of_2"><label>Sobrenome</label><input type="text" class="text" value="<?PHP echo($sobrenome); ?>" name="sobrenome"></div>
                <div class="clear"> </div>
		   </div>
		   <div class="lable-2">
		        <label>Email</label><input type="text" class="text" value="<?PHP echo($email); ?>" name="email">
		        
		   </div>
			
			<div class="lable-2">
		        <label>Senha</label><input type="password" class="text" name="senha">
		        
		   </div>
				<input type="hidden" value="<?PHP echo($id_usuario); ?>" name="id_usuario">
		   <div class="submit">
			   <br>
			  <input type="submit" value="Alterar" >
		   </div>
		   <div class="clear"> </div>
		</form>
			
			
			
		</div>

		
		
	</body>
	
</html>