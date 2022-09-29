<?php
include_once "../conexao/Conexao.php";
include_once "../model/vendedor.php";
include_once "../dao/vendedorDAO.php";

//instancia as classes
$vendedor = new Vendedor();
$vendedordao = new VendedorDAO();

//pega todos os dados passado por POST

$d = filter_input_array(INPUT_POST);

//se a operação for gravar entra nessa condição
if(isset($_POST['cadastrar'])){

    $vendedor->setNome($d['nome']);
    $vendedor->setEmail($d['email']);
    $vendedor->settelefone($d['telefone']);

    $vendedordao->create($vendedor);

    header("Location: ../view/viewVendedor.php");
} 
// se a requisição for editar
else if(isset($_POST['editar'])){

    $vendedor->setId($d['id']);
    $vendedor->setNome($d['nome']);
    $vendedor->setEmail($d['email']);
    $vendedor->settelefone($d['telefone']);

    $vendedordao->update($vendedor);

    header("Location: ../view/viewVendedor.php");
}
// se a requisição for deletar
else if(isset($_GET['del'])){

    $vendedor->setId($_GET['del']);

    $vendedordao->delete($vendedor);

    header("Location: ../view/viewVendedor.php");
}else{
    header("Location: ../view/viewVendedor.php");
}