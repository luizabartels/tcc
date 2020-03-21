<?php
session_start();
require_once('extra/classes/bd.class.php');
require('extra/classes/avafisica.class.php');
banco_mysql::conn();
$ava = new Avaliacao();
$dados = array();

if (!isset($_SESSION['regavaliacao'])) {
	header('Location: pgFisioAvaliacao.php');
	exit();
}

$ava -> matricula = $_SESSION['matricula'];
$ava -> data = $_SESSION['data'];
$ava -> sexo = $_SESSION['sexo'];
$ava -> etilismo = $_SESSION['etilismo'];
$ava -> tabagismo = $_SESSION['tabagismo'];
$ava -> triceps = $_SESSION['triceps'];
$ava -> iliaca = $_SESSION['iliaca'];
$ava -> peitoral = $_SESSION['peitoral'];
$ava -> coxa = $_SESSION['coxa'];
$ava -> abdome = $_SESSION['abdome'];
$ava -> idade = $_SESSION['idade'];
$ava -> repouso = $_SESSION['repouso'];
$ava -> exercicio = $_SESSION['exercicio'];
$ava -> pressao = $_SESSION['pressao'];
$ava -> borg = $_SESSION['borg'];

$dados = array($ava -> matricula, //0
				$ava -> data, //1
				$ava -> sexo, //2
				$ava -> etilismo, //3
				$ava -> tabagismo, //4
				$_SESSION['historico'], //5
				$_SESSION['cirurgias'], //6
				$_SESSION['queixas'], //7
				$ava -> triceps, //8
				$ava -> iliaca, //9
				$ava -> peitoral, //10
				$ava -> coxa, //11
				$ava -> abdome, //12
				$ava -> idade, //13
				$ava -> repouso, //14
				$ava -> exercicio, //15
				$ava -> pressao, //16
				$ava -> borg, //17
				$_SESSION['relato'], //18
				$_SESSION['laudo'] //19
				);

$indices = array($ava -> calculaProtocoloPollock($ava -> sexo, $ava -> idade, $ava -> triceps, $ava -> iliaca, $ava -> coxa, $ava -> peitoral, $ava -> abdome)[0],
				 $ava -> calculaProtocoloPollock($ava -> sexo, $ava -> idade, $ava -> triceps, $ava -> iliaca, $ava -> coxa, $ava -> peitoral, $ava -> abdome)[1]);


if (isset($_REQUEST['registrar']))
{
	if ($ava -> registraAvaliacao($dados)) echo '<script>alert("Avaliação cadastrada com sucesso")</script>';
	else echo '<script>alert("Problemas ao cadastrar avaliação. Tente novamente.")</script>';
	
	header('refresh:1; url=pgFisioterapeuta.php');
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
			<span class="navbar-brand mb-0 h1">AVALAIÇÃO - CONFIRMAÇÃO</span>
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
						<td><?=$_SESSION['matricula']?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Sexo:</td>
						<td><?=$_SESSION['sexo']?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Data:</td>
						<td><?=$_SESSION['data']?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Etislismo:</td>
						<td><?=$_SESSION['etilismo']?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Tabagismo:</td>
						<td><?=$_SESSION['tabagismo']?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Historico:</td>
						<td><?=$_SESSION['historico']?></td>
                    </tr>
                    <tr>
						<td style = "font-family: Bahnschrift SemiBold;">Cirurgias:</td>
						<td><?=$_SESSION['cirurgias']?></td>
                    </tr>
                    <tr>
						<td style = "font-family: Bahnschrift SemiBold;">Queixas:</td>
						<td><?=$_SESSION['queixas']?></td>
                    </tr>
                    <tr>
						<td style = "font-family: Bahnschrift SemiBold;">Triceps:</td>
						<td><?=$_SESSION['triceps']?></td>
                    </tr>
                    <tr>
						<td style = "font-family: Bahnschrift SemiBold;">Iliaca:</td>
						<td><?=$_SESSION['iliaca']?></td>
                    </tr>
                    <tr>
						<td style = "font-family: Bahnschrift SemiBold;">Peitoral:</td>
						<td><?=$_SESSION['peitoral']?></td>
                    </tr>
                    <tr>
						<td style = "font-family: Bahnschrift SemiBold;">Coxa:</td>
						<td><?=$_SESSION['coxa']?></td>
                    </tr>
                    <tr>
						<td style = "font-family: Bahnschrift SemiBold;">Abdome:</td>
						<td><?=$_SESSION['abdome']?></td>
                    </tr>
                    <tr>
						<td style = "font-family: Bahnschrift SemiBold;">Idade:</td>
						<td><?=$_SESSION['idade']?></td>
                    </tr>
                    <tr>
						<td style = "font-family: Bahnschrift SemiBold;">Repouso:</td>
						<td><?=$_SESSION['repouso']?></td>
                    </tr>
                    <tr>
						<td style = "font-family: Bahnschrift SemiBold;">Exercicio:</td>
						<td><?=$_SESSION['exercicio']?></td>
                    </tr>
                    <tr>
						<td style = "font-family: Bahnschrift SemiBold;">Pressao:</td>
						<td><?=$_SESSION['pressao']?></td>
                    </tr>
                    <tr>
						<td style = "font-family: Bahnschrift SemiBold;">Borg:</td>
						<td><?=$_SESSION['borg']?></td>
                    </tr>
                    <tr>
						<td style = "font-family: Bahnschrift SemiBold;">Relato:</td>
						<td><?=$_SESSION['relato']?></td>
                    </tr>
                    <tr>
						<td style = "font-family: Bahnschrift SemiBold;">Laudo:</td>
						<td><?=$_SESSION['laudo']?></td>
                    </tr>
                    <tr>
                    <tr>
						<td style = "font-family: Bahnschrift SemiBold;">Densidade Corporal:</td>
						<td><?=$indices[0]?></td>
                    </tr>
                    <tr>
                    <tr>
						<td style = "font-family: Bahnschrift SemiBold;">Percentual de Gordura:</td>
						<td><?=$indices[1]?></td>
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