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

if (isset($_POST['registrar']))
{
    $_SESSION['regavaliacao'] = TRUE;

    $_SESSION['matricula'] = $_POST['matricula_aluno'];
    $_SESSION['data'] = $_POST['data_avaliacao'];
    $_SESSION['etilismo'] = $_POST['etilismo_avaliacao'];
    $_SESSION['tabagismo'] = $_POST['tabagismo_avaliacao'];
    $_SESSION['historico'] = $_POST['hf_avaliacao'];
    $_SESSION['cirurgias'] = $_POST['cirurgias_avaliacao'];
    $_SESSION['queixas'] = $_POST['queixas_avaliacao'];
    $_SESSION['triceps'] = $_POST['triceps_avaliacao'];
    $_SESSION['iliaca'] = $_POST['iliaca_avaliacao'];
    $_SESSION['peitoral'] = $_POST['peitoral_avaliacao'];
    $_SESSION['coxa'] = $_POST['coxa_avaliacao'];
    $_SESSION['abdome'] = $_POST['abdome_avaliacao'];
    $_SESSION['idade'] = $_POST['idade_avaliacao'];
    $_SESSION['repouso'] = $_POST['repouso_avaliacao'];
    $_SESSION['exercicio'] = $_POST['exercicio_avaliacao'];
    $_SESSION['pressao'] = $_POST['pressao_avaliacao'];
    $_SESSION['borg'] = $_POST['borg_avaliacao'];
    $_SESSION['relato'] = $_POST['relato_avaliacao'];
    $_SESSION['laudo'] = $_POST['laudo_avaliacao'];

    header('Location: confirmaAvaliacao.php');

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
        .input-group-text-divisao{ 
                        color: black;
                        height: 40px; 
                        background-color: transparent; 
                        border-radius: 10px;
                        border-color: transparent;
                        align-content: center; 
                        font-family: Bahnschrift SemiBold;
                        font-size: 30px;
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
			<span class="navbar-brand mb-0 h1">FISIOTERAPIA - AVALIAÇÃO</span>
		</nav>
        
		<div style = "width: auto; background-color: black; margin: 60px auto; align-content: center;"
                     class="container">
            
            
            <form method="POST">
                <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">MATRÍCULA</span>
                    </div>
                    <input type = "text" 
                            style = " font-family: Bahnschrift; font-size: auto; width: 50%; height: 50px; border: 1px solid #ffffff; margin: 5px 5px 5px 5px; padding: 0 10px; border-radius: 10px;"
                            class="form-control" 
                            name = "matricula_aluno" 
                            placeholder = "Digite a matrícula do aluno" 
                            id = "matricula_aluno" required>
                </div>

                <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">DATA</span>
                    </div>
                    <input type = "date" 
                            style = " font-family: Bahnschrift; font-size: auto; width: 50%; height: 50px; border: 1px solid #ffffff; margin: 5px 5px 5px 5px; padding: 0 10px; border-radius: 10px;"
                            class="form-control" 
                            name = "data_avaliacao"
                            id = "data_avaliacao" required>
                </div>

            <div style = "width: 400px;	height: 50px; background-color: #FFC000; margin: 10px auto; border-radius: 10px;"
				class="container">
			<div class="row justify-content-center">
            <span class="input-group-text-divisao" id="inputGroup-sizing-md">ANAMNESE</span>
			</div>
            </div>

            <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">ETILISMO</span>
                    </div>
                    <input type = "text" 
                           style = "
                                font-family: Bahnschrift;
                                font-size: auto;
                                width: 50%;
                                height: 50px;
                                border: 1px solid #ffffff;
                                margin: 5px 5px 5px 5px;
                                padding: 0 10px;
                                border-radius: 10px;"
                           class="form-control" name = "etilismo_avaliacao" placeholder = "Sim ou Não" id = "etilismo_avaliacao" required>
                    
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">TABAGISMO</span>
                    </div>
                    <input type = "text" 
                           style = "
                                font-family: Bahnschrift;
                                font-size: auto;
                                width: 50%;
                                height: 50px;
                                border: 1px solid #ffffff;
                                margin: 5px 5px 5px 5px;
                                padding: 0 10px;
                                border-radius: 10px;"
                           class="form-control" name = "tabagismo_avaliacao" placeholder = "Sim ou Não" id = "tabagismo_avaliacao" required>
            </div>

                <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">HF</span>
                    </div>
                    <input type = "text" 
                            style = " font-family: Bahnschrift; font-size: auto; width: 50%; height: 50px; border: 1px solid #ffffff; margin: 5px 5px 5px 5px; padding: 0 10px; border-radius: 10px;"
                            class="form-control" 
                            name = "hf_avaliacao" 
                            placeholder = "Histórico familiar" 
                            id = "hf_avaliacao" rows = "10"required>
                </div>

                <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">CIRURGIAS</span>
                    </div>
                    <input type = "text" 
                            style = " font-family: Bahnschrift; font-size: auto; width: 50%; height: 50px; border: 1px solid #ffffff; margin: 5px 5px 5px 5px; padding: 0 10px; border-radius: 10px;"
                            class="form-control" 
                            name = "cirurgias_avaliacao" 
                            placeholder = "Histórico de cirurgias" 
                            id = "cirurgias_avaliacao" rows = "10"required>
                </div>

                <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">QUEIXAS</span>
                    </div>
                    <input type = "text" 
                            style = " font-family: Bahnschrift; font-size: auto; width: 50%; height: 50px; border: 1px solid #ffffff; margin: 5px 5px 5px 5px; padding: 0 10px; border-radius: 10px;"
                            class="form-control" 
                            name = "queixas_avaliacao" 
                            placeholder = "Relato dores e desconfortos físicos" 
                            id = "queixas_avaliacao" rows = "10"required>
                </div>
            
            <div style = "width: 400px;	height: 50px; background-color: #FFC000; margin: 10px auto; border-radius: 10px;"
				class="container">
			<div class="row justify-content-center">
            <span class="input-group-text-divisao" id="inputGroup-sizing-md">DOBRAS CUTÂNEAS (Pollock)</span>
			</div>
            </div>

            <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">TRÍCEPS</span>
                    </div>
                    <input type = "text" 
                           style = "
                                font-family: Bahnschrift;
                                font-size: auto;
                                width: 50%;
                                height: 50px;
                                border: 1px solid #ffffff;
                                margin: 5px 5px 5px 5px;
                                padding: 0 10px;
                                border-radius: 10px;"
                           class="form-control" name = "triceps_avaliacao" placeholder = "mm" id = "triceps_avaliacao" required>
                    
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">COXA</span>
                    </div>
                    <input type = "text" 
                           style = "
                                font-family: Bahnschrift;
                                font-size: auto;
                                width: 50%;
                                height: 50px;
                                border: 1px solid #ffffff;
                                margin: 5px 5px 5px 5px;
                                padding: 0 10px;
                                border-radius: 10px;"
                           class="form-control" name = "coxa_avaliacao" placeholder = "mm" id = "coxa_avaliacao" required>
            </div>

            <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">SI</span>
                    </div>
                    <input type = "text" 
                           style = "
                                font-family: Bahnschrift;
                                font-size: auto;
                                width: 50%;
                                height: 50px;
                                border: 1px solid #ffffff;
                                margin: 5px 5px 5px 5px;
                                padding: 0 10px;
                                border-radius: 10px;"
                           class="form-control" name = "iliaca_avaliacao" placeholder = "mm" id = "iliaca_avaliacao" required>
                    
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">ABDOME</span>
                    </div>
                    <input type = "text" 
                           style = "
                                font-family: Bahnschrift;
                                font-size: auto;
                                width: 50%;
                                height: 50px;
                                border: 1px solid #ffffff;
                                margin: 5px 5px 5px 5px;
                                padding: 0 10px;
                                border-radius: 10px;"
                           class="form-control" name = "abdome_avaliacao" placeholder = "mm" id = "abdome_avaliacao" required>
            </div>

            <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">PEITORAL</span>
                    </div>
                    <input type = "text" 
                           style = "
                                font-family: Bahnschrift;
                                font-size: auto;
                                width: 50%;
                                height: 50px;
                                border: 1px solid #ffffff;
                                margin: 5px 5px 5px 5px;
                                padding: 0 10px;
                                border-radius: 10px;"
                           class="form-control" name = "peitoral_avaliacao" placeholder = "mm" id = "peitoral_avaliacao" required>
                    
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">IDADE</span>
                    </div>
                    <input type = "text" 
                           style = "
                                font-family: Bahnschrift;
                                font-size: auto;
                                width: 50%;
                                height: 50px;
                                border: 1px solid #ffffff;
                                margin: 5px 5px 5px 5px;
                                padding: 0 10px;
                                border-radius: 10px;"
                           class="form-control" name = "idade_avaliacao" placeholder = "Ex.: 27" id = "idade_avaliacao" required>
            </div>

            <div style = "width: 400px;	height: 50px; background-color: #FFC000; margin: 10px auto; border-radius: 10px;"
				class="container">
			<div class="row justify-content-center">
            <span class="input-group-text-divisao" id="inputGroup-sizing-md">ERGOMÉTRICO</span>
			</div>
            </div>

            <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">F. REPOUSO</span>
                    </div>
                    <input type = "text" 
                           style = "
                                font-family: Bahnschrift;
                                font-size: auto;
                                width: 50%;
                                height: 50px;
                                border: 1px solid #ffffff;
                                margin: 5px 5px 5px 5px;
                                padding: 0 10px;
                                border-radius: 10px;"
                           class="form-control" name = "repouso_avaliacao" placeholder = "Ex.: 50" id = "repouso_avaliacao" required>
                    
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">F. EXERCÍCIO</span>
                    </div>
                    <input type = "text" 
                           style = "
                                font-family: Bahnschrift;
                                font-size: auto;
                                width: 50%;
                                height: 50px;
                                border: 1px solid #ffffff;
                                margin: 5px 5px 5px 5px;
                                padding: 0 10px;
                                border-radius: 10px;"
                           class="form-control" name = "exercicio_avaliacao" placeholder = "Ex.: 150" id = "exercicio_avaliacao" required>
            </div>

            <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">PRESSÃO</span>
                    </div>
                    <input type = "text" 
                           style = "
                                font-family: Bahnschrift;
                                font-size: auto;
                                width: 50%;
                                height: 50px;
                                border: 1px solid #ffffff;
                                margin: 5px 5px 5px 5px;
                                padding: 0 10px;
                                border-radius: 10px;"
                           class="form-control" name = "pressao_avaliacao" placeholder = "Ex.: 12/8" id = "pressao_avaliacao" required>
                    
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">BORG</span>
                    </div>
                    <input type = "text" 
                           style = "
                                font-family: Bahnschrift;
                                font-size: auto;
                                width: 50%;
                                height: 50px;
                                border: 1px solid #ffffff;
                                margin: 5px 5px 5px 5px;
                                padding: 0 10px;
                                border-radius: 10px;"
                           class="form-control" name = "borg_avaliacao" placeholder = "Escala de 0 - 10" id = "borg_avaliacao" required>
            </div>

                <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">RELATO</span>
                    </div>
                    <input type = "text" 
                            style = " font-family: Bahnschrift; font-size: auto; width: 50%; height: 50px; border: 1px solid #ffffff; margin: 5px 5px 5px 5px; padding: 0 10px; border-radius: 10px;"
                            class="form-control" 
                            name = "relato_avaliacao" 
                            placeholder = "Relato do aluno durante o exame" 
                            id = "relato_avaliacao" rows = "10"required>
                </div>

                <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">LAUDO</span>
                    </div>
                    <input type = "text" 
                            style = " font-family: Bahnschrift; font-size: auto; width: 50%; height: 50px; border: 1px solid #ffffff; margin: 5px 5px 5px 5px; padding: 0 10px; border-radius: 10px;"
                            class="form-control" 
                            name = "laudo_avaliacao" 
                            placeholder = "Laudo médico pós avaliação" 
                            id = "laudo_avaliacao" rows = "10"required>
                </div>
                <div style = "width: 400px;
						background-color: #FFC000;
						margin: 40px auto;
						border-radius: 30px;"
				class="container">
			<div class="row justify-content-center">
            <input type = "submit" 
                    name = "registrar"
                    value = "REGISTRAR"
                    style = "border-color: transparent; width: 250px; height: 100px; background-color: #FFC000; font-family: Bahnschrift SemiBold; font-size: 30px; border-radius: 15px;">
        </div>
        </form>
    <body>
</html>