<?php
session_start();

//Проверка, если нет Сесси, уволим
if(!isset($_SESSION['user_login'])){
    header("Location: login.php");
}


if($_SESSION['user_status'] == 3){
    // Заходим в кабинет Арбитражника
    header("Location: main-arbitrazh.php");
}

include "includes/db.php";
include "functions/manager/balance.php";

include "functions/report.php";
include "functions/previous_month.php";


?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <?php include "includes/head.php"; ?>
</head>

<body>

    <!-- page-wrapper Start-->
<div class="page-wrapper">

    <!-- Page Header Start-->
    <?php include "includes/header.php"; ?>
    <!-- Page Header Ends -->

    <!-- Page Body Start-->
    <div class="page-body-wrapper">

    <!-- Page Sidebar Start-->
    <?php include "includes/sidebar.php"; ?>
    <!-- Page Sidebar Ends-->


        <div class="page-body">

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3>Отчет
                                    <small>Март!</small>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="index.php"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item active">Главная</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-3 col-md-6 xl-50">
                        <div class="card o-hidden widget-cards">
                            <div class="bg-danger card-body">
                                <div class="media static-top-widget row">
                                    <div class="icons-widgets col-4">
                                        <div class="align-self-center text-center"><i data-feather="users"
                                                                                      class="font-danger"></i></div>
                                    </div>
                                    <div class="media-body col-8"><span class="m-0">Необроботанные</span>
                                        <h3 class="mb-0"><small><?=$neobrobot ?> /</small> <span
                                                    class="counter"><?=$neobrobot * 1000 ?></span> ₸
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 xl-50">
                        <div class="card o-hidden widget-cards">
                            <div class="bg-info card-body">
                                <div class="media static-top-widget row">
                                    <div class="icons-widgets col-4">
                                        <div class="align-self-center text-center"><i data-feather="navigation"
                                                                                      class="font-warning"></i></div>
                                    </div>
                                    <div class="media-body col-8"><span class="m-0">Подтвержден</span>
                                        <h3 class="mb-0"><small><?=$c_pod ?> /</small> <span
                                                    class="counter"><?=$c_pod * 1000 ?></span> ₸
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 xl-50">
                        <div class="card o-hidden  widget-cards">
                            <div class="bg-success card-body">
                                <div class="media static-top-widget row">
                                    <div class="icons-widgets col-4">
                                        <div class="align-self-center text-center"><i data-feather="box"
                                                                                      class="font-secondary"></i></div>
                                    </div>
                                    <div class="media-body col-8"><span class="m-0">Вручено</span>
                                        <h3 class="mb-0"><small><?=$c_vru ?> /</small> <span
                                                    class="counter"><?=$c_vru * 1000 ?></span> ₸
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 xl-50">
                        <div class="card o-hidden widget-cards">
                            <div class="bg-warning card-body">
                                <div class="media static-top-widget row">
                                    <div class="icons-widgets col-4">
                                        <div class="align-self-center text-center"><i data-feather="message-square"
                                                                                      class="font-primary"></i></div>
                                    </div>
                                    <div class="media-body col-8"><span class="m-0">Отказ</span>
                                        <h3 class="mb-0"><small><?=$c_otk ?> /</small> <span
                                                    class="counter"><?=$c_otk * 1000 ?></span> ₸
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 xl-100">
                        <div class="card">
                            <div class="card-header">
                                <?php
                                $query = $conn->query("
                                SELECT count(*) as `count`, DATE(client_date) AS `date`
                                FROM clients 
                                WHERE 
                                MONTH(client_date) = MONTH (NOW()) AND 
                                YEAR(client_date) = YEAR (NOW())
                               ");
                                $row = mysqli_fetch_assoc($query);
                                $month = date('m');
                                if($month == 1){ $month = "Январь"; }
                                if($month == 2){ $month = "Февраль"; }
                                if($month == 3){ $month = "Март"; }
                                if($month == 4){ $month = "Апрель"; }
                                if($month == 5){ $month = "Май"; }
                                if($month == 6){ $month = "Июнь"; }
                                if($month == 7){ $month = "Июль"; }
                                if($month == 8){ $month = "Август"; }
                                if($month == 9){ $month = "Сентябрь"; }
                                if($month == 10){ $month = "Октябрь"; }
                                if($month == 11){ $month = "Ноябрь"; }
                                if($month == 12){ $month = "Декабрь"; }
                                echo ' <h5>На '.$month.' поступила: '. $row['count'] .' </h5>';
                                ?>
                            </div>

                            <div class="card-body">
                                    <div class="wa">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">Дата</th>
                                                <th scope="col">Поступила</th>
                                                <th scope="col">Подтвержден</th>
                                                <th scope="col">Вручено</th>
                                                <th scope="col">Отказ</th>
                                                <th scope="col">Конверсия</th>
                                            </tr>
                                            </thead>
                                            <?php
                                                foreach($rows as $date => $item):
                                                    $a = (($item['success'] + $item['vruch']) * 100) / $item['total']
                                                    ?>

                                                    <tr>
                                                        <td><?=$date?> </td>
                                                        <td><?=$item['total']?></td>
                                                        <td><?=$item['success']?></td>
                                                        <td><?=$item['vruch']?></td>
                                                        <td><?=$item['otkaz']?></td>
                                                        <td><?=round($a,1)?>%</td>
                                                    </tr>

                                               <?
                                               endforeach;


                                                       foreach($rowse as $dates => $iteme):
                                                            $a = (($iteme['last_success'] + $iteme['last_vruch']) * 100) / $iteme['last_total']
                                                            ?>

                                                            <tr>
                                                                <td><?=$dates?> </td>
                                                                <td><?=$iteme['last_total']?></td>
                                                                <td><?=$iteme['last_success']?></td>
                                                                <td><?=$iteme['last_vruch']?></td>
                                                                <td><?=$iteme['last_otkaz']?></td>
                                                                <td><?=round($a,1)?>%</td>
                                                            </tr>

                                                       <?
                                                   endforeach;
                                            ?>


                                        </table>

                                        <!--LAST MONTH-->

                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- Container-fluid Ends-->

</div>

<!-- footer start-->
<?php include "includes/footer.php"; ?>
<!-- footer end-->
</div>


<!--Scripts Start-->
<?php include "includes/scripts.php"; ?>
<!--Scripts End-->

</body>
</html>
