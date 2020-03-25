<?php
session_start();

require_once('extra/classes/bd.class.php');
require('extra/classes/aula.class.php');
require('extra/classes/cliente.class.php');
require('extra/classes/presenca.class.php');
banco_mysql::conn();
$aulas = new Aulas();
$usuario = new Cliente();
$presenca = new Presenca();

if (!isset($_SESSION['presenca'])) 
{
	header('Location: registraPresenca.php');
	exit();
}

$presenca -> aula =  $_SESSION['aula'];
$presenca -> inicio = $_SESSION['inicio'];
$presenca -> data = $_SESSION['data'];

if (isset($_REQUEST['matricula']))
{
    if($_SESSION['aula_dia'] == true)
    {
        $dados = array($usuario -> selecionaDadosCliente($_REQUEST['matricula'])[0],
        $presenca -> aula,
        $presenca -> inicio,
        $presenca -> data);

        if ($presenca -> cadastraPresenca($dados)) echo '<script>alert("Presença cadastrada com sucesso")</script>';
        else echo '<script>alert("Problemas ao cadastrar presença. Tente novamente.")</script>';

        //header('refresh:1; url=pgAluno.php');
    } 
    else 
    {
        echo '<script>alert("Esta aula não ocorrerá hoje.")</script>';
        //header('refresh:1; url=pgAluno.php');
    }
  
}

?>

<DOCTYPE html>
<html>
    <head>
    </head>
    <style>
    ::placeholder { color: #bfbfbf; }
    </style>
    <body style = "background-color: black; overflow: auto;">
        <nav style = "background-color: #FFC000; font-family: Bahnschrift SemiBold; text-align: center; font-size: auto;" >
                <span class="navbar-brand mb-0 h1">Falha na leitura de digital. Confirme sua matrícula.</span>
		</nav>
        <div style = "width: 300px;
                      background-color: #FFC000;
                      margin: 150px auto;
                      border-radius: 30px;">
            <h1 style = 
                        "font-family: Bahnschrift Light; 
                        text-align: center;
                        color: black;
                        font-size: 40px;
                        padding: 30px 0 0px 0;">CONFIRMAÇÃO</h1>
            <form style = "display: flex;
                           flex-wrap: wrap;
                           justify-content: center;" method="$_REQUEST">
                <input type = "text" 
                       style = "font-family: Bahnschrift;
                                text-align: center;
                                font-size: 18px;
                                width: 200px;
                                height: 50px;
                                border: 1px solid #ffffff;
                                margin-bottom: 20px;
                                padding: 0 15px;
                                border-radius: 10px;"
                       name = "matricula" placeholder = "Digite sua matrícula" id = "matricula" required>
            </form>
        </div>
    <body>
</html>