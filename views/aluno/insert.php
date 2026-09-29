<?php
   //Incluir o arquivo de autoload
   require "../../autoload.php";

   //Instanciar um objeto da classe (bean)
   $aluno =new Aluno ();

   //Defenir os valores dos atributos a partir do form
   $aluno->setNome($_POST['nome']);
     $aluno->setEmail($_POST['email']);
       $aluno->setMatricula($_POST['matricula']);
      
       $dao=new AlunoDao ();

       $dao->create ($aluno);

       header('location; index.php');