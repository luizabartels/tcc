<?php

require_once __DIR__ . '/vendor/autoload.php';

session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'academia';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

mysqli_error($con);



//$sql = "SELECT nome, matricula, identidade, cpf, endereco, plano, pagamento, ppagamento FROM alunos ORDER BY nome ASC";
//$sql = "SELECT nome FROM alunos ORDER BY nome ASC";


if (isset($_REQUEST['registrar']))
{
  $sql = "SELECT nome, matricula, identidade, cpf, endereco, plano, pagamento, ppagamento FROM alunos ORDER BY ppagamento";
  if($result = mysqli_query($con, $sql))
  {
    if(mysqli_num_rows($result) > 0)
    {
      while($row = mysqli_fetch_array($result))
      {
        $matricula = $row['matricula'];
        $nome = $row["nome"];
        $identidade = $row["identidade"];
        $cpf = $row["cpf"];
        $endeco = $row["endereco"];
        $plano = $row["plano"];
        $pagamento = $row["pagamento"];
        $ppagamento = strtotime($row["ppagamento"]);
        $ppagamento = date('d-m-Y', $ppagamento);

        $html .= "<p>".$ppagamento."   |   ".$nome."</p>";
      }
    }
  }



$mpdf = new \Mpdf\Mpdf();

    //$html = "<h1>".$matricula."<h1>";
    //$css = file_get_contents("/estilo.css");
    //$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML($html);
$mpdf->Output();

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
			<span class="navbar-brand mb-0 h1">CADASTRO DE INSTRUTOR - CONFIRMAÇÃO</span>
		</nav>

		<div class="container">
		<div style = "margin: 30px; width: auto" class="row justify-content-center">
			<button style = "margin-right: 30px; width: 250px; height: 100px; background-color: #FFC000; font-family: Bahnschrift SemiBold; text-align: center; font-size: 30px; border-radius: 15px;"
                    type="button"
                    onclick = "window.location.href='registraInstrutor.php'"
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