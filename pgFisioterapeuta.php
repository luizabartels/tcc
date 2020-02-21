<?php

session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'academia';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

mysqli_error($con); 

$cont = 0;

date_default_timezone_set('America/Sao_Paulo');
$data_atual = new DateTime();
$data_atual = date_format($data_atual, 'Y-m-d');
$data_atual = strtotime(str_replace('-','/', $data_atual));

$hora_atual = new DateTime();
$hora_atual -> format("%H:%I:%S");
$hora_atual_int = strtotime(date_format($hora_atual, 'H:i:s')); // converte a hora em inteiro para comparações

$hora_flag = new DateTime('23:59:59');
$hora_flag = strtotime(date_format($hora_flag, 'H:i:s')); // converte a hora em inteiro para comparações

$hora_array = array();
$matricula_array = array();
$dia_array = array();

$sql = "SELECT matricula, dfisio, hfisio FROM alunos";


if($result = mysqli_query($con, $sql))
{
  if(mysqli_num_rows($result) > 0)
  {
    while($row = mysqli_fetch_array($result))
    {
      $matricula = $row['matricula'];
      $dfisio = $row['dfisio'];
      $dfisio = strtotime(str_replace('-','/', $dfisio));
      $dif_data = ($data_atual - $dfisio)/86400;

      $hfisio = $row['hfisio'];
      $hfisio_int = strtotime($hfisio);
      $hfisio = new DateTime("$hfisio");

      $dif_hora = $hora_atual->diff($hfisio);
      
      if ($dif_data == 0)
      {
        if ($hfisio_int > $hora_atual_int)
        {
              $cont++;
              $hora_array[$cont] = $row['hfisio'];
              $matricula_array[$cont] = [$row['hfisio'] => $row['matricula']];
              $dia_array[$cont] = [$row['hfisio'] => $row['dfisio']];
        }
       }
    }
    sort($hora_array);
    sort($matricula_array);
    sort($dia_array);
       
  }
}
header("Refresh:60; url=pgFisioterapeuta.php");
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
	</style>
    <body style = "background-color: black;">
		<nav style = "background-color: #FFC000; font-family: Bahnschrift SemiBold; text-align: center; font-size: auto;" >
			<span class="navbar-brand mb-0 h1">FISIOTERAPIA</span>
		</nav>
        <div class = "container" style = "width: auto; background-color: #FFC000; margin: 100px auto; border-radius: 30px;">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                        <th></th>
                        <th></th>
                        <th scope="col">MATRÍCULA</th>
                        <th scope="col">DIA</th>
                        <th scope="col">HORA</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                
                        <?php
                        for ($i = 0; $i < $cont; $i++)
                        {
                           echo '<tr>';
                           echo '<td></td>';
                           echo '<td></td>';
                           echo '<td>'; echo $matricula_array[$i][$hora_array[$i]]; echo '</td>';
                           echo '<td>'; echo $dia_array[$i][$hora_array[$i]]; echo '</td>';
                           echo '<td>'; echo $hora_array[$i]; echo '</td>';
                          echo '</tr>';
                        }
                    ?>
                    </tbody>
                    </table>
        </div>
		<div class="container">
		<div style = "margin: -50px; width: auto" class="row justify-content-center">
			<button style = "margin-right: 30px; width: 250px; height: 100px; background-color: #FFC000; font-family: Bahnschrift SemiBold; text-align: center; font-size: 30px; border-radius: 15px;"
                    type="button"
                    onclick = "window.location.href='pgFisioAvaliacao.php'"
                    class="btn">EFETUAR AVALIAÇÃO</button>
		</div>
		</div>
    <body>
</html>
