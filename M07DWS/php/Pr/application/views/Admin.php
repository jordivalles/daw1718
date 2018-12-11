<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="Author" content="Jordi Valles Noguera">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	<title>Menú administrador</title>
	<style>
		h1{
			font-size: 26px;
		}
		h2{
			font-size: 22px;
			margin-top: 10px;
		}
		p{
			font-size: 18px;
		}
		td{
			width: 150px;
		}
	</style>
</head>  
<body>

	<h1>Benvingut al menú administrador</h1>
    <h2>Gestiona les reserves</h2>
	
	
	<form name="f1" id="fData" method="post" action="<?php echo site_url('Admin/habilitarData');?>">
		<label for="fdate">Indica una data per a que pugui ser reservada</label>
		<input type="date" id="fdate" name="fdate" value="<?php if(isset($data)){echo $data;} ?>"required /><br/>
		<input type="submit" id="fsub" name="fsub" value="Habilitar" />
	</form>
	
	<?php
		if(isset($error)){
			echo "<p class='alert alert-warning'>".$error."</p>";
		}
	?>
	
	<h2>Dates disponibles</h2>
	<?php
		if(count($disponibles)!=0){
            
            echo "<table border='1'>";
			
            echo "<tr><th></th><th>Dia</th><th>Mes</th><th>Any</th></tr>";
            
            for ($i=0; $i<count($disponibles); $i++){
                //echo "Nom: " . $departaments[$i][1] . "<br/>";
				$dataCompleta = explode('-', $disponibles[$i]['dia']);
				$year = $dataCompleta[0];
				$month = $dataCompleta[1];
				$day = $dataCompleta[2];
                echo "<tr>
				<td style='background-color: lightblue;'>Data disponible ".($i+1)."</td>
                <td>".$day."</td>
                <td>".$month."</td>
                <td>".$year."</td>
                </tr>";
            }
            
            echo "</table>";
        }else{
            echo "<p class='alert alert-warning'>No hi ha cap data disponible</p>";
        }
	?>
	<br/><br/><a href="<?php echo site_url('Index/index');?>">Tornar enrere</a>
  
</body>   
</html>




