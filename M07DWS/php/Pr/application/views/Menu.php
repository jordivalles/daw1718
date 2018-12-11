<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<style>
	</style>
	<meta charset="UTF-8">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="Author" content="Jordi Valles Noguera">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	<title>Menú d'Artistes</title>
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
	
	<h1>Benvingut Artista!</h1>
	<h2>Les teves reserves</h2>
	<?php
		if(count($reserves)!=0){
            
            echo "<table border='1'>";
			
            echo "<tr><th></th><th>Data</th><th>Hora d'inici</th><th>Durada</th></tr>";
            
            for ($i=0; $i<count($reserves); $i++){
                //echo "Nom: " . $departaments[$i][1] . "<br/>";
				$dataCompleta = explode('-', $reserves[$i]['dia']);
				$year = $dataCompleta[0];
				$month = $dataCompleta[1];
				$day = $dataCompleta[2];
				
				$myvalue = $reserves[$i]['dia']." ".$reserves[$i]['hinici'];
				$datetime = new DateTime($myvalue);

				$date = $datetime->format('Y-m-d');
				$time = $datetime->format('H:i');
				
                echo "<tr>
				<td style='background-color: orange;'>Data reservada ".($i+1)."</td>
                <td>".$day."/".$month."/".$year."</td>
                <td>".$time."h</td>
                <td>".$reserves[$i]['durada']."h</td>
                <td><a href=".site_url('Menu/modificarReserva/'.$reserves[$i]["id"].'/'.$reserves[$i]["dia"].'/'.$reserves[$i]["hinici"].'/'.$reserves[$i]["durada"]).">Modificar Reserva</a></td>
                <td><a href=".site_url('Menu/eliminarReserva/'.$reserves[$i]["id"].'/'.$reserves[$i]["dia"]).">Eliminar Reserva</a></td>
                </tr>";
            }
            
            echo "</table>";
        }else{
            echo "<p class='alert alert-warning'>Encara no tens cap data reservada</p>";
        }
	?>
	
    <h2>Selecciona una data disponible per a fer un concert</h2>
	
	<form name="f1" id="fReserva" method="post" action="<?php echo site_url('Menu/reservarData');?>">
		
		<?php
		
			if(count($disponibles)!=0){
				echo "<label for='fdate'>Elegeix una data</label>";
				echo "<input list='dataEscollida' name='fdate' id='fdate'/>";
				echo "
				<datalist id='dataEscollida'>";
				for($i=0;$i<count($disponibles);$i++){
					echo "<option value=".$disponibles[$i]['dia'].">";
				}
				echo "
				</datalist><br/>";
			}else{
				echo "<p class='alert alert-warning'>No hi ha cap data disponible per a reservar</p>";
			}
			
		
		?>
		<label for="fhora">Hora d'inici</label>
		<input type="time" id="fhora" name="fhora" value="<?php if(isset($hora)){echo $hora;} ?>"required /><br/>
		<label for="fdurada">Indica la durada aproximada (en hores)</label>
		<input type="number" id="fdurada" name="fdurada" value="<?php if(isset($durada)){echo $durada;} ?>"required /><br/>
		<input type="submit" id="fsub" name="fsub" value="Reservar" />
	</form>
	
	<?php
		if(isset($error)){
			echo "<p class='alert alert-warning'>".$error."</p>";
		}
	?>
	<br/><br/>
	<a href="<?php echo site_url('Index/index'); ?>">Torna al menú principal</a>

  
  
</body>   
</html>