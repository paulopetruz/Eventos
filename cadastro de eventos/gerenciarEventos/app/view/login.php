<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/9185d9ce08.js" crossorigin="anonymous"></script>
    <title>Login Form</title>
</head>
<body>
    <main class="container">
        <h2>Login</h2>
            <form action="controller/usuarioController.php">
                <div class="input-field">
                    <input type="text" name="username" id="username" 
                        placeholder="Informe o usuário">               
                    <div class="underline"></div>
                </div>    
                <div class="input-field">
                    <input type="password" name="password" id="password" 
                        placeholder="Informe a senha">
                    <div class="underline"></div>
                </div> 
                <input type="submit" value="Continue">
                <input type="submit" value="Cadastre-se">
            </form>
    </main>

</body>
</html>