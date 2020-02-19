<?php
session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'academia';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if ( mysqli_connect_errno()) 
{
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if ( !isset($_POST['matricula']) ) 
{
	die ('Please fill both the username and password field!');
}

if ($stmt = $con->prepare('SELECT matricula FROM adm WHERE matricula = ?')) 
{
	$stmt->bind_param('i', $_POST['matricula']);
	$stmt->execute();
	$stmt->store_result();
}

if ($stmt->num_rows > 0)
{
	$stmt->bind_result($matricula);
	$stmt->fetch();

	if ($matricula == 0001)
	{
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['matricula'] = $_POST['matricula'];
		header('Location: pgGerencia.php');
	}
	else if ($matricula == 0002)
	{
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['matricula'] = $_POST['matricula'];
		header('Location: pgRecepcao.php');
	}
	else if ($matricula == 0003)
	{
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['matricula'] = $_POST['matricula'];
		header('Location: pgFisioterapeuta.php');
	}

}
else if ($stmt = $con->prepare('SELECT matricula FROM alunos WHERE matricula = ?')) 
	{
		$stmt->bind_param('i', $_POST['matricula']);
		$stmt->execute();
		$stmt->store_result();

		if ($stmt->num_rows > 0)
		{
			$stmt->bind_result($matricula);
			$stmt->fetch();

			session_regenerate_id();
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['matricula'] = $_POST['matricula'];
			header('Location: pgAluno.php');
		}
		else
		{
			echo 'Usuário não encontrado';
		}
	}

$stmt->close();
?>