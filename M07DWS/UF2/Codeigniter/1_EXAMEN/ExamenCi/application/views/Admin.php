<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="Author" content="Jordi Valles Noguera">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	<title>Menú administrador</title>
	<style>
		body{
			background-color: #ededed;
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
		td{
			//width: 150px;
		}
		label{
			display: block;
		}
		.pagina{
			background-color: #fff;
			width: 95%;
			margin: 0 auto;
			margin-top: 10px;
		}
		a{
			display: block;
			width: 95%;
			margin: 0 auto;
			margin-top: 10px;
		}
		.formulari{
			border: 1px solid #aaa5a5;
			padding: 20px;
		}
		
		.llista{
			border: 1px solid #aaa5a5;
			padding: 20px;
			margin-top: 10px;
		}
		#fsub{
			display: block;
			margin-top: 10px;
		}
		.alert{
			margin-top: 5px;
			margin-bottom: 5px;
		}
        #ftext{
            width: 100%;
        }
        .estat{
            width: 100%;
            margin: 0px;
        }
	</style>
</head>  
<body>

	<div class="pagina">
	
		<div class="formulari">
		
			<h1>Benvingut al menú administrador</h1>
			<h2>Crea una pregunta</h2>
			
			
			<form name="f1" id="fData" method="post" action="<?php echo site_url('Admin/crearPregunta');?>">
				<div class="form-group">
					<label for="ftext">Text de la pregunta</label>
					<input type="text" id="ftext" name="ftext" required placeholder="Pregunta"/>
				</div>
				<div class="form-group">
					<label for="fcategoria">Categoria de la pregunta</label>
					<select name="fcategoria" id="fcategoria">
					<?php
						
						for ($i=0; $i<count($categories); $i++){
							echo "<option value='".$categories[$i]['id']."'>".$categories[$i]['nom']."</option>";
						}
						
					?>
					</select>
				</div>
                <div class="form-group">
					<label for="festat">Estat</label>
					<select name="festat" id="festat">
							<option value="0">Desactivada</option>
							<option value="1">Activada</option>
					</select>
				</div>
				<button type="submit" class="btn btn-primary">Crear</button>
			</form>
		
			<?php
				if(isset($error)){
					echo "<p class='alert alert-warning'>".$error."</p>";
				}else if(isset($exit)){
                    echo "<p class='alert alert-success'>".$exit."</p>";
                }
			?>
			
		</div>
		
		<div class="llista">
		
			<h2>Preguntes existents</h2>
			
			<?php
				if(count($preguntes)!=0){
					
					echo "<table border='1'>";
					
					echo "<tr><th>Identificador</th><th>Pregunta</th><th>Categoria</th><th>Activa</th><th>Quantitat de vegades resposta</th></tr>";
					
					for ($i=0; $i<count($preguntes); $i++){
						echo "<tr>
						<td style='background-color: #F5F5DC;'>".$preguntes[$i]['id']."</td>
						<td>".$preguntes[$i]['text']."</td>
						<td>".$preguntes[$i]['nom']."</td>";
						if($preguntes[$i]['estat']==0){
							echo "<td style='background-color: #DAA520;'><a class='estat' href=".site_url('Admin/canviarEstat/'.$preguntes[$i]['id'].'/1').">Desactivada</a></td>";
						}else if($preguntes[$i]['estat']==1){
							echo "<td style='background-color: #ADFF2F;'><a class='estat' href=".site_url('Admin/canviarEstat/'.$preguntes[$i]['id'].'/0').">Activada</a></td>";
						}
                        echo "<td>".$preguntes[$i]['respostes']." cop(s)</td>";
						echo "<td><a href=".site_url('Admin/modificarPregunta/'.$preguntes[$i]['id']).">Modificar</a></td></tr>";
					}
					
					echo "</table>";
				}else{
					echo "<p class='alert alert-warning'>No hi ha cap curs creat</p>";
				}
			?>
			
		</div>
		
	</div>
		
	<a href="<?php echo site_url('Index/index');?>">Torna al menú principal</a>
	
</body>   
</html>




