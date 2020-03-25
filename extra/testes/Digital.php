<?php

    date_default_timezone_set('America/Sao_Paulo');

    $hora_atual = new DateTime();
    $hora_atual = date_format($hora_atual,'H:i:s');

    $command = escapeshellcmd('python leitor_digital.py');
   
    $hfisio = new DateTime();
    $hfisio = date_format($hfisio,'H:i:s');

    $dif_hora =(strtotime($hfisio) - strtotime($hora_atual));
    $dif_hora = date('s',$dif_hora);

    while ($dif_hora < 3)
    {
        $hfisio = new DateTime();
        $hfisio = date_format($hfisio,'H:i:s');

        $dif_hora =(strtotime($hfisio) - strtotime($hora_atual));
        $dif_hora = date('s',$dif_hora);

        $output = shell_exec($command);

        $output = strtok($output, "b'");
    }

    if ($output == NULL)
    {
        header('Location: login_error.php');
    }
    else if ($output != NULL)
    {
        $digital = $output;
        
        include("extra/conexao_bd.php");
    
        if ($stmt = $con->prepare('SELECT matricula FROM alunos WHERE digital = ?')) 
        {
            $stmt->bind_param('i', $digital);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0)
            {
                $stmt->bind_result($matricula);
                $stmt->fetch();

                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['matricula'] = $matricula;
                
                header('Location: pgAluno.php');
            }
            else
            {
                echo 'Usuário não encontrado';
            }
        }
    }
?>