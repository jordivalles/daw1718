<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="Author" content="Jordi Valles Noguera">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	<title>Afegir empleat</title>
</head>  
<body>
	<div class="menu">
		<h4>Introdueix les dades</h4>
		<form name="f1" id="fMenu" method="post" action="<?php echo site_url('Menu/insertEmp');?>">
			Nom del nou empleat:<br/><input type="text" id="nomemp" name="nomemp"/><br/>
			Càrrec:<br/><input type="text" id="carrec" name="carrec"/><br/>
      <?php 
        if($this->session->metode=='PDO' || $this->session->metode=='ADODB'){
          echo "Departament: <br/><select id='ndpt' name='ndpt'>";
            for ($i=0; $i<count($ids); $i++){
              echo "<option>".$ids[$i][0]."</option>";
            }
          echo "</select><br/>";
        }else if($this->session->metode=='MYSQLI'){
          echo $ids;
        }else if($this->session->metode=='ODBC'){
          echo $ids;
        }
        
      ?>
			<input type="submit" class="btn" id="btn" name="btn" value="Crea"/>
		</form>
	</div>
	<a href="<?php echo site_url('Menu/getTables'); ?>">Torna enrere</a>
</body>   
</html>