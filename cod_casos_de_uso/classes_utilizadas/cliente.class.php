<?php
    class Cliente extends banco_mysql
    {
        public $aluno_matricula;
        public $aluno_nome;
        public $aluno_identidade;
        public $aluno_cpf;
        public $aluno_endereco;
        public $aluno_plano;
        public $aluno_pagamento;
        public $aluno_ppagamento;
        public $aluno_dferias;
        public $aluno_flagferias;
        public $aluno_dfisio;
        public $aluno_hfisio;
        public $aluno_digital;

        /**
         * Agenda avaliação fisioterápica
         */
        public function agendamentoAvaliacao($matricula, $dfisio, $hfisio)
        {
            $sqlSelecionar = "SELECT matricula FROM alunos";
            $selecionar = self::conn()->prepare($sqlSelecionar);
            $selecionar -> execute();

            $dadosAlunos = array();

            if($selecionar->rowCount() >= 1)
            {
                $i = $selecionar->rowCount();
                $result = $selecionar->fetchAll();

                for ($cont = 0; $cont < $i; $cont++)
                {
                    if ($result[$cont]['matricula'] == $matricula)
                    {
                        $sqlUpdate = ("UPDATE `alunos` SET `dfisio` = '$dfisio', `hfisio` = '$hfisio' WHERE `alunos`.`matricula` = $matricula");
                        $update = self::conn()->prepare($sqlUpdate);
                        $update -> execute();
                    }
                }
            } 
        }

        /**
         * Agenda férias para planos anuais
         */
        public function registraFerias($matricula, $dferias, $ppagamento, $flagferias)
        {
            $sqlSelecionar = "SELECT matricula FROM alunos";
            $selecionar = self::conn()->prepare($sqlSelecionar);
            $selecionar -> execute();

            $dadosAlunos = array();

            if($selecionar->rowCount() >= 1)
            {
                $i = $selecionar->rowCount();
                $result = $selecionar->fetchAll();

                for ($cont = 0; $cont < $i; $cont++)
                {
                    if ($result[$cont]['matricula'] == $matricula)
                    {
                        $sqlUpdate = ("UPDATE `alunos` SET `dferias` = '$dferias', `ppagamento` = '$ppagamento', `flagferias` = '$flagferias' WHERE `alunos`.`matricula` = $matricula");
                        $update = self::conn()->prepare($sqlUpdate);
                        $update -> execute();
                    }
                }
            }
        }

        /**
         * Registra pagamento dos alunos
         */
        public function registraPagamento($matricula, $pagamento, $ppagamento)
        {
            $sqlSelecionar = "SELECT matricula, plano FROM alunos";
            $selecionar = self::conn()->prepare($sqlSelecionar);
            $selecionar -> execute();

            if($selecionar->rowCount() >= 1)
            {
                $i = $selecionar->rowCount();
                $result = $selecionar->fetchAll();

                for ($cont = 0; $cont < $i; $cont++)
                {
                    if ($result[$cont]['matricula'] == $matricula)
                    {
                        $sqlUpdate = ("UPDATE `alunos` SET `pagamento` = '$pagamento', `ppagamento` = '$ppagamento' WHERE `alunos`.`matricula` = $matricula");
                        $update = self::conn()->prepare($sqlUpdate);
                        $update -> execute();
                    }
                }
            }
        }

        /**
         * Registra digital de aluno
         */
        public function cadastraDigital($matricula, $digital)
        {
            $sqlSelecionar = "SELECT matricula, plano FROM alunos";
            $selecionar = self::conn()->prepare($sqlSelecionar);
            $selecionar -> execute();

            if($selecionar->rowCount() >= 1)
            {
                $i = $selecionar->rowCount();
                $result = $selecionar->fetchAll();

                for ($cont = 0; $cont < $i; $cont++)
                {
                    if ($result[$cont]['matricula'] == $matricula)
                    {
                        $sqlUpdate = ("UPDATE `alunos` SET `digital` = '$digital' WHERE `alunos`.`matricula` = $matricula");
                        $update = self::conn()->prepare($sqlUpdate);
                        $update -> execute();
                    }
                }
            }
        }

        /**
         * Lista alunos por ordem alfabética para exibição para a gerência
         */
        public function listaAlfabetica()
        {
            $sqlSelecionar = "SELECT nome, matricula, identidade, cpf, endereco, plano, pagamento, ppagamento FROM alunos ORDER BY nome ASC";
            $selecionar = self::conn()->prepare($sqlSelecionar);
            $selecionar -> execute();

            date_default_timezone_set('America/Sao_Paulo');
            $data_atual = new DateTime();
            $data_atual = date_format($data_atual, 'Y-m-d');
            $data_atual = strtotime(str_replace('-','/', $data_atual));

            $dadosAlunos = array();
            $j = -1;

            if($selecionar->rowCount() >= 1)
            {
                $i = $selecionar->rowCount();
                $result = $selecionar->fetchAll();

                for ($cont = 0; $cont < $i; $cont++)
                {
                    $j++;
                    $dadosAlunos[0] = $result[$cont]['matricula'];
                    $dadosAlunos[1] = $result[$cont]['nome'];
                    $dadosAlunos[2] = $result[$cont]['identidade'];
                    $dadosAlunos[3] = $result[$cont]['cpf'];
                    $dadosAlunos[4] = $result[$cont]['endereco'];
                    $dadosAlunos[5] = $result[$cont]['plano'];
                    $dadosAlunos[6] = $result[$cont]['pagamento'];
                    $dadosAlunos[7] = $result[$cont]['ppagamento'];

                    $dadosAlunosFinal[$j] = $dadosAlunos;
                } //fim for
            }
            return $dadosAlunosFinal;
        }


        /**
         * Lista alunos conforme a data de pagamento para exibição para a gerência
         */
        public function listaPagamento()
        {
            $sqlSelecionar = "SELECT nome, matricula, identidade, cpf, endereco, plano, pagamento, ppagamento FROM alunos ORDER BY ppagamento";
            $selecionar = self::conn()->prepare($sqlSelecionar);
            $selecionar -> execute();

            date_default_timezone_set('America/Sao_Paulo');
            $data_atual = new DateTime();
            $data_atual = date_format($data_atual, 'Y-m-d');
            $data_atual = strtotime(str_replace('-','/', $data_atual));

            $dadosAlunos = array();
            $j = -1;

            if($selecionar->rowCount() >= 1)
            {
                $i = $selecionar->rowCount();
                $result = $selecionar->fetchAll();

                for ($cont = 0; $cont < $i; $cont++)
                {
                    $j++;
                    $dadosAlunos[0] = $result[$cont]['matricula'];
                    $dadosAlunos[1] = $result[$cont]['nome'];
                    $dadosAlunos[2] = $result[$cont]['identidade'];
                    $dadosAlunos[3] = $result[$cont]['cpf'];
                    $dadosAlunos[4] = $result[$cont]['endereco'];
                    $dadosAlunos[5] = $result[$cont]['plano'];
                    $dadosAlunos[6] = $result[$cont]['pagamento'];
                    $dadosAlunos[7] = $result[$cont]['ppagamento'];

                    $dadosAlunosFinal[$j] = $dadosAlunos;
                } //fim for
            }
            return $dadosAlunosFinal;
        }


        /**
         * Lista alunos inadimplentes para exibição para a gerência
         */
        public function listaInadimplentes()
        {
            $sqlSelecionar = "SELECT nome, matricula, identidade, cpf, endereco, plano, pagamento, ppagamento FROM alunos ORDER BY ppagamento";
            $selecionar = self::conn()->prepare($sqlSelecionar);
            $selecionar -> execute();

            date_default_timezone_set('America/Sao_Paulo');
            $data_atual = new DateTime();
            $data_atual = date_format($data_atual, 'Y-m-d');
            $data_atual = strtotime(str_replace('-','/', $data_atual));

            $dadosAlunos = array();
            $j = -1;

            if($selecionar->rowCount() >= 1)
            {
                $i = $selecionar->rowCount();
                $result = $selecionar->fetchAll();

                for ($cont = 0; $cont < $i; $cont++)
                {
                    $prpagamento = $result[$cont]['ppagamento'];
                    $prpagamento = strtotime(str_replace('-','/', $prpagamento));
                    $dif_data = ($data_atual - $prpagamento)/86400;

                    if ($dif_data >= 0)
                    {
                        $j++;
                        $dadosAlunos[0] = $result[$cont]['matricula'];
                        $dadosAlunos[1] = $result[$cont]['nome'];
                        $dadosAlunos[2] = $result[$cont]['identidade'];
                        $dadosAlunos[3] = $result[$cont]['cpf'];
                        $dadosAlunos[4] = $result[$cont]['endereco'];
                        $dadosAlunos[5] = $result[$cont]['plano'];
                        $dadosAlunos[6] = $result[$cont]['pagamento'];
                        $ppagamento = $result[$cont]['ppagamento'];
                        $ppagamento = strtotime(str_replace('-','/', $ppagamento));
                        $dadosAlunos[7] = date('d-m-Y', $ppagamento);

                        $dadosAlunosFinal[$j] = $dadosAlunos;
                    } // fim comp data
                } //fim for
            }
            return $dadosAlunosFinal;
        }

        /**
         * Autentica a existência de um cliente para criar a de agenda do fisioterapeuta
         */
        public function agendaFisioterapeuta()
        {
            date_default_timezone_set('America/Sao_Paulo');
            $data_atual = new DateTime();
            $data_atual = date_format($data_atual, 'Y-m-d');
            $data_atual = strtotime(str_replace('-','/', $data_atual));

            $hora_atual = new DateTime();
            $hora_atual -> format("H:i:s");
            $hora_atual_int = strtotime(date_format($hora_atual, 'H:i:s')); // converte a hora em inteiro para comparações

            $hora_array = array();
            $matricula_array = array();
            $dia_array = array();

            $sqlSelecionar = "SELECT matricula, dfisio, hfisio FROM alunos ORDER BY hfisio";
            $selecionar = self::conn()->prepare($sqlSelecionar);
            $selecionar -> execute();

            $dadosAlunos = array();
            $dadosAlunosFinal = array();
            $j = -1;

            if($selecionar->rowCount() >= 1)
            {
                $i = $selecionar->rowCount();
                $result = $selecionar->fetchAll();

                for ($cont = 0; $cont < $i; $cont++)
                {
                    $dfisio = $result[$cont]['dfisio'];
                    $dfisio = strtotime(str_replace('-','/', $dfisio));
                    $dif_data = ($data_atual - $dfisio)/86400;

                    $hfisio = $result[$cont]['hfisio'];
                    $hfisio_int = strtotime($hfisio);
                    $hfisio = new DateTime("$hfisio");

                    $dif_hora = $hora_atual_int - $hfisio_int;

                    if ($dif_data == 0)
                    {
                        if ($dif_hora < 0) 
                        {
                            $j++;
                            $dadosAlunos[0] = $result[$cont]['matricula'];
                            $dadosAlunos[1] = $result[$cont]['dfisio'];
                            $dadosAlunos[2] = $result[$cont]['hfisio'];
                            $dadosAlunosFinal[$j] = $dadosAlunos;
                        } //fim comp hora
                    } // fim comp data
                } //fim for
            } //fim resultados
            return $dadosAlunosFinal;
        }
        /**
         * Seleciona a digital de um aluno específico
         */
        public function selecionaDigital($digital)
        {
            $sqlSelecionar = "SELECT matricula, digital FROM alunos";
            $selecionar = self::conn()->prepare($sqlSelecionar);
            $selecionar -> execute();

            $dadosAlunos = 0;

            if($selecionar->rowCount() >= 1)
            {
                $i = $selecionar->rowCount();
                $result = $selecionar->fetchAll();

                for ($cont = 0; $cont < $i; $cont++)
                {
                    if ($result[$cont]['digital'] == $digital)
                    {
                        $dadosAlunos = $result[$cont]['matricula'];
                    }
                }
            }
            return $dadosAlunos;
        }


        /**
         * Autentica a existência de um cliente para criar a página do aluno
         */
        public function selecionaDadosCliente($matricula)
        {
            $sqlSelecionar = "SELECT matricula, nome, pagamento, ppagamento, dfisio, plano, dferias, flagferias FROM alunos";
            $selecionar = self::conn()->prepare($sqlSelecionar);
            $selecionar -> execute();

            $dadosAlunos = array();

            if($selecionar->rowCount() >= 1)
            {
                $i = $selecionar->rowCount();
                $result = $selecionar->fetchAll();

                for ($cont = 0; $cont < $i; $cont++)
                {
                    if ($result[$cont]['matricula'] == $matricula)
                    {
                        $dadosAlunos[0] = $result[$cont]['matricula'];
                        $dadosAlunos[1] = $result[$cont]['nome'];
                        $dadosAlunos[2] = $result[$cont]['pagamento'];
                        $dadosAlunos[3] = $result[$cont]['ppagamento'];
                        $dadosAlunos[4] = $result[$cont]['dfisio'];
                        $dadosAlunos[5] = $result[$cont]['plano'];
                        $dadosAlunos[6] = $result[$cont]['dferias'];
                        $dadosAlunos[7] = $result[$cont]['flagferias'];
                    }
                }
            }
            return $dadosAlunos;
        }


        /**
         * Autentica a existência de um cliente fazer login
         */
        public function autenticaCliente($matricula)
        {
            $sqlSelecionar = "SELECT matricula FROM alunos";
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


        /**
         * Compara matrícula e CPF para registro
         */
        public function existeCliente($matricula, $cpf)
        {
            $sqlSelecionar = "SELECT matricula, cpf FROM alunos";
            $selecionar = self::conn()->prepare($sqlSelecionar);
            $selecionar -> execute();
            $comp_flag = false;

            if($selecionar->rowCount() >= 1)
            {
                $i = $selecionar->rowCount();
                $result = $selecionar->fetchAll();

                for ($cont = 0; $cont < $i; $cont++)
                {
                    if ($result[$cont]['matricula'] == $matricula || $result[$cont]['cpf'] == $cpf) $comp_flag = true;

                    if ($comp_flag == true) return true;
                }
            }
        }


        /**
         * Cadastro de Clientes
         */
        public function cadastrarUsuario($dados = array())
        {
            if($this->existeCliente($dados[0], $dados[3]))return false;
            else
            {
                $sqlInserir = "INSERT INTO `alunos` (`matricula`, `nome`, `identidade`, `cpf`, `endereco`, `plano`, `pagamento`, `ppagamento`) 
                VALUES ('$dados[0]', '$dados[1]', '$dados[2]', '$dados[3]', '$dados[4]', '$dados[5]', '$dados[6]', '$dados[7]')";

                $stmt = self::conn()->prepare($sqlInserir);

                if($stmt->execute($dados)) return true;
                else return false;
            }
        }
    }
?>