<?php
    class Aulas extends banco_mysql
    {
        public $aula;
        public $inicio;
        public $fim;
        public $dias;
        public $instrutor;
        public $sala;

        public function cadastraAula($dados = array())
        {
          $sqlSelecionar = "SELECT nome, id FROM instrutores";
            $selecionar = self::conn()->prepare($sqlSelecionar);
            $selecionar -> execute();
            $comp_flag = false;

            if($selecionar->rowCount() >= 1)
            {
                $i = $selecionar->rowCount();
                $result = $selecionar->fetchAll();

                for ($cont = 0; $cont < $i; $cont++)
                {
                    if ($result[$cont]['nome'] == $dados[4])
                    {
                      $instrutores_id = $result[$cont]['id'];
                      $sqlInserir = "INSERT INTO `aula` (`id`, `aula`, `inicio`, `fim`, `dias`, `instrutor`, `sala`, `instrutores_id`) 
                                      VALUES (NULL, '$dados[0]', '$dados[1]', '$dados[2]', '$dados[3]', '$dados[4]', '$dados[5]', '$instrutores_id')";

                      $stmt = self::conn()->prepare($sqlInserir);

                      if($stmt->execute($dados)) return true;
                      else return false;
                    }
                }
            }
          }

        public function procuraAula()
        {
            date_default_timezone_set('America/Sao_Paulo');
            $hora_atual = new DateTime();
            $hora_atual -> format("%H:%I:%S");
            $hora_atual_int = strtotime(date_format($hora_atual, 'H:i:s')); // converte a hora em inteiro para comparações

            $dia = date('w');
            $dias = array('Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado');

            $sqlSelecionar = "SELECT aula, inicio, fim, dias, instrutor, sala FROM aula ORDER BY inicio";
            $selecionar = self::conn()->prepare($sqlSelecionar);
            $selecionar -> execute();

            $dadosAula = array();
            $dadosAulaFinal = array();
            $j = -1;

            if($selecionar->rowCount() >= 1)
            {
                $i = $selecionar->rowCount();
                $result = $selecionar->fetchAll();

                for ($cont = 0; $cont < $i; $cont++)
                {
                    $inicio = $result[$cont]['inicio'];
                    $inicio_int = strtotime($inicio);
                    $inicio = new DateTime("$inicio");
                    $dif_hora = $hora_atual_int - $inicio_int;
                    
                    $dias_aula = $result[$cont]['dias'];
                    $tok = strtok($dias_aula, " - ");

                    while ($tok !== false) 
                    {
                      if ($tok == $dias[$dia])
                      {
                        if ($dif_hora < 0)
                        {
                          $j++;
                          $dadosAula[0] = $result[$cont]['aula'];
                          $dadosAula[1] = $result[$cont]['inicio'];
                          $dadosAula[2] = $result[$cont]['instrutor'];
                          $dadosAula[3] = $result[$cont]['sala'];
                          $dadosAulaFinal[$j] = $dadosAula;
                        } //fim comp hora
                      } //fim tok de dias da semana
                      $tok = strtok(" - ");
                    } //fim enquanto tok estiver cheio
                } //fim for
            } //fim resultados
            return $dadosAulaFinal;
        }
    }
?>