<?php
    class Adm extends banco_mysql
    {
        /**
         * Autentica a existência de um gerente, recepcionista ou fisioterapeuta para criar a página do aluno
         */
        public function autenticaAdm($matricula)
        {
            $sqlSelecionar = "SELECT matricula FROM adm";
            $selecionar = self::conn()->prepare($sqlSelecionar);
            $selecionar -> execute();

            if($selecionar->rowCount() >= 1)
            {
                $i = $selecionar->rowCount();

                $result = $selecionar->fetchAll();

                for ($cont = 0; $cont < $i; $cont++)
                {
                    if ($result[$cont]['matricula'] == $matricula) return $matricula;
                }
            }
        }
    }
?>