<?php
include 'request/conexao.php';

if(isset($_POST['login'])){
$nome = $_POST['nome']; 
$email = $_POST['email'];
$senha = $_POST['senha'];
$senha_two = $_POST['senha_two'];


try{
    $comand = 'INSERT INTO pro_users (nome, email, senha, senha_two) VALUES (?, ?, ?, ?)';
    $query = $conn->prepare($comand);
    $query->execute(array($nome, $email, $senha, $senha_two));
    header("Location:index.php");
     

}catch(\Throwable $e){
    echo "Error com a base de dados $e";
}
}else{
echo "ERROR";
}
    


?>
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
            <h2>Create Account</h2>
        </div>
        <form class="form" id="form" method="POST">

            <div class="form-control">

                <label for="username" >Nome</label>
                <input type="text" id="username" name="nome">
            </div>

            <div class="form-control">

                <label>Email</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="form-control">

                <label>Senha</label>
                <input type="password" id="password" name="senha">
            </div>
            <div class="form-control">
                <label>Confirme sua senha</label>
                <input type="password" id="password-two" name="senha_two">
            </div>
            <button type="submit" name="login" >ENVIAR</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>