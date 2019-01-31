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
		if(isset($exit)){
            echo "<p class='alert alert-success'>".$exit."</p>";
        }
	
	?>
	<div class="login">
        
        <form name="f1" id="fLogin" method="post" action="<?php echo site_url('Index/checkRegistre');?>">
          <div class="form-group">
            <label for="fmail">DNI</label>
            <input type="text" class="form-control" id="fdni" name="fdni" value="<?php if(isset($dni)){echo $dni;}?>" placeholder="DNI">
          </div>
          <div class="form-group">
            <label for="fpw">Nom</label>
            <input type="text" class="form-control" id="fnom" name="fnom" value="<?php if(isset($nom)){echo $nom;}?>" placeholder="Nom">
          </div>
		  <div class="form-group">
            <label for="fpw">Nombre de persones a apuntar:</label>
            <input type="number" class="form-control" id="fnum" name="fnum" value="<?php if(isset($num)){echo $num;}?>" placeholder="Núm">
          </div>
		  
		  <?php
		  
			if(isset($correcte)){
				if($correcte==true){
					echo "<input type='hidden' name='enviat' value='enviat' />";
					for ($i=0; $i<$num; $i++){
						echo "<div class='form-group'>
								<label for='fmembre".($i+1)."'>Nom membre ".($i+1)."</label>
								<input type='text' class='form-control' id='fmembre".($i+1)."' name='fmembre".($i+1)."' placeholder='Nom'>
							  </div>
							  <div class='form-group'>
								<label for='fdate".($i+1)."'>Data de naixement</label>
								<input type='date' class='form-control' id='fdate".($i+1)."' name='fdate".($i+1)."' placeholder='Date'>
							  </div>";
					}
				}
			}
		  
		  ?>
          <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
	
  
        <a href="<?php echo site_url('Index/index');?>">Torna a l'inici</a>
        
    </div>
</body>   
</html>