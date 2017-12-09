<?php


require_once "Conexao.php";
require_once "Produto.php";

class CrudProdutos {

    private $conexao;
    private $produto;

    public function __construct() {
        $this->conexao = Conexao::getConexao();
    }

    public function salvar(Produto $produto){
        $sql = "INSERT INTO tb_produtos (nome, preco, categoria, estoque) VALUES ('$produto->nome', '$produto->preco', '$produto->categoria', '$produto->estoque')";

        $this->conexao->exec($sql);
    }

    public function getProduto(int $id){
        $consulta = $this->conexao->query("SELECT * FROM tb_produtos WHERE id = $id");
        $produto = $consulta->fetch(PDO::FETCH_ASSOC); //SEMELHANTES JSON ENCODE E DECODE

        return new Produto($produto['nome'], $produto['preco'], $produto['categoria'], $produto['estoque'], $produto['id']);

    }

    public function getProdutos(){
        $consulta = $this->conexao->query("SELECT * FROM tb_produtos");
        $arrayProdutos = $consulta->fetchAll(PDO::FETCH_ASSOC);

        //Fabrica de Produtos
        $listaProdutos = [];
        foreach ($arrayProdutos as $produto){
            $listaProdutos[] = new Produto($produto['nome'], $produto['preco'], $produto['categoria'], $produto['estoque'], $produto['id']);
        }

        return $listaProdutos;

    }

    public function excluir(int $id){

        $this->conexao->exec("DELETE FROM tb_produtos WHERE id = $id");


    }

    public function editar(Produto $produto){

        $sql = "";

        $this->conexao->exec($sql);

    }

    public  function comprar($id,$qtd,$estoque){
        
        $this->conexao->exec("UPDATE tb_produtos set estoque = ($estoque-$qtd) WHERE id = $id");
    }
}

