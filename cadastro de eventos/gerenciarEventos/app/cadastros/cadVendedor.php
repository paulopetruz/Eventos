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
    <div class="">
        <form action="../controller/vendedorController.php" method="POST">
            <div class="">
                <h2>Cadastre um novo vendedor</h2>
                <div class="input-field">
                    <label>Nome do vendedor</label>
                    <input type="text" name="nome" value="<?= $vendedor->getNome() ?>" autofocus class="form-control" required/>
                </div>
                <div class="input-field">
                    <label>Telefone</label>
                    <input type="text" name="telefone" value="<?= $vendedor->getTelefone() ?>" autofocus class="form-control" required/>
                </div>
                <div class="input-field">
                    <label>E-mail</label>
                    <input type="text" name="email" value="<?= $vendedor->getEmail() ?>" class="form-control" required />
                </div>
                <div class="input-field">
                    <input type="submit" name="cadastrar">
                    <div class="underline"></div>
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