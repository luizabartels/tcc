<?php
session_start();

if (!isset($_SESSION['Recepcao'])) {
	header('Location: pgRecepcao.php');
	exit();
}

if (isset($_POST['registrar']))
{
    date_default_timezone_set('America/Sao_Paulo');

    $_SESSION['regaluno'] = TRUE;

    $_SESSION['aluno_nome'] = $_POST['aluno_nome'];
    $_SESSION['aluno_matricula'] = $_POST['aluno_matricula'];
    $_SESSION['aluno_identidade'] = $_POST['aluno_identidade'];
    $_SESSION['aluno_cpf'] = $_POST['aluno_cpf'];
    $_SESSION['aluno_endereco'] = $_POST['aluno_endereco'];
    $_SESSION['aluno_plano'] = $_POST['aluno_plano'];
    $pagamento = new DateTime();
    $_SESSION['pagamento'] = date_format($pagamento, 'Y-m-d');
    $ppagamento = $pagamento;

    if(strcmp($_POST['aluno_plano'],"Mensal") == 0)
	{
		$ppagamento->add(new DateInterval('P30D'));
        $_SESSION['ppagamento'] = date_format($ppagamento, 'Y-m-d');
    }
    else
    {
        $ppagamento->add(new DateInterval('P365D'));
        $_SESSION['ppagamento'] = date_format($ppagamento, 'Y-m-d');
    }
    header('Location: confirmaRegAluno.php');
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
        ::placeholder { color: #bfbfbf; }

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
    <body style = "background-color: black; overflow: auto;">
		<nav style = "background-color: #FFC000; font-family: Bahnschrift SemiBold; text-align: center; font-size: 40px;">
			<span class="navbar-brand mb-0 h1">RECEPÇÃO - CADASTRO DE ALUNO</span>
		</nav>
        
		<div style = "width: auto; background-color: black; margin: 60px auto; align-content: center;"
                     class="container">
            
            <form method = "POST">
                <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">MATRÍCULA</span>
                    </div>
                    <input type = "text" 
                            style = " font-family: Bahnschrift; font-size: auto; width: 50%; height: 50px; border: 1px solid #ffffff; margin: 5px 5px 5px 5px; padding: 0 10px; border-radius: 10px;"
                            class="form-control" 
                            name = "aluno_matricula" 
                            placeholder = "Digite aqui..." 
                            id = "aluno_matricula" required>
                </div>

                <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">NOME</span>
                    </div>
                    <input type = "text" 
                            style = " font-family: Bahnschrift; font-size: auto; width: 50%; height: 50px; border: 1px solid #ffffff; margin: 5px 5px 5px 5px; padding: 0 10px; border-radius: 10px;"
                            class="form-control" 
                            name = "aluno_nome" 
                            placeholder = "Digite aqui..." 
                            id = "aluno_nome" required>
                </div>
            
                <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">IDENTIDADE</span>
                    </div>
                    <input type = "text" 
                            style = " font-family: Bahnschrift; font-size: auto; width: 50%; height: 50px; border: 1px solid #ffffff; margin: 5px 5px 5px 5px; padding: 0 10px; border-radius: 10px;"
                            class="form-control" 
                            name = "aluno_identidade" 
                            placeholder = "Digite aqui..." 
                            id = "aluno_identidade" required>
                </div>
            
                <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">CPF</span>
                    </div>
                    <input type = "text" 
                            style = " font-family: Bahnschrift; font-size: auto; width: 50%; height: 50px; border: 1px solid #ffffff; margin: 5px 5px 5px 5px; padding: 0 10px; border-radius: 10px;"
                            class="form-control" 
                            name = "aluno_cpf" 
                            placeholder = "Digite aqui..." 
                            id = "aluno_cpf" required>
                </div>
            
                <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">ENDEREÇO</span>
                    </div>
                    <input type = "text" 
                            style = " font-family: Bahnschrift; font-size: auto; width: 50%; height: 50px; border: 1px solid #ffffff; margin: 5px 5px 5px 5px; padding: 0 10px; border-radius: 10px;"
                            class="form-control" 
                            name = "aluno_endereco" 
                            placeholder = "Digite aqui..." 
                            id = "aluno_endereco" required>
                </div>
            
                <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">PLANO</span>
                    </div>
                    <input type = "text" 
                            style = " font-family: Bahnschrift; font-size: auto; width: 50%; height: 50px; border: 1px solid #ffffff; margin: 5px 5px 5px 5px; padding: 0 10px; border-radius: 10px;"
                            class="form-control" 
                            name = "aluno_plano" 
                            placeholder = "Digite aqui..."
                            id = "aluno_plano" required>
                </div>
            

                <div class="container">
		<div style = "margin: 30px; width: auto" class="row justify-content-center">
			<button style = "margin-right: 30px; width: 250px; height: 100px; background-color: #FFC000; font-family: Bahnschrift SemiBold; text-align: center; font-size: 30px; border-radius: 15px;"
                    type="button"
                    onclick = "window.location.href='pgRecepcao.php'"
                    class="btn">VOLTAR</button>

           
            <input type = "submit" 
                    name = "registrar"
                    value = "REGISTRAR"
                    style = "border-color: transparent; width: 250px; height: 100px; background-color: #FFC000; font-family: Bahnschrift SemiBold; font-size: 30px; border-radius: 15px;">
            
		</div>
		</div>
        </form>
        
    <body>
</html>