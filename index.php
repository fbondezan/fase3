<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> PHP - Fase 2</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    

<?php

$absurl = $_SERVER['HTTP_HOST'];
$comp = "/projetos/fase2/";
$url = $absurl . $comp;

$paginas = array("home", "empresa", "produtos", "servicos", "contato");

$rota = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

$path = str_replace("/projetos/fase2/", "", $rota['path']); 

//echo $_SERVER['HTTP_HOST'] . "<br/>"; 
//echo $_SERVER['REQUEST_URI'] . "<br/>";
//print_r($rota) . "<br/>";
//echo $path . "<br/>";
//echo $url . "<br/>";

if(in_array($path, $paginas) && file_exists($path.".php")){
    $pag = $path . ".php";
} else {
    $pag = "404.php";  
    header('Página não encontrada', true, 404);
}
?>

<div style="width: 960px; border:1px grey solid; margin:0 auto; ">

<!-- MENU -->
<?php require_once("menu.php"); ?>

<!-- CONTEÚDO -->
<p> <?php require_once("$pag"); ?> </p>

<p> <?php //if(include_once("$pag")){ echo "a";  }else{require_once("home.php"));} ?> </p>

<?php require_once("rodape.php"); ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>