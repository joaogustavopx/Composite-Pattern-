<?php

/*Classe TSqlSelect
*Essa classe provê meios para manipulação de uma instrução SQL de select BD
*/

final class TSqlSelect extends TSqlInstruction{

    private $column; //array de colunas a serem retornadas

    /*Método addColumn
    *adiciona uma coluna a ser retornada pelo SELECT
    *@param $column = coluna da tabela
*/

    public function addColumn($column){
        $this->columns[] = $column;
    }

    /*Métofo getInstruction()
    *retorna a instrução de SELECT em forma de string
    */

    public function getInstruction(){
        //monta a instrução SQL

        $this->sql = 'SELECT';

        //monta string com os nomes das colunas 
        $this->sql .= implode(',', $this->columns);

        //adiciona na clausula FROM o nome da tabela
        $this->sql .= 'FROM' . $this->entity;

        //obtem a clausula where do objeto criteria
        if($this->criteria){
            $expression = $this->criteria->dump();
            if($expression){
                $this->sql .= 'WHERE' . $expression;
    }

    //obtem as propriedades do criterio

    $order = $this->criteria->getProperty('order');
    $limit = $this->criteria->getProperty('limit');
    $offset = $this->criteria->getProperty('offset');

    //obtem a ordenação do SELECT

    if($order){
        $this->sql .= ''. $order;
}
        }
    }
}


?>