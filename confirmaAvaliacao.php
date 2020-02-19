<?php

/*
* Calculos extraídos do site: https://www.cdof.com.br/protocolos1.htm
*/

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

if (!isset($_SESSION['regavaliacao'])) {
	header('Location: pgFisioAvaliacao.php');
	exit();
}

$matricula = $_SESSION['matricula'];
$data = $_SESSION['data'];
$etilismo = $_SESSION['etilismo'];
$tabagismo = $_SESSION['tabagismo'];
$historico = $_SESSION['historico'];
$cirurgias = $_SESSION['cirurgias'];
$queixas = $_SESSION['queixas'];
$triceps = $_SESSION['triceps'];
$iliaca = $_SESSION['iliaca'];
$peitoral = $_SESSION['peitoral'];
$coxa = $_SESSION['coxa'];
$abdome = $_SESSION['abdome'];
$idade = $_SESSION['idade'];
$repouso = $_SESSION['repouso'];
$exercicio = $_SESSION['exercicio'];
$pressao = $_SESSION['pressao'];
$borg = $_SESSION['borg'];
$relato = $_SESSION['relato'];
$laudo = $_SESSION['laudo'];

$x1 = $triceps + $iliaca + $coxa + $peitoral + $abdome;
$x2 = $idade;

$dc = 1.1093800 - 0.0008267 * $x1 + 0.0000016 * $x1 * $x1 - 0.0002574 * $x2;
$g = ((4.95 / $dc) - 4.50) * 100;

if (isset($_REQUEST['registrar']))
{
    //Adicionar comparação com itens do banco de dado.

    $sql = ("INSERT INTO `avaliacao` 
            (`matricula`, `data`, `etilismo`, `tabagismo`, `historico`, `cirurgias`, `queixas`, `triceps`, `iliaca`, `peitoral`, `coxa`, `abdome`, `idade`, `repouso`, `exercicio`, `pressao`, `borg`, `relato`, `laudo`) 
            VALUES ('$matricula', '$data', '$etilismo', '$tabagismo', ' $historico', '$cirurgias', '$queixas', '$triceps', '$iliaca', '$peitoral', '$coxa', '$abdome', '$idade', '$repouso', '$exercicio', '$pressao', '$borg', '$relato', '$laudo')");
    
    mysqli_query($con, $sql);

    header('Location: pgFisioterapeuta.php');
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
						<td><?=$matricula?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Data:</td>
						<td><?=$data?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Etislismo:</td>
						<td><?=$etilismo?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Tabagismo:</td>
						<td><?=$tabagismo?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Historico:</td>
						<td><?=$historico?></td>
                    </tr>
                    <tr>
						<td style = "font-family: Bahnschrift SemiBold;">Cirurgias:</td>
						<td><?=$cirurgias?></td>
                    </tr>
                    <tr>
						<td style = "font-family: Bahnschrift SemiBold;">Queixas:</td>
						<td><?=$queixas?></td>
                    </tr>
                    <tr>
						<td style = "font-family: Bahnschrift SemiBold;">Triceps:</td>
						<td><?=$triceps?></td>
                    </tr>
                    <tr>
						<td style = "font-family: Bahnschrift SemiBold;">Iliaca:</td>
						<td><?=$iliaca?></td>
                    </tr>
                    <tr>
						<td style = "font-family: Bahnschrift SemiBold;">Peitoral:</td>
						<td><?=$peitoral?></td>
                    </tr>
                    <tr>
						<td style = "font-family: Bahnschrift SemiBold;">Coxa:</td>
						<td><?=$coxa?></td>
                    </tr>
                    <tr>
						<td style = "font-family: Bahnschrift SemiBold;">Abdome:</td>
						<td><?=$abdome?></td>
                    </tr>
                    <tr>
						<td style = "font-family: Bahnschrift SemiBold;">Idade:</td>
						<td><?=$idade?></td>
                    </tr>
                    <tr>
						<td style = "font-family: Bahnschrift SemiBold;">Repouso:</td>
						<td><?=$repouso?></td>
                    </tr>
                    <tr>
						<td style = "font-family: Bahnschrift SemiBold;">Exercicio:</td>
						<td><?=$exercicio?></td>
                    </tr>
                    <tr>
						<td style = "font-family: Bahnschrift SemiBold;">Pressao:</td>
						<td><?=$pressao?></td>
                    </tr>
                    <tr>
						<td style = "font-family: Bahnschrift SemiBold;">Borg:</td>
						<td><?=$borg?></td>
                    </tr>
                    <tr>
						<td style = "font-family: Bahnschrift SemiBold;">Relato:</td>
						<td><?=$relato?></td>
                    </tr>
                    <tr>
						<td style = "font-family: Bahnschrift SemiBold;">Laudo:</td>
						<td><?=$laudo?></td>
                    </tr>
                    <tr>
                    <tr>
						<td style = "font-family: Bahnschrift SemiBold;">Densidade Corporal:</td>
						<td><?=$dc?></td>
                    </tr>
                    <tr>
                    <tr>
						<td style = "font-family: Bahnschrift SemiBold;">Percentual de Gordura:</td>
						<td><?=$g?></td>
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