<?php
session_start();
if(isset($_SESSION['data']['acess'])){
    require_once './request/conexao.php';
    // require './vendor/autoload.php';
    $online = $_SESSION['data']['acess'];
}else{
    header("Location: ./request/logout");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>AUTO JACK</title>
      
        <link href="css/styles.css" rel="stylesheet" />
        <link href="./css/font-face.css" rel="stylesheet" media="all">
    <link href="./vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="./vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="./vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="./vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <link href="./vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="./vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="./vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="./vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="./vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="./vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="./vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="./css/theme.css" rel="stylesheet" media="all">
    <link href="./css/style.css" rel="stylesheet" media="all">
        <style>
.dropbtn {
  background-color: #ffc800;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
  margin-left: 20px;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color:#cca000;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #cca000;}
body{
    /* background:url(assets/img/header-bg4.jpg);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
    background-size: cover;
    height: 100vh; */
    background-color: #adb5bd;
    background-position: center;
    height: 100vh;
}
section{
    width: 100vw;
    height: 100vh;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    margin-top: 650px;
}
nav{
    margin-bottom: 250px;
}
section{
    margin-top: 50px;
}
option:hover{
    color: #cca000;
}
</style>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="pagina.php">AUTO JACK</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="">Portfolio</a></li>
                        <li class="nav-item"><a class="nav-link" href="">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="">Team</a></li>
                        <li class="nav-item"><a class="nav-link" href="">Contact</a></li>
                    </ul>
                </div>
      
                <div class="dropdown">
                <button class="dropbtn btn btn-primary">REGISTAR SERVICO</button>
                <div class="dropdown-content ">
                    <a href="reg_paint.php">PAINT</a>
                    <a href="cad_movel.php">MANUNTENÇÃO</a>
                    <a href="break.php">BREAKDOWN SERVICE</a>
                    <a href="carWash.php">CAR WASH</a>
                    <a href="atendimento.php">ATENDIMENTO PRESSONALIZADO</a>
                </div>
                </div>
            </div>
        </nav>
        <section class="position-fixed">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title text-center">Reportar Avaria</div>
                                        <?php
                                            if(isset($_POST['break'])){
                                                $nome = $_POST['nome'];
                                                $matricula = $_POST['matricula'];
                                                $endereco = $_POST['endereco'];
                                                $email = $_POST['email'];
                                                $telefone = $_POST['telefone'];
                                                try {
                                                    $comando = "INSERT INTO `break` (`nome`, `matricula`,`endereco`, `email`, `telefone`) VALUE ( ?, ?, ?, ?, ?) ";
                                                    $query = $conn->prepare($comando);
                                                    $query->execute(array($nome, $matricula, $endereco, $email, $telefone));
                                        ?>
                                        <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
											Reporter de Avaria Resgistrada com Sucesso
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
                                        <?php
                                                } catch (\Throwable $th) {
                                        ?>
                                        <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
                                            <?php echo $th->getMessage();?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label for="">Nome do Cliente</label>
                                                <input type="text" required maxlength="500" minlength="3" name="nome" id="" class="form-control shadow-none border">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Matricula do Carro</label>
                                                <input type="text" maxlength="500" minlength="3" name="matricula" id="" class="form-control shadow-none border">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Local de Avaria</label>
                                                <input type="text" maxlength="500" minlength="3" name="endereco" id="" class="form-control shadow-none border">
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label for="">Email</label>
                                                    <input type="email" value="<?php echo $online['email']; ?>"  name="email" maxlength="250" minlength="5" id="" class="form-control shadow-none border">
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <label for="">Telefone</label>
                                                    <input type="text" name="telefone"  class="form-control shadow-none border">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="break" class="btn-info btn-block btn bg-warning shadow-none border">Registar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <script src="vendor/slick/slick.min.js"></script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js"></script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/notificacoes.js"></script>
</body>
</html>


