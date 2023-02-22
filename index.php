<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AUTO JACK</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>

    <div class="container">
        <div class="header">
            <h2>Login</h2>
        </div>
        <form class="form" id="form" action="request/login.php" method="post">
            <div class="form-control">
                <label>Email</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="form-control">
                <label>Senha</label>
                <input type="password" id="password" name="senha">
            </div>
            <button type="submit" name="login">ENVIAR</button>
            <br>
            <br>
            <div  class="form-control"> <a href="cadastro.php" style="color:#ffc800;     font-size: 20px; text-decoration: none;">Cadastro-se</a></div>
        </form>
    </div>
    
</body>
</html>