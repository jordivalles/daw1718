<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="Author" content="Jordi Valles Noguera">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>disseny/css/reset.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>disseny/css/index.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <!--link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <script src="< ?php echo base_url(); ?>/js/jquery-ui-1.12.1.custom/external/jquery/jquery.js"></script>
    <script src="< ?php echo base_url(); ?>/js/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script type="text/javascript" language="javascript" src="< ?php echo base_url(); ?>js/font.js"></script-->
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
          <div class="form-group">
            <label for="fnom">Nom</label>
            <input type="text" class="form-control" id="fnom" name="fnom" placeholder="Nom">
          </div>
          <div class="form-group">
            <label for="fpw">Contrasenya</label>
            <input type="password" class="form-control" id="fpw" name="fpw" placeholder="Contrasenya">
          </div>
          <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
	
  
        <a href="<?php echo site_url('Index/loadRegistre');?>">Encara no tens un compte? Registra't aquí!</a>
        
    </div>
</body>   
</html>