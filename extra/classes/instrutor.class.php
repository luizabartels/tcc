<?php
    class Instrutores extends banco_mysql
    {
        public $nome;
        public $cpf;
        public $identidade;
        public $atividades;

        public function existeInstrutor($cpf)
        {
            $sqlSelecionar = "SELECT cpf FROM instrutores";
            $selecionar = self::conn()->prepare($sqlSelecionar);
            $selecionar -> execute();
            $comp_flag = false;

            if($selecionar->rowCount() >= 1)
            {
                $i = $selecionar->rowCount();
                $result = $selecionar->fetchAll();

                for ($cont = 0; $cont < $i; $cont++)
                {
                    if ($result[$cont]['cpf'] == $cpf) $comp_flag = true;

                    if ($comp_flag == true) return true;
                }
            }
        }

        public function cadastraInstrutor($dados = array())
        {
            if($this->existeInstrutor($dados[2])) return false;
            else
            {
                $sqlInserir = "INSERT INTO `instrutores` (`nome`, `identidade`, `cpf`, `atividades`) 
                                VALUES ('$dados[0]', '$dados[1]', '$dados[2]', '$dados[3]')";

                $stmt = self::conn()->prepare($sqlInserir);

                if($stmt->execute($dados)) return true;
                else return false;
            }
        }
    }
?>