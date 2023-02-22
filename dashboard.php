<?php
    // session_start();
    // if (isset($_SESSION['data']['acess'])) {
        require_once './request/conexao.php';
    //     $online = $_SESSION['data']['acess'];
    // } else { 
    //     header("Location: ./request/logout");

    // }
    $comando = "SELECT * From pintura";
try {
    $query = $conn->prepare($comando);
    $query->execute(array());
    $datas = $query->fetchAll(PDO::FETCH_ASSOC);

} catch (\Throwable $th) {
  echo $th->getMessage();
}

$comandos = "SELECT * From manuntecao";
try {
    $query = $conn->prepare($comandos);
    $query->execute(array());
    $data_man = $query->fetchAll(PDO::FETCH_ASSOC);

} catch (\Throwable $th) {
  echo $th->getMessage();
}

$comand = "SELECT * From wash";
try {
    $query = $conn->prepare($comand);
    $query->execute(array());
    $data_wash = $query->fetchAll(PDO::FETCH_ASSOC);
   
} catch (\Throwable $th) {
  echo $th->getMessage();
}
$coman = "SELECT * From services";
try {
    $query = $conn->prepare($coman);
    $query->execute(array());
    $data_serv = $query->fetchAll(PDO::FETCH_ASSOC);

} catch (\Throwable $th) {
  echo $th->getMessage();
}

?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <title>AUTO JACK</title>
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
    <script src="js/chart.min.js"></script>
</head>

<body class="animsition">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">AUTO JACK</a>
        <!-- Sidebar Toggle-->

        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownc ">
                <li><a class="dropdown-item" href="#!">Settings</a></li>
                <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="#!">Logout</a></li>
            </ul>
        </li>
        </ul>
        </nav>
        <div id="layoutSidenav">
        <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body"><strong> Pinturas: <?php echo count($datas);?></strong></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body"> <strong>Manunteção: <?php echo count($data_man);?></strong></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body"><strong>CarWash: <?php echo count($data_wash);?></strong></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body"><strong>Serviço: <?php echo count($data_serv);?></strong></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                Serviços Resgitados
                            </div>
                            <!-- <canvas id="myChart" style="width:100%;width:60px"></canvas> -->
                            <div class="card-body"><canvas id="myChart" width="100%" height="40"></canvas>
                            <script>
                                    var xValues =  ['Pintura', 'Manunteção', 'CarWash', 'Serviço'];

                                            
                                    var yValues = [<?php echo count($datas);?>, <?php echo count($data_man);?>,  <?php echo count($data_wash);?>,  <?php echo count($data_serv);?>];
                                    var barColors = ["#0dcaf0", "#ffc107","#198754","#dc3545"];

                                    new Chart("myChart", {
                                    type: "bar",
                                    data: {
                                        labels: xValues,
                                        datasets: [{
                                        backgroundColor: barColors,
                                        data: yValues
                                        }]
                                    },
                                    options: {
                                        legend: {display: false},
                                        title: {
                                        display: true,
                                        text: "World Wine Production 2018"
                                        }
                                    }
                                    });
                                    </script>
                        
                        </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar me-1"></i>
                                Serviços Resgitados
                            </div>
                            <div class="card-body"><canvas id="myChart1" width="100%" height="40"></canvas></div>
                            <script>
                                    var xValues =  ['Pintura', 'Manunteção', 'CarWash', 'Serviço'];

                                            
                                    var yValues = [<?php echo count($datas);?>, <?php echo count($data_man);?>,  <?php echo count($data_wash);?>,  <?php echo count($data_serv);?>];
                                    var barColors = ["#0dcaf0", "#ffc107","#198754","#dc3545"];

                                    new Chart("myChart1", {
                                    type: "line",
                                    data: {
                                        labels: xValues,
                                        datasets: [{
                                        backgroundColor: barColors,
                                        data: yValues
                                        }]
                                    },
                                    options: {
                                        legend: {display: false},
                                        title: {
                                        display: true,
                                        text: "World Wine Production 2018"
                                        }
                                    }
                                    });
                                    </script>
                        </div>
                    </div>
                </div>
            <br>
            <section>
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">Visualizar Cliente</div>
                                        <?php
                                            if(isset($_POST['prop_removido'])){
                                                $delete = $_POST['prop_removido'];
                                                try {
                                                    $comando = "DELETE FROM `pro_users` WHERE `id`=?";
                                                    $query = $conn->prepare($comando);
                                                    $query->execute(array($delete));
                                        ?>
                                        <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
                                        Cliente removida com Sucesso
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <?php
                                                } catch (\Throwable $th) {
                                        ?>
                                        <div class="sufee-alert alert with-close alert-warning alert-dismissible fade show">
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
                                    
                                    <div class="card-body mb-4">
                                        <div class="table-responsive table-data">
                                            <table class="table table-bordered">
                                                <thead class="text-center" style="position: sticky">
                                                    <th>Nome</th>
                                                    <th>Email</th>
                                                    <th>Senha</th>
                                                    <th>Senha_two</th>
                                                    <th>Acções</th>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $comando = "SELECT * FROM `pro_users` ORDER BY `id` DESC;";
                                                        try {
                                                            $query = $conn->prepare($comando);
                                                            $query->execute(array());
                                                            $data = $query->fetchAll(PDO::FETCH_ASSOC);
                                                            foreach($data as $row){
                                                    ?>
                                                    <tr>
                                                        <td class="pintar" style="vertical-align: middle;"><?php echo $row['nome']?></td>
                                                        <td class="pintar" style="vertical-align: middle;"><?php echo $row['email']?></td>
                                                        <td class="pintar" style="vertical-align: middle;"><?php echo $row['senha']?></td>
                                                        <td class="pintar" style="vertical-align: middle;"><?php echo $row['senha_two']?></td>
                                                        <td style="vertical-align: middle;">
                                                            <div class="table-data-feature">
                                                                <a href="./editar.php?inst=<?php echo $row['id']?>" class="item" data-toggle="tooltip" data-placement="top" title="Editar">
                                                                    <i class="zmdi zmdi-edit"></i>
                                                                </a>
                                                                &nbsp;
                                                                <button type="button" tabindex="0" class="item remove_prop" id="<?php echo $row['id']?>" data-toggle="tooltip" data-placement="top" title="Remover">
                                                                    <i class="zmdi zmdi-delete"></i>
                                                                </button>
                                                                &nbsp;
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                            }
                                                        } catch (\Throwable $th) {
                                                            echo $th->getMessage();
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="modal fade" id="info_modal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content info"></div>
            </div>
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
    <script src="js/remover.js"></script>
    <script src="js/notificacoes.js"></script>
</body> 
</html>
