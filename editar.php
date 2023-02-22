<?php

session_start();
if(isset($_SESSION['data']['acess'])){
    require_once './request/conexao.php';
    // require './vendor/autoload.php';
    $online = $_SESSION['data']['acess'];
}else{
    header("Location: ./request/logout");
}

if(!isset($_GET['inst'])){
    header("Location:./gc_see_inst");
}
$inst = $_GET['inst'];


?>
   <?php
    if(isset($_POST['login'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $senha_two = $_POST['senha_two'];
        $posicao = $_POST['posicao'];
        try {
            $comando = "UPDATE  `pro_users` SET `nome`=?, `email`=?, `senha`=?, `senha_two`=? WHERE id=?";
            $query = $conn->prepare($comando);
            $query->execute(array($nome, $email, $senha, $senha_two, $posicao));
?>
<?php
        } catch (\Throwable $th) {
            echo "Error com a base de dados ";
?>
 <?php
        }
    }
?>
<?php
    try {
        $comando = "SELECT * FROM pro_users WHERE id=? ";
        $query = $conn->prepare($comando);
        $query->execute(array($inst));
        $data = $query->fetchAll(PDO::FETCH_ASSOC)[0];
    } catch (\Throwable $th) {
        //throw $th;
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
                <input type="hidden" name="posicao" value="<?php echo $inst?>">
                <input type="text" id="username" name="nome" value="<?php echo $data['nome']?>">
            </div>

            <div class="form-control">

                <label>Email</label>
                <input type="email" id="email" name="email" value="<?php echo $data['email']?>">
            </div>
            <div class="form-control">

                <label>Senha</label>
                <input type="password" id="password" name="senha" value="<?php echo $data['senha']?>">
            </div>
            <div class="form-control">
                <label>Confirme sua senha</label>
                <input type="password" id="password-two" name="senha_two" value="<?php echo $data['senha_two']?>">
            </div>
            <button type="submit" name="login" >ENVIAR</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>