<?php

session_start();

require_once('extra/classes/bd.class.php');
require('extra/classes/aula.class.php');
require('extra/classes/cliente.class.php');
require('extra/classes/presenca.class.php');
require('extra/classes/sensorbiometrico.class.php');
banco_mysql::conn();
$aulas = new Aulas();
$usuario = new Cliente();
$presenca = new Presenca();
$sensor = new SensorBiometrico();

  /* DIGITAL */

  $output = $sensor -> autenticaDigital();
  //echo $output;
  //$output = 'A'; para teste

  if ($output == NULL) header("Location: pagError.php");
  else if ($output != NULL)
  { 
    $matricula = $usuario -> selecionaDigital($output);

    if ($matricula == $_SESSION['matricula']) $cont = count ($presenca -> procuraPresenca($matricula));
    else
    {
      $cont = 0;
      echo '<script>alert("Digital de outro usuário.")</script>';
      header('refresh:0.5; url=pgAluno.php');
    }
    
  }
?>

<DOCTYPE html>
<html>
    <head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
	<style>
	td
	{
		padding: 0px 0px 5px 0px;
		font-family: Bahnschrift Light;
		color: #ffffff;
        font-size: 20px;
	}
  .input-group-text{ 
                        color: black;
                        height: 40px; 
                        background-color: transparent; 
                        border-radius: 10px;
                        border-color: transparent;
                        align-content: center; 
                        font-family: Bahnschrift SemiBold;
                        font-size: 40px;
                        margin-top: 5px;
                        }
    .input-group-prepend{
                        background-color: #FFC000;
                        width: 140px; 
                        border-radius: 10px; 
                        text-align: center;
                        align-content: center;
                        font-size: 40px;
                        height: 50px;
                        margin-top: 5px;
                        }
	</style>
    <body style = "background-color: black;">
		<nav style = "background-color: #FFC000; font-family: Bahnschrift SemiBold; text-align: center; font-size: auto;" >
			<span class="navbar-brand mb-0 h1">ALUNO - HISTÓRICO DE PRESENÇA</span>
    </nav>
    <div class = "container" style = "width: auto; background-color: black; margin: 100px auto; border-radius: 30px;">
        <div class = "container" style = "align-content: center; width: 400px; background-color: #FFC000; margin: 100px auto; border-radius: 30px;">
                <table class="table table-borderless" style = "align-content: center;">
                    <thead>
                        <tr>
                        <th scope="col">DIA</th>
                        <th scope="col">AULA</th>
                        <th scope="col">HORÁRIO</th>
                        </tr>
                    </thead>
                    <tbody>
                
                        <?php
                        for ($i = 0; $i < $cont; $i++)
                        {
                           echo '<tr>';
                           echo '<td>'; echo $presenca -> procuraPresenca($matricula)[$i][1]; echo '</td>';
                           echo '<td>'; echo $presenca -> procuraPresenca($matricula)[$i][0]; echo '</td>';
                           echo '<td>'; echo $presenca -> procuraPresenca($matricula)[$i][2]; echo '</td>';
                          echo '</tr>';
                        }
                    ?>
                    </tbody>
                    </table>
        </div>
		<div class="container">
		<div style = "margin: -30px; width: auto" class="row justify-content-center">
			  
    <div style = "margin: -30px; width: auto" class="row justify-content-center">
			<button style = "margin-right: 30px; width: 190px; height: 100px; background-color: #FFC000; font-family: Bahnschrift SemiBold; text-align: center; font-size: 30px; border-radius: 15px;"
                    type="button"
                    onclick = "window.location.href='pgAluno.php'"
                    class="btn">VOLTAR</button>
		</div>
		</div>
    <body>
</html>
