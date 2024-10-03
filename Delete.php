<?php

// Função para o autoload das classes
spl_autoload_register(function ($classe) {
    if (file_exists("{$classe}.class.php")) {
        include_once "{$classe}.class.php";
    }
});

//cria uma seleção  de dados
$criteria = new TCriteria;
$criteria->add(new TFilter('id', '=', '3'));

//cria instrução de DELETE
$sql = new TSqlDelete;

//Define a entidade 
$sql->setEntity('Aluno');

//define o critério de seleção de dados
$sql->setCriteria($criteria);

//processa a instrução sql 
echo $sql->getInstruction();

echo "<br>\n";

?>