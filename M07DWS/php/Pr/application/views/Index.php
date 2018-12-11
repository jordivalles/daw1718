<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="Author" content="Jordi Valles Noguera">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	<title>Pàgina principal</title>
</head>  
<body>
	<?php
		if(isset($error)){
			echo "<p class='alert alert-warning'>".$error."</p>";
		}
	
	?>
	<div class="login">
    <form name="f1" id="fLogin" method="post" action="<?php echo site_url('Index/checkLogin');?>">
		<b>Introdueix les teves credencials</b><br/>
		<label for="fmail">Correu electrònic</label>
		<br/><input type="text" id="fmail" name="fmail"/>
		<br/>
		<label for="fpw">Contrasenya</label>
		<br/><input type="password" id="fpw" name="fpw"/>
		<br/>
		<input type="submit" id="fsub" name="fsub" value="Entra"/>
    </form>
	</div>
  
  <br/><a href="<?php echo site_url('Index/loadRegistre');?>">Encara no tens un compte? Registra't aquí!</a><br/>
  <br/><a href="<?php echo site_url('Index/cpublic');?>">Vull veure la informació sense registrar-se.</a>
</body>   
</html>