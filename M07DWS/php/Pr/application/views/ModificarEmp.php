<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="Author" content="Jordi Valles Noguera">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	<title>Modificar departament</title>
</head>  
<body>
	<div class="menu">
		<h4>Canvia les dades</h4>
		<form name="f1" id="fMenu" method="post" action="<?php echo site_url('Menu/modifieEmp');?>">
		<?php
			echo "<table border='1'>";
			echo "<tr><td>Codi</td><td>Nom</td><td>Càrrec</td><td>Departament</td></tr>";
			
			if($this->session->metode=='PDO' || $this->session->metode=='ADODB'){
				for ($i=0; $i<count($valors); $i++){
					echo "<tr>
							<td><input type='number' id='idEmp' name='idEmp' value=".$valors[$i][0]." readOnly=true style='background-color: lightblue;'/></td>
							<td><input type='text' id='nomEmp' name='nomEmp' value='".$valors[$i][1]."'/></td>
							<td><input type='text' id='carrec' name='carrec' value='".$valors[$i][2]."'/></td>";
          echo "<td><select id='idDpt' name='idDpt'>";
            for ($j=0; $j<count($ids); $j++){
              if($valors[$i][3]!=$ids[$j][0]){
                echo "<option>".$ids[$j][0]."</option>";
              }else{
                echo "<option selected='selected'>".$ids[$j][0]."</option>";
              }
            }
          echo "</select></td>";    
					echo "</tr>";
				}
			}else if($this->session->metode=='MYSQLI'){
				echo $valors;
			}else if($this->session->metode=='ODBC'){
				echo $valors;
			}
			echo "</table>";
		
		?>

			<input type="submit" class="btn" id="btn" name="btn" value="Modifica"/>
		</form>
	</div>
	<a href="<?php echo site_url('Menu/getTables'); ?>">Torna enrere</a>
</body>   
</html>