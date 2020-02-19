<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit();
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'academia';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if ( mysqli_connect_errno()) 
{
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$stmt = $con->prepare('SELECT matricula, nome, identidade, cpf FROM alunos WHERE matricula = ?');

$stmt->bind_param('i', $_SESSION['matricula']);
$stmt->execute();
$stmt->bind_result($matricula, $nome, $identidade, $cpf);
$stmt->fetch();
$stmt->close();

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
		<nav style = "background-color: #FFC000; font-family: Bahnschrift SemiBold; text-align: center; font-size: 40px;" >
			<span class="navbar-brand mb-0 h1">FISIOTERAPIA</span>
		</nav>
        <div class = "container" style = "width: 600px; background-color: #FFC000; margin: 100px auto; border-radius: 30px;">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                        <th scope="col">MATRÍCULA</th>
                        <th scope="col">DIA</th>
                        <th scope="col">HORA</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td><?=$nome;?></th>
                        <td><?=$_SESSION['matricula']?></td>
                        <td>Otto</td>
                        
                        </tr>
                        <tr>
                        <td>2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        
                        </tr>
                        <tr>
                        <td>2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        </tr>
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
