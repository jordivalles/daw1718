<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<style>
	</style>
	<meta charset="UTF-8">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="Author" content="Jordi Valles Noguera">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	<title>Menú propietari</title>
	<style>
		body{
			background-color: #ededed;
		}
		label{
			display: block;
		}
		.pagina{
			background-color: #fff;
			width: 95%;
			margin: 0 auto;
			margin-top: 10px;
			border: 1px solid #aaa5a5;
			padding: 20px;
		}
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
		.taula1 td{
			width: 150px;
		}
		.out{
			display: block;
			width: 95%;
			margin: 0 auto;
			margin-top: 10px;
		}
		.alert{
			margin-top: 20px;
		}
        table.calendar{
            margin: auto;
			margin-top: 50px;
            border-collapse: collapse;            
        }
        .calendar .days td{
            width: 200px;
            height: 100px;
            padding: 4px;
            border: 1px solid black;
            vertical-align: top;
            background-color: #DEF;
        }
        .calendar .days td:hover{
            background-color: #FFF;
        }
        .calendar .highlight{
            font-weight: bold;
            color: #00F;
        }
		.titol, .dies{
			text-align: center;
		}
	</style>
</head>  
<body>
	
	<div class="pagina">
		<h1>Benvingut!</h1>
		<h2>Els teus cursos</h2>
		
		<?php
			if(count($cursos)!=0){
				
				echo "<table border='1' class='taula1'>";
				
				echo "<tr><th>Id</th><th>Títol</th><th>Data d'inici</th><th>Hores totals</th><th>Hores setmanals</th><th>Estat</th></tr>";
				
				for ($i=0; $i<count($cursos); $i++){
					echo "<tr>
					<td>".$cursos[$i]['id']."</td>
					<td>".$cursos[$i]['titol']."</td>
					<td>".$cursos[$i]['datainici']."</td>
					<td>".$cursos[$i]['htotals']."</td>
					<td>".$cursos[$i]['hsetmanals']."</td>";
					if($cursos[$i]['estat']==0){
						echo "<td style='background-color: #DAA520;'>No visible</td>";
					}else if($cursos[$i]['estat']==1){
						echo "<td style='background-color: #ADFF2F;'>Visible</td>";
					}
					echo "<td><a href=".site_url('Propietari/modificarCurs/'.$cursos[$i]['id']).">Personalitzar</a></td>";
					echo "<td><a href=".site_url('Propietari/generarCalendari/'.$cursos[$i]['id']).">Generar calendari</a></td></tr>";
				}
				
				echo "</table>";
			}else{
				echo "<p class='alert alert-warning'>Encara no tens cap curs assignat.</p>";
			}
		?>
		
		<?php
			if(isset($error)){
				echo "<p class='alert alert-warning'>".$error."</p>";
			}
			if(isset($exit)){
				echo "<p class='alert alert-success'>".$exit."</p>";
			}
		?>
        
        <?php
			if(isset($calendari)){
				echo $calendari;
			}
		?>
        
	</div>
	
	<a class="out" href="<?php echo site_url('Index/index'); ?>">Torna al menú principal</a>  
  
</body>   
</html>