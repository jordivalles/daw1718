<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="Author" content="Jordi Valles Noguera">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>disseny/css/reset.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>disseny/css/index.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	<title>Registre</title>
	<style>
		label{
			display: block;
		}
		a{
			display: block;
			width: 50%;
			margin: 0 auto;
			margin-top: 10px;
		}
		b{
			font-size: 20px;
		}
	</style>
</head>  
<body>

    <?php
        if(isset($error)){
            echo "<p class='alert alert-warning'>".$error."</p>";
        }
        if(isset($exit)){
            echo "<p class='alert alert-success'>".$exit."</p>";
        }
    ?>
	<div class="login">
		<form name="f1" id="fRegistre" method="post" action="<?php echo site_url('Index/checkRegistre');?>">
		  <b>Indica les teves dades per completar el registre</b>
		  <div class="form-group">
			<label for="fmail">Correu electrònic</label>
			<input type="text" id="fmail" name="fmail" value="<?php if(isset($mail)){echo $mail;}?>" placeholder="Correu electrònic"/>
		  </div>
		  <div class="form-group">
			<label for="fpw1">Contrasenya</label>
			<input type="password" id="fpw1" name="fpw1" value="<?php if(isset($pw1)){echo $pw1;}?>"/>
		  </div>
		  <div class="form-group">
			<label for="fpw2">Repeteix la contrasenya</label>
			<input type="password" id="fpw2" name="fpw2" value="<?php if(isset($pw2)){echo $pw2;}?>"/>
		  </div>
		  <div class="form-group">
			<label for="fnom">Nom d'usuari</label>
			<input type="text" id="fnom" name="fnom" value="<?php if(isset($nom)){echo $nom;}?>"/>
		  </div>
		  <button type="submit" class="btn btn-primary">Registrar</button>
		</form>
	</div>
	
	<a href="<?php echo site_url('Index/index');?>">Torna enrere</a>
  
</body>   
</html>