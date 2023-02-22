<?php
require_once 'conexao.php'; 
if($_POST['email'] == "dashboard@admin.com" && $_POST['senha'] == "12348765"){
    header("Location:../dashboard");
}else{
if(isset($conn)){
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $senha = $_POST['senha'];
       
        $comand = "SELECT * FROM `pro_users` WHERE `email`=? AND `senha`=?";
        try{
            $query = $conn->prepare($comand);
            $query->execute(array($email, $senha));
            if($query->rowCount()){
                $dados = $query->fetchAll(PDO::FETCH_ASSOC)[0];
                session_start();
                $_SESSION['data']['acess'] = array(
                    'email'=>$dados['email'], 'senha'=>$dados['senha']
                );
                header("Location:../pagina");
            }else{
                echo"<script>alert('Error')</script>";
            }
            
        }catch(\Throwable $e){
            echo"<script>alert('Error1')</script>";

        }
    }else{
        echo"Error com Pass";
    }
    
}else{
    echo"<script>alert('Error com DB')</script>";
}
}

?>