<?php

// O Controlador é a peça de código que sabe qual classe chamar, para onde redirecionar e etc.
// Use o método $_GET para obter informações vindas de outras páginas.

//faça um require_once para o arquivo Produto.php
//faça um require_once para o arquivo CrudProduto.php
require_once "../models/Produto.php";
require_once "../models/CrudProdutos.php";

//quando um valor da URL for igual a cadastrar faça isso
if ( $_GET['acao'] == 'cadastrar'){

    $produto = new Produto($_POST['nome'],$_POST['preco'],$_POST['categoria'],$_POST['estoque']);
    //crie um objeto $crud
    $crud = new CrudProdutos();
    $crud->salvar($produto);

    //redirecione para a página de produtos
    header('location: ../views/admin/produtos.php');
}

//quando um valor da URL for igual a editar faça isso
if ($_GET['acao']== 'editar'){
    
    $produto = new Produto($_POST['nome'], $_POST['preco'], $_POST['categoria'], $_POST['estoque'], $_POST['id']);

    $crud = new CrudProdutos();

    //algoritmo para editar
    //redirecione para a página de produtos
  
    $crud->editar($produto);
}

//quando um valor da URL for igual a excluir faça isso
if ( $_GET['acao']== 'excluir'){
    $crud = new CrudProdutos();
    $crud->excluir($_GET['id']);
//
    header('location: ../views/admin/produtos.php');
}

if ($_GET['acao'] == 'comprar'){


    $crud = new CrudProdutos();
    $crud->comprar($_POST['id'],$_POST['quantidade'], $_POST['estoque']);

    header("Location: ../views/produto.php?codigo={$_POST['id']}");
}