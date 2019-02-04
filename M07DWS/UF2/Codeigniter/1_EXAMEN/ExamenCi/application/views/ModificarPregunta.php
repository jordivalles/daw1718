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
		b{
			font-size: 22px;
		}
        form{
            margin-top: 15px;
        }
		button{
            margin-top: 15px;
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
        #ftext{
            width: 100%;
        }
	</style>
</head>  
<body>
	
	<div class="pagina">
		<b>Modifica la pregunta</b>
		
        <form name="f1" id="fCurs" method="post" action="<?php echo site_url('Admin/updatePregunta');?>">
		<?php
            
            for ($i=0; $i<count($dades); $i++){
                echo "
                <input type='hidden' name='fid' id='fid' value='".$dades[$i]['id']."' readonly=true/>
                <div class='form-group'>
                    <label for='ftext'>Text de la pregunta</label>
                    <input type='text' name='ftext' id='ftext' value='".$dades[$i]['text']."'/>
                </div>
                <div class='form-group'>
					<label for='fcategoria'>Categoria de la pregunta</label>
					<select name='fcategoria' id='fcategoria'>";
                       for ($j=0; $j<count($categories); $j++){
                           if($categories[$j]['id']==$dades[$i]['categoria']){
                               echo "<option value='".$categories[$j]['id']."' selected>".$categories[$j]['nom']."</option>";
                           }else{
                               echo "<option value='".$categories[$j]['id']."'>".$categories[$j]['nom']."</option>";
                           }
						}
                echo "
                    </select>
                </div>    
                ";
            }
        
		?>
            <button type="submit" class="btn btn-primary btn-sm">Actualitzar</button>
        </form>
        
		<?php
			if(isset($error)){
				echo "<p class='alert alert-warning'>".$error."</p>";
			}
		?>
	
	</div>
	
	<a class="out" href="<?php echo site_url('Admin/index'); ?>">Tornar enrere</a>

  
  
</body>   
</html>