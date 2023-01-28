<!DOCTYPE html>
<html>
	<title>Login</title>
	<head>      
		
		<link href="css/login.css" rel="stylesheet">
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
		<form action="login-usuario.php" method="post">
				<h1>Login</h1>
		   <div class="lable-2">
		        <label>Email</label><input type="text" class="text" name="email">
		        
		   </div>
			
			<div class="lable-2">
		        <label>Senha</label><input type="password" class="text" name="senha">
		        
		   </div>
		   <p>Nao possui conta? <a href="cadastro-usuario.php">Cadastre-se</a></p>
		   <div class="submit">
			   <br>
			  <input type="submit" value="Entrar" name="entrar" >
		   </div>
		   <div class="clear"> </div>
		</form>
		</div>

		
		
	</body>
	
</html>