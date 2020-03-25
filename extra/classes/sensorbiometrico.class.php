<?php
    class SensorBiometrico
    {
        /**
         * Captura buffer advindo de porta serial. Neste caso, uma string simples de um emulador.
         */
        public function autenticaDigital()
        {
            date_default_timezone_set('America/Sao_Paulo');
            
            $hora_atual = new DateTime();
            $hora_atual = date_format($hora_atual,'H:i:s');

            $command = escapeshellcmd('python ./extra/com_serial/leitor_digital.py');

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
            return $output;
        }
    }
?>