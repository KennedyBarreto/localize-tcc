<!DOCTYPE html>
<html>
	<title>Cadastro de Usuario</title>
	<head>      
		
		<link href="css/cadastro-usuarionovo.css" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
		
	</head>
	
	<body>
		
		<div class="wrapper">
            <header>

                  <nav> 

                        <div class="logo">
                              <a href="index.php"><img src="img/logo.png"></a>
                        </div>

                        <div class="menu">
                              <ul>
                                    <li><a href="index.php"><i class="fas fa-home"></i></a></li>
                
                              </ul>
                        </div>
                  </nav>

            </header>
		</div>
		
		<div class="main">
		<form method="post" action="efetuar-cadastro-usuario.php">
				<h1>Cadastro de Usuario</h1>
		   <div class="lable">
			   
		        <div class="col_1_of_2 span_1_of_2"><label>Nome</label><input type="text" class="text" name="nome"></div>
                <div class="col_1_of_2 span_1_of_2"><label>Sobrenome</label><input type="text" class="text" name="sobrenome"></div>
                <div class="clear"> </div>
		   </div>
		   <div class="lable-2">
		        <label>Email</label><input type="text" class="text" name="email">
		        
		   </div>
			
			<div class="lable-2">
		        <label>Senha</label><input type="password" class="text" name="senha">
		        
		   </div>
		   <div class="lable-3">
		        <label>Confirme a Senha</label><input type="password" class="text" name="senha2">
		        
		   </div>
		   <p>Ja possui conta? <a href="login.php">Entre</a></p>
		   <div class="submit">
			   <br>
			  <input type="submit" value="Cadastrar-me" >
		   </div>
		   <div class="clear"> </div>
		</form>
		</div>

		
		
	</body>
	
</html>