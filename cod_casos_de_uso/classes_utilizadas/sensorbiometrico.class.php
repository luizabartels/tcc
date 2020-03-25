<?php
    class SensorBiometrico
    {
        /**
         * Captura buffer advindo de porta serial. Neste caso, uma string simples de um emulador.
         */
        public function autenticaDigital()
        {
            date_default_timezone_set('America/Sao_Paulo');

            $command = escapeshellcmd('python ./extra/com_serial/leitor_digital.py');

            $hora_atual = new DateTime();
            $hora_atual = date_format($hora_atual,'H:i:s');
            $hora = $hora_atual;

            $dif_hora =(strtotime($hora) - strtotime($hora_atual));
            $dif_hora = date('s', $dif_hora);

            while ($dif_hora < 3)
            {
                $output = shell_exec($command);
                $output = strtok($output, "b'");
                
                $hora = new DateTime();
                $hora = date_format($hora,'H:i:s');

                $dif_hora =(strtotime($hora) - strtotime($hora_atual));
                $dif_hora = date('s', $dif_hora);
            }
            return $output;
        }
    }
?>