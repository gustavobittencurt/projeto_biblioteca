<?php
    class EditoraDAO {
        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM editora");
                
                if(!$query->execute()){
                    print_r($query->errorInfo());
                }

                $listaEditoras = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $editora = new Editora(); // Classe bean
                    $editora->setId($linha['id_editora']);
                    $editora->setNome($linha['nome']);
                    $editora->setCidade($linha['cidade']);

                    array_push($listaEditoras, $editora);
                }

                return $listaEditoras;
            } 
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }
    }