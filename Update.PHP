<?php
/* função autoload
*carrega uma classe quando ela é necessária, ou seja, quando é instanciado
*pela primeira vez
*/

spl_autoload_register(function ($classe) {
    if (file_exists("{$classe}.class.php")) {
        include_once "{$classe}.class.php";
    }
});

// cria um criterio de seleção de dados

$criteria = new TCriteria;
$criteria->add(new TFilter('id', '=','3'));

//cria instrução de UPDATE

$sql = new TSqlUpdate;
//define a entidade
$sql->setEntity('aluno');
//atribui o valor de cada coluna
$sql->setRowData('Nome', 'Pedro Cardoso da Silva');
$sql->setRowData('Rua', 'Machado de Assis');
$sql->setRowData('Fone', '(51) 4002-8922');

//defina o critério de seleção de dados
$sql->setCriteria($criteria);

//processa instrução SQL

echo $sql->getInstruction();

echo "<br>\n";


?>