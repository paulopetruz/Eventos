<?php
include_once "../conexao/Conexao.php";
include_once "../model/evento.php";
include_once "../dao/eventoDAO.php";

//instancia as classes
$evento = new Evento();
$eventodao = new EventoDAO();

//pega todos os dados passado por POST

$d = filter_input_array(INPUT_POST);

//se a operação for gravar entra nessa condição
if(isset($_POST['cadastrar'])){

    $evento->setNome($d['nameEvento']);
    $evento->setData($d['dataEvento']);
    $evento->setHora($d['horaEvento']);
    $evento->setCapacidade($d['quantIngresso']);
    $evento->setfkVendedor($d['fkVendedor']);
    

    $eventodao->create($evento);

    header("Location: ../view/viewEvento.php");
} 
// se a requisição for editar
else if(isset($_POST['editar'])){

    $evento->setNome($d['nameEvento']);
    $evento->setData($d['dataEvento']);
    $evento->setHora($d['horaEvento']);
    $evento->setCapacidade($d['quantIngresso']);
    $evento->setIdEvento($d['idEvento']);
    $evento->setfkVendedor($d['fkVendedor']);

    $eventodao->update($evento);

    header("Location: ../view/viewEvento.php");
}
// se a requisição for deletar
else if(isset($_GET['del'])){

    $evento->setIdEvento($_GET['del']);

    $eventodao->delete($evento);

    header("Location: ../view/viewEvento.php");
}else{
    header("Location: ../view/viewEvento.php");
}