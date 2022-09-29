<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="gerenciarEventos/app/css/style.css">
    <title>Opções</title>
</head>
<body>
    <main class="container">
        <h2>Escolha uma opção</h2>
            <form action="gerenciarEventos/app/view/viewEvento.php" method="post"> 
                <div class="input-field">
                    <input type="submit" value="Crie ou edite um evento">
                    <div class="underline"></div>
                </div>
            </form>
            <form action="gerenciarEventos/app/view/viewIngresso.php" method="post"> 
                <div class="input-field">
                    <input type="submit" value="Criar ou visualizar ingressos">
                    <div class="underline"></div>
                </div>
            </form>
            <form action="gerenciarEventos/app/view/viewVendedor.php" method="post"> 
                <div class="input-field">
                    <input type="submit" value="Insira ou edite os vendedores">
                    <div class="underline"></div>
                </div>
            </form>
    </main>

</body>
</html>