<?php
include_once "../conexao/Conexao.php";
include_once "../dao/ingressoDAO.php";
include_once "../model/ingresso.php";
include_once "../dao/vendedorDAO.php";
include_once "../model/vendedor.php";
include_once "../model/evento.php";
include_once "../dao/eventoDAO.php";

//instancia as classes
$ingresso = new Ingresso();
$ingressodao = new IngressoDAO();
$vendedor = new Vendedor();
$vendedorDAO = new vendedorDAO();
$evento = new Evento();
$eventoDAO = new eventoDAO();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Gerenciador</title>
    <style>
        .menu,
        thead {
            background-color: #bbb !important;
        }

        .row {
            padding: 10px;
        }
    </style>
</head>

<body>
<main class="container col-5">
    <div class="">
        <form action="../controller/ingressoController.php" method="POST">
            <div class="col-12">
                <h2>Cadastre um Ingresso</h2>
                <div class="input-field">
                    <label>Nome do vendedor</label>
                    <select name="nameVendedor" class="form-control" required>
                        <?php foreach ($vendedorDAO->read() as $vendedor) : ?>
                            <option value="<?= $vendedor->getIdVendedor() ?>">
                                <?= $vendedor->getNome() ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="input-field">
                    <label>Está Pago?</label>
                    <select name="pg" value="<?= $ingresso->getPg() ?>" class="form-control" >
                        <option value=0>Não</option>
                        <option value=1>Sim</option>
                    </select>
                </div>
                <div class="input-field">
                    <label>Evento referente</label>
                    <select name="Fk_evento" class="form-control" required>
                        <?php foreach ($eventoDAO->read() as $evento) : ?>
                            <option value="<?= $evento->getIdEvento() ?>">
                                           <?= $evento->getNome() ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="input-field">
                    <label>Informe o nome do comprador</label>
                    <input type="text" name="nomeComprador" value="<?= $ingresso->getNameComprador() ?>" autofocus class="form-control" required/>
                </div>
                <div class="input-field" >
                    <label>Informe o telefone do comprador</label>
                    <input type="text" name="telComprador" value="<?= $ingresso->getTelComprador() ?>" autofocus class="form-control" required/>
                </div>
                <input class="form-control" type="submit" name="cadastrar" <?php $Fk_evento = $evento->getIdEvento(); ?>>
                <div class="underline"></div>
            </div>
            <br>
        </form>
    </div>
</main>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script>
            function trocaValor(){
                if($('#aux').is(':checked')){
                    $('#pg').val(1);
                } else {                    
                    $('#pg').val(0);
                }
            }

        </script>
    </body>
</html>