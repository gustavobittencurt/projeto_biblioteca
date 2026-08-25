<?php
    class AlunoDAO {
        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM aluno");
                
                if(!$query->execute()){
                    print_r($query->errorInfo());
                }

                $listaAlunos = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $aluno = new Aluno(); // Classe bean
                    $aluno->setId($linha['id_aluno']);
                    $aluno->setNome($linha['nome']);
                    $aluno->setEmail($linha['email']);
                    $aluno->setMatricula($linha['matricula']);

                    array_push($listaAlunos, $aluno);
                }

                return $listaAlunos;
            } 
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }
    }