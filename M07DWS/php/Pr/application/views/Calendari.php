<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="Author" content="Jordi Valles Noguera">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	<title>Calendari Públic</title>
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
			width: 200px;
		}
	</style>
</head>  
<body>

    <?php
        
        if(count($reserves)!=0){
            
			echo "<h1>Agenda de concerts programats</h1>";
			
            
            //echo "<tr><td></td><td>Dilluns</td><td>Dimarts</td><td>Dimecres</td><td>Dijous</td><td>Divendres</td><td>Dissabte</td><td>Diumenge</td></tr>";
            
            //echo "<tr><td>20:00h</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";     
            
            for ($i=0; $i<count($reserves); $i++){
				$dataCompleta = explode('-', $reserves[$i]['dia']);
				$year = $dataCompleta[0];
				$month = $dataCompleta[1];
				$day = $dataCompleta[2];
				
				$myvalue = $reserves[$i]['dia']." ".$reserves[$i]['hinici'];
				$datetime = new DateTime($myvalue);

				$date = $datetime->format('Y-m-d');
				$time = $datetime->format('H:i');
				//echo $time;
				echo "<h2>Concert ".($i+1)."</h2>";
				echo "<table border='1'>";
                //echo "Nom: " . $departaments[$i][1] . "<br/>";
                echo "
				<tr>
					<th style='background-color: lightblue;'>Data</th>
					<td>".$day."";
					if($month==1){
						echo " de Gener";
					}else if($month==2){
						echo " de Febrer";
					}else if($month==3){
						echo " de Març";
					}else if($month==4){
						echo " d'Abril";
					}else if($month==5){
						echo " de Maig";
					}else if($month==6){
						echo " de Juny";
					}else if($month==7){
						echo " de Juliol";
					}else if($month==8){
						echo " d'Agost";
					}else if($month==9){
						echo " de Setembre";
					}else if($month==10){
						echo " d'Octubre";
					}else if($month==11){
						echo " de Novembre";
					}else if($month==12){
						echo " de Desembre";
					}
					echo " del ".$year."</td>";
				echo "
				</tr>
				<tr>
					<th style='background-color: lightblue;'>Artista</th>
					<td>".$reserves[$i]['nomArtistic']."</td>
				</tr>
				<tr>
					<th style='background-color: lightblue;'>Hora d'inici</th>
					<td>".$time."h</td>
				</tr>
				<tr>
					<th style='background-color: lightblue;'>Durada</th>
					<td>".$reserves[$i]['durada']."h</td>
				</tr>";
				echo "</table>";
            }
            
            
        }else{
            echo "<p class='alert alert-warning'>No hi ha cap calendari disponible</p>";
        }
    
    ?>
	<div class="calendari">
    
	</div>
    
  <br/><a href="<?php echo site_url('Index/index');?>">Tornar enrere</a>
  
</body>   
</html>