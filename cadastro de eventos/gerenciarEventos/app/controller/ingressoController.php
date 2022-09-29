<?php
include_once "../conexao/Conexao.php";
include_once "../model/ingresso.php";
include_once "../dao/ingressoDAO.php";


//instancia as classes
$ingresso = new Ingresso();
$ingressodao = new IngressoDAO();


//pega todos os dados passado por POST

$d = filter_input_array(INPUT_POST);

//se a operação for gravar entra nessa condição
if(isset($_POST['cadastrar'])){

    $ingresso->setIdVendedor($d['nameVendedor']);
    if($d['pg']){
        $ingresso->setPg(1);
    } else {
        $ingresso->setPg(0);
    }

    $ingresso->setFk_evento($d['Fk_evento']);

    $ingresso->setnameComprador($d['nomeComprador']);

    $ingresso->settelComprador($d['telComprador']);



    $ingressodao->create($ingresso);


    header("Location: ../view/viewIngresso.php");
} 
// se a requisição for editar
else if(isset($_POST['editar'])){

    $ingresso->setPg($d['pg']);
    $ingresso->setId($d['id']);
    $ingresso->setNameComprador($d['nameComprador']);

    $ingressodao->update($ingresso);

    header("Location: ../view/viewIngresso.php");
}


// se a requisição for filtrar
else if(isset($_POST['filtrar'])){

    
}
// se a requisição for deletar
else if(isset($_GET['del'])){

    $ingresso->setId($_GET['del']);

    $ingressodao->delete($ingresso);

    header("Location: ../view/viewIngresso.php");
}else{
    header("Location: ../view/viewIngresso.php");
}