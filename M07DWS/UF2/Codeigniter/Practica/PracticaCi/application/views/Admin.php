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
			width: 150px;
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
	</style>
</head>  
<body>

	<div class="pagina">
	
		<div class="formulari">
		
			<h1>Benvingut al menú administrador</h1>
			<h2>Gestiona els cursos</h2>
			
			
			<form name="f1" id="fData" method="post" action="<?php echo site_url('Admin/crearCurs');?>">
				<div class="form-group">
					<label for="fid">Identificador del curs</label>
					<input type="text" id="fid" name="fid" required placeholder="Id"/>
				</div>
				<div class="form-group">
					<label for="fpropietari">Propietari del curs</label>
					<select name="fpropietari" id="fpropietari">
					<?php
						
						for ($i=0; $i<count($propietaris); $i++){
							echo "<option value='".$propietaris[$i]['id']."'>".$propietaris[$i]['nom']."</option>";
						}
						
					?>
					</select>
				</div>
				<!--input type="text" id="fpropietari" name="fpropietari" required placeholder="Propietari"/><br/-->
				<button type="submit" class="btn btn-primary">Crear</button>
			</form>
		
			<?php
				if(isset($error)){
					echo "<p class='alert alert-warning'>".$error."</p>";
				}
			?>
			
		</div>
		
		<div class="llista">
		
			<h2>Cursos creats</h2>
			
			<?php
				if(count($cursos)!=0){
					
					echo "<table border='1'>";
					
					echo "<tr><th>Identificador</th><th>Propietari</th><th>Estat</th></tr>";
					
					for ($i=0; $i<count($cursos); $i++){
						echo "<tr>
						<td style='background-color: #F5F5DC;'>".$cursos[$i]['id']."</td>
						<td>".$cursos[$i]['nom']."</td>";
						if($cursos[$i]['estat']==0){
							echo "<td style='background-color: #DAA520;'>No visible</td>
							</tr>";
						}else if($cursos[$i]['estat']==1){
							echo "<td style='background-color: #ADFF2F;'>Visible</td>
							</tr>";
						}
						
					}
					
					echo "</table>";
				}else{
					echo "<p class='alert alert-warning'>No hi ha cap curs creat</p>";
				}
			?>
			
		</div>
		
	</div>
		
	<a href="<?php echo site_url('Index/index');?>">Tancar la sessió</a>
	
</body>   
</html>




