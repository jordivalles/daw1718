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
			width: 150px;
		}
		.out{
			display: block;
			width: 95%;
			margin: 0 auto;
			margin-top: 10px;
		}
	</style>
</head>  
<body>
	
	<div class="pagina">
		<b>Personalitza el teu curs</b>
		
        <form name="f1" id="fCurs" method="post" action="<?php echo site_url('Propietari/updateCurs');?>">
		<?php
            echo "<table border='1'>";
            
            echo "<tr><th>Id</th><th>Títol</th><th>Data d'inici</th><th>Hores totals</th><th>Hores setmanals</th><th>Estat</th></tr>";
            
            for ($i=0; $i<count($dades); $i++){
                echo "<tr>
                <td style='background-color: #F5F5DC;'>".$dades[$i]['id']."<input type='hidden' name='ftitol' id='ftitol' value='".$dades[$i]['id']."' readonly=true/></td>
                <td><input type='text' name='ftitol' id='ftitol' value='".$dades[$i]['titol']."'/></td>
                <td><input type='date' name='fdatainici' id='fdatainici' value='".$dades[$i]['datainici']."'/></td>
                <td><input type='number' name='fhtotals' id='fhtotals' value='".$dades[$i]['htotals']."'/></td>
                <td><input type='number' name='fhsetmanals' id='fhsetmanals' value='".$dades[$i]['hsetmanals']."'/></td>";
                if($dades[$i]['estat']==0){
                    echo "<td style='background-color: #DAA520;'>No visible</td></tr>";
                }else if($dades[$i]['estat']==1){
                    echo "<td style='background-color: #ADFF2F;'>Visible</td></tr>";
                }
            }
            
            echo "</table>";
        
		?>
            <button type="submit" class="btn btn-primary btn-sm">Actualitzar</button>
        </form>
        
		<?php
			if(isset($error)){
				echo "<p class='alert alert-warning'>".$error."</p>";
			}
		?>
	
	</div>
	
	<a class="out" href="<?php echo site_url('Propietari/index'); ?>">Tornar enrere</a>

  
  
</body>   
</html>