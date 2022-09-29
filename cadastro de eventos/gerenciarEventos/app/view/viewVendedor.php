<?php
include_once "../conexao/Conexao.php";
include_once "../dao/vendedorDAO.php";
include_once "../model/vendedor.php";

//instancia as classes
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
        <h2>Lista de vendedores</h2>
            <form action="../cadastros/cadVendedor.php" method="post"> 
                <div class="input-field">
                    <input type="submit" value="Cadastre um novo vendedor">
                    <div class="underline"></div>
                </div>
            </form>
            </div>
            <table class="table table-sm table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome do vendedor</th>
                        <th>Telefone</th>
                        <th>E-mail</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($vendedordao->read() as $vendedor) : ?>
                        <tr>
                            <td><?= $vendedor->getIdVendedor() ?></td>
                            <td><?= $vendedor->getNome() ?></td>
                            <td><?= $vendedor->getTelefone() ?></td>
                            <td><?= $vendedor->getEmail() ?></td>
                            <td class="text-center">
                                <button class="btn  btn-warning btn-sm" data-toggle="modal" data-target="#editar><?= $vendedor->getIdVendedor() ?>">Editar</button>
                                
                                <a href="../controller/vendedorController.php?del=<?= $vendedor->getIdVendedor() ?>">
                                <button class="btn  btn-danger btn-sm" type="button">Excluir</button>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="editar><?= $vendedor->getIdVendedor() ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="../controller/vendedorController.php" method="POST">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Nome</label>
                                                    <input type="text" name="nome" value="<?= $vendedor->getNome() ?>" class="form-control" required />
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Telefone</label>
                                                    <input type="text" name="telefone" value="<?= $vendedor->getTelefone() ?>" class="form-control" required />
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>E-mail</label>
                                                    <input type="text" name="email" value="<?= $vendedor->getEmail() ?>" class="form-control" required />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <br>
                                                    <input type="hidden" name="id" value="<?= $vendedor->getIdVendedor() ?>" />
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