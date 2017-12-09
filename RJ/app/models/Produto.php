<?php
/**
 * Created by PhpStorm.
 * User: JEFFERSON
 * Date: 09/11/2017
 * Time: 10:40
 */

require_once "Conexao.php";

class Produto {

    public $id;
    public $nome;
    public $preco;
    public $categoria;
    public $estoque;

    public function __construct($nome, $preco, $categoria,$estoque, $id = null){
        $this->nome = $nome;
        $this->preco = $preco;
        $this->categoria = $categoria;
        $this->estoque = $estoque;
        $this->id = $id;
    }

    public function estaDisponivel(){
        // o estqoeu for maior que zero retorna disponivel
        if ($this->estoque > 0){
            echo "Disponivel";
        }else{
            echo "Indisponivel";
        }
    }

}
