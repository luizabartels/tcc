<?php
session_start();

require_once('extra/classes/bd.class.php');
require('extra/classes/cliente.class.php');
require('extra/classes/adm.class.php');

banco_mysql::conn();
$adm = new Adm();
$cliente = new Cliente();

if ( !isset($_POST['matricula']) ) 
{
	die ('Please fill both the username and password field!');
}

if ($adm -> autenticaAdm($_POST['matricula']) == 0001)
	{
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['matricula'] = $_POST['matricula'];
		header('Location: pgGerencia.php');
	}
else if ($adm -> autenticaAdm($_POST['matricula']) == 0002)
	{
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['matricula'] = $_POST['matricula'];
		header('Location: pgRecepcao.php');
	}
else if ($adm -> autenticaAdm($_POST['matricula']) == 0003)
	{
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['matricula'] = $_POST['matricula'];
		header('Location: pgFisioterapeuta.php');
	}

else if ($cliente -> autenticaCliente($_POST['matricula'])) 
	{
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['matricula'] = $_POST['matricula'];
		header('Location: pgAluno.php');
	}
else echo 'Usuário não encontrado';

?>