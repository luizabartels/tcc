<?php
session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'academia';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

mysqli_error($con); 

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (!isset($_SESSION['regpagamento'])) {
	header('Location: registraAula.php');
	exit();
}

    $matricula = $_SESSION['matricula'];
	$pagamento = $_SESSION['pagamento'];
	$ppagamento = $_SESSION['ppagamento'];
    $iferias = $_SESSION['iferias'];
	$fferias = $_SESSION['fferias'];
	$plano = $_SESSION['plano'];

if (isset($_REQUEST['registrar']))
{
    //Adicionar comparação com itens do banco de dado.

	$sql = ("UPDATE `alunos` SET `pagamento` = '$pagamento' WHERE `alunos`.`matricula` = $matricula");
	
	mysqli_query($con, $sql);
    
    /*if(mysqli_query($con, $sql))
    {
        header('Location: registraAula.php');
    }
    else
    {
        header('Location: pagError.php');
    }*/

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
			<span class="navbar-brand mb-0 h1">CADASTRO DE AULA - CONFIRMAÇÃO</span>
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
						<td><?=$matricula?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Plano:</td>
						<td><?=$plano?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Data de pagamento:</td>
						<td><?=$pagamento?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Próximo pagamento:</td>
						<td><?=$ppagamento?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Início de férias:</td>
						<td><?=$iferias?></td>
                    </tr>
                    <tr>
						<td style = "font-family: Bahnschrift SemiBold;">Fim de férias:</td>
						<td><?=$fferias?></td>
                    </tr>
                    <tr>
						<td></td>
						<td></td>
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