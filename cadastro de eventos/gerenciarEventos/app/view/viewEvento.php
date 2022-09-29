<?php
include_once "../conexao/Conexao.php";
include_once "../model/evento.php";
include_once "../dao/eventoDAO.php";
include_once "../dao/vendedorDAO.php";
include_once "../model/vendedor.php";
//instancia as classes
$evento = new Evento();
$eventodao = new eventoDAO();
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
        <div class="input-field">
        <h2>Eventos cadastrados</h2>
            <form action="../cadastros/cadEvento.php" method="post"> 
                <div class="input-field">
                    <input type="submit" value="Cadastre um novo Evento">
                    <div class="underline"></div>
                </div>
            </form>
            <table class="table table-sm table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome do evento</th>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Capacidade</th>
                        <th>Vendedor</th>
                        <th>Função</th>
                    </tr>
                </thead>
                <tbody>
                
                    <?php foreach ($eventodao->read() as $evento) : ?>
                        <tr>
                            <td><?= $evento->getIdEvento() ?></td>
                            <td><?= $evento->getNome() ?></td>
                            <td><?= date_format(date_create($evento->getData()),'d/m/Y') ?></td>
                            <td><?= $evento->getHora() ?></td>
                            <td><?= $evento->getCapacidade() ?></td>
                            <td><?= $evento->getfkVendedor() ?></td>
                            <td class="text-center">
                                <button class="btn  btn-warning btn-sm" data-toggle="modal" data-target="#editar><?= $evento->getIdEvento() ?>">Editar</button>
                                
                                <a href="../controller/eventoController.php?del=<?= $evento->getIdEvento() ?>">
                                <button class="btn  btn-danger btn-sm" type="button">Excluir</button>
                                </a>
                                <a href="../view/viewIngresso.php">
                                <button class="btn  btn-info btn-sm" type="button">Ingressos</button>
                                </a>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="editar><?= $evento->getIdEvento() ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="../controller/eventoController.php" method="POST">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Nome</label>
                                                    <input type="text" name="nameEvento" value="<?= $evento->getNome() ?>" class="form-control" required />
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Data</label>
                                                    <input type="date" name="dataEvento" value="<?= $evento->getData() ?>" class="form-control" required />
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Hora</label>
                                                    <input type="time" name="horaEvento" value="<?= $evento->gethora() ?>" class="form-control" required />
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Capacidade</label>
                                                    <input type="number" name="quantIngresso" value="<?= $evento->getCapacidade() ?>" class="form-control" required />
                                                </div>
                                                <br>
                                                <div class="col-md-6">
                                                    <label>Vendedor</label>
                                                        <select name="fkVendedor" class="form-control" required>
                                                            <?php foreach ($vendedordao->read() as $vendedor) : ?>
                                                                <option value="<?= $vendedor->getIdVendedor() ?>">
                                                                    <?= $vendedor->getNome() ?>
                                                                </option>
                                                            <?php endforeach ?>
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <br>
                                                    <input type="hidden" name="idEvento" value="<?= $evento->getIdEvento() ?>" />
                                                    <button class="btn btn-primary" type="submit" name="editar">Cadastrar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

    </main>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>