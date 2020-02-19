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

if (!isset($_SESSION['regaluno'])) 
{
	header('Location: registraAluno.php');
	exit();
}
    $aluno_matricula = $_SESSION['aluno_matricula'];
    $aluno_nome = $_SESSION['aluno_nome'];
    $aluno_identidade = $_SESSION['aluno_identidade'];
    $aluno_cpf = $_SESSION['aluno_cpf'];
    $aluno_endereco = $_SESSION['aluno_endereco'];
	$aluno_plano = $_SESSION['aluno_plano'];
	$pagamento = $_SESSION['pagamento'];
	$ppagamento = $_SESSION['ppagamento'];

if (isset($_REQUEST['registrar']))
{
    //Adicionar comparação com itens do banco de dado.

    $sql = ("INSERT INTO `alunos` (`matricula`, `nome`, `identidade`, `cpf`, `endereco`, `plano`, `pagamento`, `ppagamento`) 
	VALUES ('$aluno_matricula', '$aluno_nome', '$aluno_identidade', '$aluno_cpf', ' $aluno_endereco', '$aluno_plano', '$pagamento', '$ppagamento')");
    
    mysqli_query($con, $sql);

    header('Location: registraAluno.php');
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
						<td style = "font-family: Bahnschrift SemiBold;">Nome:</td>
						<td><?=$aluno_nome?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Matrícula:</td>
						<td><?=$aluno_matricula?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Identidade:</td>
						<td><?=$aluno_identidade?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">CPF:</td>
						<td><?=$aluno_cpf?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Endereço:</td>
						<td><?=$aluno_endereco?></td>
                    </tr>
                    <tr>
						<td style = "font-family: Bahnschrift SemiBold;">Plano:</td>
						<td><?=$aluno_plano?></td>
                    </tr>
                    <tr>
						<td style = "font-family: Bahnschrift SemiBold;">Data de Pagamento:</td>
						<td><?=$pagamento?></td>
                    </tr>
                    <tr>
						<td style = "font-family: Bahnschrift SemiBold;">Renovação:</td>
						<td><?=$ppagamento?></td>
                    </tr>
                    <tr>
						<td style = "font-family: Bahnschrift SemiBold;">Digital:</td>
						<td><?=$_SESSION['aluno_matricula']?></td>
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