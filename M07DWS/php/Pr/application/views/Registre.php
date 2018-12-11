<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="Author" content="Jordi Valles Noguera">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	<title>Registre</title>
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
      <b>Indica les teves dades per completar el registre</b><br/>
      <label for="fmail">Correu electrònic</label>
      <br/><input type="text" id="fmail" name="fmail" value="<?php if(isset($mail)){echo $mail;}?>"/>
      <br/>
      <label for="fpw1">Contrasenya</label>
      <br/><input type="password" id="fpw1" name="fpw1" value="<?php if(isset($pw1)){echo $pw1;}?>"/>
      <br/>
      <label for="fpw2">Repeteix la contrasenya</label>
      <br/><input type="password" id="fpw2" name="fpw2" value="<?php if(isset($pw2)){echo $pw2;}?>"/>
      <br/>
	  <label for="fnom">Nom artístic</label>
      <br/><input type="text" id="fnom" name="fnom" value="<?php if(isset($nom)){echo $nom;}?>"/>
      <br/>
      <input type="submit" id="fsub" name="fsub" value="Registrar"/>
    </form>
	</div>
  <br/><a href="<?php echo site_url('Index/index');?>">Torna enrere</a>
</body>   
</html>