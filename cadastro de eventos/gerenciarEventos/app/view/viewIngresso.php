<?php
include_once "../conexao/Conexao.php";
include_once "../dao/ingressoDAO.php";
include_once "../model/ingresso.php";
include_once "../dao/vendedorDAO.php";
include_once "../model/vendedor.php";
include_once "../dao/eventoDAO.php";
include_once "../model/evento.php";


//instancia as classes
$evento = new Evento();
$eventoDAO = new eventoDAO();
$ingresso = new Ingresso();
$vendedor = new Vendedor();
$ingressodao = new IngressoDAO();
$vendedorDAO = new vendedorDAO();

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
        
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <form action="../cadastros/cadIngresso.php" method="post"> 
                            <div class="input-field">
                                <input type="submit" value="Cadastre um novo ingresso">
                                <div class="underline"></div>
                            </div>
                        </form>
                        <br>
                        <label>Selecione o evento que deseja ver os ingressos</label>
                        <form action="../view/viewIngresso.php" method="post"> 
                            <div class="input-field">
                                <select name="Fk_evento" class="form-control">
                                    <option value="0">selecione o evento</option>
                                    <?php foreach ($eventoDAO->read() as $evento) : ?>
                                        <option value="<?= $evento->getIdEvento() ?>">
                                                       <?= $evento->getNome() ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="input-field">
                                <input type="submit" value="Filtrar">
                                <div class="underline"></div>
                            </div>
                        </form>
                    </div>
                </div>   
            <h4>Ingresso</h4>
                <table class="table table-sm table-bordered table-hover" id="filtro">
                    <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome do vendedor</th>
                                <th>Pago ou não?</th>
                                <th>Nome do Comprador</th>
                                <th>Telefone comprador</th>
                                <th>Evento</th>
                                <th>Função</th>
                                
                            </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ingressodao->filtro($_POST["Fk_evento"]) as $ingresso): ?>
                            <tr>
                                <td><?= $ingresso->getId() ?></td>
                                <td><?= $ingresso->getNameVendedor() ?></td>
                                <td><?php if ($ingresso->getPg() == 0) : ?>
                                    Não
                                    <?php else : ?>
                                    Sim
                                <?php endif ?></td>
                                <td><?= $ingresso->getNameComprador() ?></td>
                                <td><?= $ingresso->gettelComprador() ?></td>
                                <td><?= $ingresso->getFk_evento() ?></td>
                                <td class="text-center">
                                    <button class="btn  btn-warning btn-sm" data-toggle="modal" data-target="#editar><?= $ingresso->getId() ?>">Editar</button>
                                    <a href="../controller/ingressoController.php?del=<?= $ingresso->getId() ?>">
                                    <button class="btn  btn-danger btn-sm" type="button">Excluir</button>
                                    </a>
                                </td>
                            </tr>
                            <!-- Modal -->                        
                            <div class="modal fade" id="editar><?= $ingresso->getId() ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="../controller/ingressoController.php" method="POST">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Nome vendedor</label>
                                                        <select name="nameVendedor" class="form-control" required>
                                                            <?php foreach ($vendedorDAO->read() as $vendedor) : ?>
                                                                <option value="<?= $vendedor->getIdVendedor() ?>">
                                                                    <?= $vendedor->getNome() ?>
                                                                </option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Pago</label>
                                                        <select name="pg" value="<?= $ingresso->getPg() ?>"  class="form-control" >
                                                            <option value=0>Não</option>
                                                            <option value=1>Sim</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Nome comprador</label>
                                                        <input type="text" name="nameComprador" value="<?= $ingresso->getNameComprador() ?>" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <br>
                                                        <input type="hidden" name="id" value="<?= $ingresso->getId() ?>" />
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