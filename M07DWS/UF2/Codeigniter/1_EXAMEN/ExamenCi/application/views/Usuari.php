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
		td{
			//width: 150px;
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
	</style>
</head>  
<body>
	
	<div class="pagina">
		<h1>Benvingut!</h1>
		<h2>Preguntes sense respondre</h2>
		
		<form name="f1" id="fData" method="post" action="<?php echo site_url('Usuari/respondrePregunta');?>">
            
            <div class="form-group">
                <label for="fpregunta">Categoria de la pregunta</label>
                <select name="fpregunta" id="fpregunta">
                <?php
                    
                    for ($i=0; $i<count($preguntes); $i++){
                        echo "<option value='".$preguntes[$i]['id']."'>".$preguntes[$i]['text']."</option>";
                    }
                    
                ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="fresposta">Text de la pregunta</label>
                <input type="text" id="fresposta" name="fresposta" required placeholder="Resposta"/>
            </div>
            
            <button type="submit" class="btn btn-primary">Respondre</button>
        </form>
        
        
        <div class="llista">
		
			<h2>Preguntes respostes</h2>
			
			<?php
				if(count($preguntesRespostes)!=0){
					
					echo "<table border='1'>";
					
					echo "<tr><th>Pregunta</th><th>Resposta</th></tr>";
					
					for ($i=0; $i<count($preguntesRespostes); $i++){
						echo "<tr>
						<td>".$preguntesRespostes[$i]['text']."</td>
						<td>".$preguntesRespostes[$i]['resposta']."</td></tr>";
					}
					
					echo "</table>";
				}else{
					echo "<p class='alert alert-warning'>No tens cap pregunta resposta</p>";
				}
			?>
			
		</div>
        
		<?php
			if(isset($error)){
				echo "<p class='alert alert-warning'>".$error."</p>";
			}
			if(isset($exit)){
				echo "<p class='alert alert-success'>".$exit."</p>";
			}
		?>
	
	</div>
	
	<a class="out" href="<?php echo site_url('Index/index'); ?>">Torna al menú principal</a>  
  
</body>   
</html>