<?php
    class AlunoDAO {
        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM aluno");
                // Continuar a partir daqui...

            } 
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }
    }