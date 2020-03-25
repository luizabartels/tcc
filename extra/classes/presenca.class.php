<?php
    class Presenca extends banco_mysql
    {
        public $matricula;
        public $aula;
        public $inicio;
        public $data;

        public function cadastraPresenca($dados = array())
        {

            $sqlSelecionar = "SELECT matricula, id FROM alunos";
            $selecionar = self::conn()->prepare($sqlSelecionar);
            $selecionar -> execute();

            if($selecionar->rowCount() >= 1)
            {
                $i = $selecionar->rowCount();
                $result = $selecionar->fetchAll();

                for ($cont = 0; $cont < $i; $cont++)
                {
                    if ($result[$cont]['matricula'] == $dados[0])
                    {
                      $id_aluno = $result[$cont]['id'];
                    }
                }
            }

            $sqlSelecionar = "SELECT aula, inicio, id FROM aula";
            $selecionar = self::conn()->prepare($sqlSelecionar);
            $selecionar -> execute();

            if($selecionar->rowCount() >= 1)
            {
                $i = $selecionar->rowCount();
                $result = $selecionar->fetchAll();

                for ($cont = 0; $cont < $i; $cont++)
                {
                    if ($result[$cont]['aula'] == $dados[1] || $result[$cont]['inicio'] == $dados[2])
                    {
                      $id_aula = $result[$cont]['id'];
                    }
                }
            }

            $sqlInserir = "INSERT INTO `presenca` (`id`, `matricula`, `aula`, `inicio`, `data`, `alunos_id`, `aula_id`) 
                            VALUES (NULL, '$dados[0]', '$dados[1]', '$dados[2]', '$dados[3]', '$id_aluno', '$id_aula')";

            $stmt = self::conn()->prepare($sqlInserir);

            if($stmt->execute($dados)) return true;
            else return false;
        }

        public function procuraPresenca($matricula)
        {
            $sqlSelecionar = "SELECT `matricula`, `aula`, `inicio`, `data` FROM `presenca`";
            $selecionar = self::conn()->prepare($sqlSelecionar);
            $selecionar -> execute();

            $dadosPresenca = array();
            $dadosPresencaFinal = array();
            $j = -1;

            if($selecionar->rowCount() >= 1)
            {
                $i = $selecionar->rowCount();
                $result = $selecionar->fetchAll();

                for ($cont = 0; $cont < $i; $cont++)
                {
                    if ($result[$cont]['matricula'] == $matricula)
                        {
                            $j++;
                            $dadosPresenca[0] = $result[$cont]['aula'];
                            $dadosPresenca[1] = $result[$cont]['data'];
                            $dadosPresenca[2] = $result[$cont]['inicio'];
                            $dadosPresencaFinal[$j] = $dadosPresenca;
                        } //fim comp matricula
                } //fim for
            } //fim resultados
            return $dadosPresencaFinal;
        }
    }
?>