<?php
    class AlunoDAO {
        public function create($aluno){
            try {
                $query = BD :: getConexao ()->prepare("INSERT INTO aluno (nome,email,matricula)
                VALUES(:n, :c, :m)"
                );
                 $query->bindValue(':n, $aluno->getNome(),PDO::PARAM_STR)');
                 $query->bindValue(':e, $aluno->getEmail(),PDO::PARAM_STR)');
                 $query->bindValue(':m, $aluno->getMatricula(),PDO::PARAM_STR)');
                    if(!$query->execute()){
                    print_r($query->errorInfo());
                }
                 }  
             catch(PDOException $e) {
                echo "Erro #1: " . $e->getMessage();
        }

      }
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