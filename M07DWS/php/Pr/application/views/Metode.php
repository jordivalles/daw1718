<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<style>
	</style>
	<meta charset="UTF-8">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="Author" content="Jordi Valles Noguera">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	<title>Menu</title>
</head>  
<body>

	<p>Has elegit el mètode <?php echo $this->session->metode;?>. Torna al menú principal per a canviar de mètode.</p>
  
  <p>Llistat de departaments:</p>
  <?php
	
	//Departaments
	if(count($departaments)!=0){
		
		echo "<table border='1'>";
		echo "<tr><td>Codi</td><td>Nom</td><td>Modificar</td><td>Eliminar</td></tr>";
		
		for ($i=0; $i<count($departaments); $i++){
		  //echo "Nom: " . $departaments[$i][1] . "<br/>";
		  echo "<tr>
			<td style='background-color: lightblue;'>".$departaments[$i][0]."</td>
			<td>".$departaments[$i][1]."</td>
			<td><a href=".site_url('Menu/loadModificationDpt/'.$departaments[$i][0]).">Modifica</a></td>
			<td><a href=".site_url('Menu/deleteDpt/'.$departaments[$i][0]).">Elimina</a></td>
		  </tr>";
		}
		
		echo "</table>";
		
	}else{
		echo "<p class='alert alert-warning'>No s'han pogut trobar resultats de departaments</p>";
	}
    
	?>
  
  <br/>
  <a href="<?php echo site_url('Menu/loadInsertDpt'); ?>">Afegeix un departament</a>
  <br/><br/>
  
  <?php
  //Empleats
	if(count($empleats)!=0){
		
		echo "<table border='1'>";
		echo "<tr><td>Codi</td><td>Nom</td><td>Càrrec</td><td>Departament</td><td>Modificar</td><td>Eliminar</td></tr>";
		
		for ($i=0; $i<count($empleats); $i++){
		  echo "<tr>
			<td style='background-color: lightblue;'>".$empleats[$i][0]."</td>
			<td>".$empleats[$i][1]."</td>
			<td>".$empleats[$i][2]."</td>
			<td>".$empleats[$i][3]."</td>
			<td><a href=".site_url('Menu/loadModificationEmp/'.$empleats[$i][0]).">Modifica</a></td>
			<td><a href=".site_url('Menu/deleteEmp/'.$empleats[$i][0]).">Elimina</a></td>
		  </tr>";
		}
		
		echo "</table>";
		
	}else{
		echo "<p class='alert alert-warning'>No s'han pogut trobar resultats de empleats</p>";
	}
    
  ?>
  
  <br/>
  <a href="<?php echo site_url('Menu/loadInsertEmp'); ?>">Afegeix un empleat</a>
  <br/><br/>
  <a href="<?php echo site_url('Menu/index'); ?>">Torna al menú principal</a>

  
  
</body>   
</html>