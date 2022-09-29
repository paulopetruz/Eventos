<?php
include_once "../conexao/Conexao.php";
include_once "../model/evento.php";
include_once "../dao/eventoDAO.php";
include_once "../dao/vendedorDAO.php";
include_once "../model/vendedor.php";
//instancia as classes
$evento = new Evento();
$eventoDAO = new eventoDAO();
$vendedor = new Vendedor();
$vendedordao = new VendedorDAO();
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
    <main class="container">
        <div class="">
            <form action="../controller/eventoController.php" method="POST">
                <div class="">
                    <h2>Cadastre um novo Evento</h2>
                    <div class="input-field">
                        <label>Nome do evento</label>
                        <input type="text" name="nameEvento" value="<?= $evento->getNome() ?>" class="form-control" required/>
                    </div>
                    <div class="input-field">
                        <label>Vendedor</label>
                        <select name="fkVendedor" class="form-control" require autofocus>
                            <?php foreach ($vendedordao->read() as $vendedor) : ?>
                                <option value="<?= $vendedor->getIdVendedor() ?>">
                                    <?= $vendedor->getNome() ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="input-field">
                        <label>Data</label>
                        <input type="date" name="dataEvento" value="<?= $evento->getData() ?>" class="form-control" required />
                    </div>
                    <div class="input-field">
                        <label>Horário</label>
                        <input type="time" name="horaEvento" value="<?= $evento->getHora() ?>" class="form-control" required />
                    </div>
                    <div class="input-field">
                        <label>Capacidade</label>
                        <input type="number" name="quantIngresso" value="<?= $evento->getCapacidade() ?>" class="form-control" required />
                    </div>
                    <div class="input-field">
                        <div class="col-md-2">
                            <br>
                            <input type="hidden" name="idEvento" value="<?= $evento->getIdEvento() ?>" />
                            <button class="btn btn-primary" type="submit" name="cadastrar">Cadastrar</button>
                        </div>
                    </div>
                    <br>
                </div>
            </form>
        </div>   
    </main>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>