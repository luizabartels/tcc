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

$stmt = $con->prepare('SELECT nome, matricula, pagamento, ppagamento, dfisio FROM alunos WHERE matricula = ?');

$stmt->bind_param('i', $_SESSION['matricula']);
$stmt->execute();
$stmt->bind_result($nome, $matricula, $pagamento, $ppagamento, $dfisio);
$stmt->fetch();
$stmt->close();

date_default_timezone_set('America/Sao_Paulo');
$data_atual = new DateTime();
$data_atual = date_format($data_atual, 'Y-m-d');
$data_atual = strtotime(str_replace('-','/', $data_atual));

$dfisio = strtotime(str_replace('-','/', $dfisio));
$dif_data = ($data_atual - $dfisio)/(86400*30);

if ($dif_data > 6)
{
	$avaliacao = 'Marcar avaliação';
}
else
{
	$avaliacao = 'Avaliação em dia.';
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
					 font-size: auto;
					 width: auto" >
			<span class="navbar-brand mb-0 h1">ALUNO - PERFIL</span>
		</nav>
        <div class = "container" style = "width: auto;
                      background-color: #FFC000;
                      margin: 50px auto;
                      border-radius: 30px;">
				<table class="table table-borderless" style = "padding: 15px 20px 15px 20px;">
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Nome:</td>
						<td><?=$nome;?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Matrícula:</td>
						<td><?=$matricula?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Plano de Pagamento:</td>
						<td><?=$pagamento?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Próximo Pagamento:</td>
						<td><?=$ppagamento?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Avaliação Fisioterápica:</td>
						<td><?=$avaliacao?></td>
					</tr>
					
				</table>
        </div>
		<div class="container">
		<div style = "margin: -30px; width: auto" class="row justify-content-center">
			<button style = "margin-right: 30px; width: 250px; height: 100px; background-color: #FFC000; font-family: Bahnschrift SemiBold; text-align: center; font-size: 30px; border-radius: 15px;"
                    type="button"
                    onclick = "window.location.href='registraAluno.php'"
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
