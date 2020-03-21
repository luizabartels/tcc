<?php
    class Avaliacao extends banco_mysql
    {
        public $matricula;
        public $data;
        public $sexo;
        public $etilismo;
        public $tabagismo;
        public $triceps;
        public $iliaca;
        public $peitoral;
        public $coxa;
        public $abdome;
        public $idade;
        public $repouso;
        public $exercicio;
        public $pressao;
        public $borg;

        public function registraAvaliacao($dados = array())
        {
            $sqlSelecionar = "SELECT matricula, id FROM alunos";
            $selecionar = self::conn()->prepare($sqlSelecionar);
            $selecionar -> execute();
            $comp_flag = false;

            if($selecionar->rowCount() >= 1)
            {
                $i = $selecionar->rowCount();
                $result = $selecionar->fetchAll();

                for ($cont = 0; $cont < $i; $cont++)
                {
                    if ($result[$cont]['matricula'] == $dados[0])
                    {
                      $aluno_id = $result[$cont]['id'];

                      $sqlInserir = "INSERT INTO `avaliacao` (`id`, `matricula`, `data`, `sexo`, `etilismo`, `tabagismo`, `historico`, `cirurgias`, `queixas`, `triceps`, `iliaca`, `peitoral`, `coxa`, `abdome`, `idade`, `repouso`, `exercicio`, `pressao`, `borg`, `relato`, `laudo`, `alunos_id`) 
                                    VALUES (NULL,'$dados[0]', '$dados[1]', '$dados[2]', '$dados[3]', '$dados[4]', '$dados[5]', '$dados[6]', '$dados[7]', '$dados[8]', '$dados[9]', '$dados[10]', '$dados[11]', '$dados[12]', '$dados[13]', '$dados[14]', '$dados[15]', '$dados[16]', '$dados[17]', '$dados[18]', '$dados[19]', '$aluno_id')";

                      $stmt = self::conn()->prepare($sqlInserir);

                      if($stmt->execute($dados)) return true;
                      else return false;
                    }
                }
            }
        }

        /**
         * Calcula densidade corporal e porcentagem de gordura em homens e mulheres acima de 18 anos.
         * Cálculos extraídos do site: https://www.cdof.com.br/protocolos1.htm
         */
        public function calculaProtocoloPollock($sexo, $idade, $triceps, $iliaca, $coxa, $peitoral, $abdome)
        {
            $indices = array();

            $x1 = $peitoral + $abdome + $coxa;
            $x2 = $triceps + $iliaca + $coxa;
            $x3 = $idade;

            if (strcmp($sexo, "M") == 0) $indices[0] = 1.1093800 - 0.0008267 * $x1 + 0.0000016 * ($x1 * $x1) - 0.0002574 * $x3;
            else $indices[0] = 1.0994921 - 0.0009929 * $x2 + 0.0000023 * ($x2 * $x2) - 0.0001392 * $x3;
            
            $indices[1] = ((4.95 / $indices[0]) - 4.50) * 100;

            return $indices;
        }
        
    }
?>