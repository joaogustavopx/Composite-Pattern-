<?php

spl_autoload_register(function ($classe) {
    if (file_exists("{$classe}.class.php")) {
        include_once "{$classe}.class.php";
    }
  });

  //Criar criterio de seleção 
  $criteria1 = new TCriteria;

  //seleciona todas as meninas (F) que estão na (3) série
  $criteria1->add(new TFilter(' sexo','=','F '));
  $criteria1->add(new TFilter(' serie','=','3 '));

  //seleciona todos os meninos que estão na quarta(4) série
  $criteria2 = new TCriteria;
  $criteria2->add(new TFilter(' sexo','=','M '));
  $criteria2->add(new TFilter(' serie','=','4 ' ));

  //agora juntamos os dois criterios utilizando o operador lógico OR(OU)
  //o resultado deve conter meninas da 3° serie e meninos da 4° serie
  $criteria = new TCriteria;
  $criteria->add($criteria1, TExpression::OR_OPERATOR);
  $criteria->add($criteria2, TExpression::AND_OPERATOR);
  
  //define o ordenamento
  $criteria->setProperty(' order ',' nome ');

  //cria a instrução da SELECT
  $sql = new TSqlSelect;

  //define o nome da entidade
  $sql->setEntity(' aluno ');

  //acrescenta todas as colunas a consulta
  $sql->addColumn(' * ');

  //define o criterio de seleção dos dados
  $sql->setCriteria($criteria);

  //processa a instrução SQL
  echo $sql->getInstruction();
  echo "<br>\n";

?>