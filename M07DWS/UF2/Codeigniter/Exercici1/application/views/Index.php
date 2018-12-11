<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="Author" content="Jordi Valles Noguera">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>disseny/css/reset.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>disseny/css/index.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <!--link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <script src="< ?php echo base_url(); ?>/js/jquery-ui-1.12.1.custom/external/jquery/jquery.js"></script>
    <script src="< ?php echo base_url(); ?>/js/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script type="text/javascript" language="javascript" src="< ?php echo base_url(); ?>js/font.js"></script-->
    <title>Pàgina principal</title>
</head>  
<body>
	<?php
    
        var_dump($departaments);
        
        
        var_dump($departaments2);
        
        
		if(isset($departaments)){
            echo "<br/>Consulta 1: <br/>";
            foreach($departaments as $dpts){
                echo "Id: " .$dpts["id"]. " Nom: ".$dpts["nom"]."<br/>";
            }
            //echo $departaments;
		}
        
        if(isset($departaments2)){
            echo "Consulta 2: <br/>";
            for ($i=0; $i<count($departaments2); $i++){
                echo "Id: " .$departaments2[$i]["id"]. " Nom: " . $departaments2[$i]["nom"] . "<br/>";
            }
            //echo $departaments2;
		}
	
	?>
</body>   
</html>