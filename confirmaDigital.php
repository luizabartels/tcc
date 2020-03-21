<?php
session_start();

require_once('extra/classes/bd.class.php');
require('extra/classes/cliente.class.php');
require('extra/classes/sensorbiometrico.class.php');
banco_mysql::conn();
$usuario = new Cliente();
$sensor = new SensorBiometrico();

if (!isset($_SESSION['regdigital'])) 
{
	header('Location: registraDigital.php');
	exit();
}
    $usuario -> aluno_matricula = $_SESSION['aluno_matricula'];
    
    $output = $sensor -> autenticaDigital();

    if ($output == NULL) $usuario -> aluno_digital = '00000';
    else if ($output != NULL) $usuario -> aluno_digital = $output;

    if (isset($_REQUEST['registrar']))
    {
        $usuario -> cadastraDigital($usuario -> aluno_matricula, $usuario -> aluno_digital);
        header('Location: pgRecepcao.php');
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
        font-size: 20px;
	}
	</style>
    <body style = "background-color: black;">
		<nav style = "background-color: #FFC000;
					 font-family: Bahnschrift SemiBold;
					 text-align: center;
					 font-size: 40px;" >
			<span class="navbar-brand mb-0 h1">CADASTRO DE ALUNO - CONFIRMAÇÃO</span>
		</nav>
        <div class = "container" style = "width: 600px;
                      background-color: #FFC000;
                      margin: 50px auto;
                      border-radius: 30px;">
                <table class="table table-borderless" style = "padding: 15px 20px 15px 20px;">
                    <tr>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Matrícula:</td>
						<td><?=$usuario -> aluno_matricula?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Digital:</td>
						<td><?=$usuario -> aluno_digital?></td>
					</tr>
				
						<td></td>
						<td></td>
					</tr>
				</table>
        </div>
		<div class="container">
		<div style = "margin: -30px; width: auto" class="row justify-content-center">
			<button style = "margin-right: 30px; width: 250px; height: 100px; background-color: #FFC000; font-family: Bahnschrift SemiBold; text-align: center; font-size: 30px; border-radius: 15px;"
                    type="button"
                    onclick = "window.location.href='registraDigital.php'"
                    class="btn">CORRIGIR</button>

            <form method="$_REQUEST">
            <input type = "submit" 
                    name = "registrar"
                    value = "CONFIRMAR"
                    style = "border-color: transparent; width: 250px; height: 100px; background-color: #FFC000; font-family: Bahnschrift SemiBold; font-size: 30px; border-radius: 15px;">
            </form>
		</div>
		</div>
    <body>
</html>