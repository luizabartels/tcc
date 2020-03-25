<?php
session_start();

require_once('extra/classes/bd.class.php');
require('extra/classes/aula.class.php');
require('extra/classes/cliente.class.php');
require('extra/classes/presenca.class.php');
require('extra/classes/sensorbiometrico.class.php');
banco_mysql::conn();
$aulas = new Aulas();
$usuario = new Cliente();
$presenca = new Presenca();
$sensor = new SensorBiometrico();

$cont = count($aulas -> procuraAula());

if (isset($_REQUEST['confirmar']))
{
  $data = new DateTime();
  $_SESSION['data'] = date_format($data, 'Y-m-d');
  $_SESSION['inicio'] = $_REQUEST['inicio_aula'];
  $_SESSION['aula'] = $_REQUEST['aula'];

  /* DIGITAL */

  $output = $sensor -> autenticaDigital();

  if ($output == NULL)
  {
    $_SESSION['presenca'] = TRUE;
    
    header('Location: login_error.php');
  }
  else if ($output != NULL)
  {
    $presenca -> aula =  $_SESSION['aula'];
    $presenca -> inicio = $_SESSION['inicio'];
    $presenca -> data = $_SESSION['data'];
    $matricula = $usuario -> selecionaDigital($output);

    if ($_SESSION['matricula'] == $matricula)
    {
      $dados = array($matricula,
                  $presenca -> aula,
                  $presenca -> inicio,
                  $presenca -> data);

      if ($presenca -> cadastraPresenca($dados)) echo '<script>alert("Presença cadastrada com sucesso")</script>';
      else echo '<script>alert("Problemas ao cadastrar presença. Tente novamente.")</script>';
    } else echo '<script>alert("Digital de outro usuário.")</script>';
  }
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
		color: #ffffff;
        font-size: 20px;
	}
  .input-group-text{ 
                        color: black;
                        height: 40px; 
                        background-color: transparent; 
                        border-radius: 10px;
                        border-color: transparent;
                        align-content: center; 
                        font-family: Bahnschrift SemiBold;
                        font-size: 40px;
                        margin-top: 5px;
                        }
    .input-group-prepend{
                        background-color: #FFC000;
                        width: 140px; 
                        border-radius: 10px; 
                        text-align: center;
                        align-content: center;
                        font-size: 40px;
                        height: 50px;
                        margin-top: 5px;
                        }
	</style>
    <body style = "background-color: black;">
		<nav style = "background-color: #FFC000; font-family: Bahnschrift SemiBold; text-align: center; font-size: auto;" >
			<span class="navbar-brand mb-0 h1">ALUNO - REGISTRAR PRESENÇA</span>
    </nav>
    <div class = "container" style = "width: auto; background-color: black; margin: 100px auto; border-radius: 30px;">
        <div class = "container" style = "width: auto; background-color: #FFC000; margin: 100px auto; border-radius: 30px;">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                        <th></th>
                        <th></th>
                        <th scope="col">AULA</th>
                        <th scope="col">HORÁRIO</th>
                        <th scope="col">PROFESSOR(A)</th>
                        <th scope="col">SALA</th>
                        </tr>
                    </thead>
                    <tbody>
                
                        <?php
                        for ($i = 0; $i < $cont; $i++)
                        {
                           echo '<tr>';
                           echo '<td></td>';
                           echo '<td></td>';
                           echo '<td>'; echo $aulas -> procuraAula()[$i][0]; echo '</td>';
                           echo '<td>'; echo $aulas -> procuraAula()[$i][1]; echo '</td>';
                           echo '<td>'; echo $aulas -> procuraAula()[$i][2]; echo '</td>';
                           echo '<td>'; echo $aulas -> procuraAula()[$i][3]; echo '</td>';
                          echo '</tr>';
                        }
                    ?>
                    </tbody>
                    </table>
        </div>
        
        <form method="$_REQUEST">
        <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">AULA</span>
                    </div>
                    <input type = "text" 
                            style = " font-family: Bahnschrift; font-size: 100%; width: 50%; height: 50px; border: 1px solid #ffffff; margin: 5px 5px 5px 5px; padding: 0 10px; border-radius: 10px;"
                            class="form-control" name = "aula" placeholder = "Ex.: Natação" id = "aula" required>
                    
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">HORÁRIO</span>
                    </div>
                    <input type="time"
                           style = "
                                font-family: Bahnschrift;
                                font-size: 100%;
                                width: 50%;
                                height: 50px;
                                border: 1px solid #ffffff;
                                margin: 5px 5px 5px 5px;
                                padding: 0 10px;
                                border-radius: 10px;"
                           class="form-control" name = "inicio_aula" placeholder = "Digite aqui..." id = "inicio_aula" required>
            </div>
    </div>
		<div class="container">
		<div style = "margin: -30px; width: auto" class="row justify-content-center">
			  
    <div style = "margin: -30px; width: auto" class="row justify-content-center">
			<button style = "margin-right: 30px; width: 190px; height: 100px; background-color: #FFC000; font-family: Bahnschrift SemiBold; text-align: center; font-size: 30px; border-radius: 15px;"
                    type="button"
                    onclick = "window.location.href='pgAluno.php'"
                    class="btn">VOLTAR</button>
            <input type = "submit" 
                    name = "confirmar"
                    value = "CONFIRMAR"
                    style = "border-color: transparent; width: 190px; height: 100px; background-color: #FFC000; font-family: Bahnschrift SemiBold; font-size: 30px; border-radius: 15px;">
        </form>
		</div>
		</div>
    <body>
</html>
