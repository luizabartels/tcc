<?php
session_start();

if (!isset($_SESSION['loggedinFisioterapeuta'])) 
{
	header('Location: login.php');
	exit();
}

require_once('extra/classes/bd.class.php');
require('extra/classes/cliente.class.php');

banco_mysql::conn();
$cliente = new Cliente();

$cont = count($cliente -> agendaFisioterapeuta());

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
                           echo '<td>'; echo $cliente -> agendaFisioterapeuta()[$i][0]; echo '</td>';
                           echo '<td>'; echo $cliente -> agendaFisioterapeuta()[$i][1]; echo '</td>';
                           echo '<td>'; echo $cliente -> agendaFisioterapeuta()[$i][2]; echo '</td>';
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
