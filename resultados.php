<!DOCTYPE html>
<?php
ini_set('display_errors', true);
error_reporting(E_ALL);

//CONEXAO COM BANCO DE DADOS
require_once 'conexaoDB_1.php';
//CLASSE CONTEUDO
require_once 'conteudo.php';


?>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> PHP - Fase 3 - BANCO DE DADOS</title>

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

// URL BASE
/*
$url = $_SERVER['HTTP_HOST'] . "/projetos/fase3/";
$rota = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$path = str_replace("/projetos/fase3/", "", $rota['path']); 
*/
if(isset($_GET['pag'])) {$pag=$_GET['pag'];} else {$pag='home';}
?>

<div style="width: 960px; border:1px grey solid; margin:0 auto; ">

<!-- MENU -->
<?php require_once("menu.php"); ?>
<hr>
<?php require_once("busca.php"); ?>
<hr>
<!-- CONTEÚDO -->
<p> 
<?php  
/**** BANCO DE DADOS - CONTEUDO ****/

$palavra = trim($_POST['palavra']);

$conteudo = new Conteudo($conexao);
$resultado = $conteudo->buscar($palavra);
//echo $resultado[0]['conteudo'] . "<br/>";
$count = count($resultado);
?>

<table style="width:100%">
  <tr>
    <th>ID</th>
    <th>Nome</th> 
    <th>Conteudo</th>
  </tr>
    <?php
if(isset($count) AND $count > 0){
    for($x = 0; $x < $count; $x++){
        echo '<tr>';
        echo "<td>" . $resultado[$x]['id'] . "<td>" . $resultado[$x]['nome'] . "<td>"  . $resultado[$x]['conteudo'] . "<td>"  .  "<br/>";
        echo '</tr>';
    }
}
#echo $resultado;
?>
    
</table>

</p>
<!-- RODAPÉ -->
<?php require_once("rodape.php"); ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>