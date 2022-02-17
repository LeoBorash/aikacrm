<?php
session_start();
//Проверка, если нет Сесси, уволим
if(!isset($_SESSION['user_login'])){
    header("Location: login.php");
}
include "functions/orders-l.php";
include "functions/count/count-l.php";
include "functions/count/count-s.php";
include "functions/orders-s.php";

$_SESSION['page-logist'] = 'logist.php';
unset($_SESSION['page-manager'],$_SESSION['page-otpravka'],$_SESSION['page-success']);

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
                <div class="row">
                    <div class="col-sm-12 mt-2">
                        <div class="card">
                            <div class="card-header">
                                <h6>
                                    <a href="manager.php" class="status-main-text">Менеджер</a>
                                    <a href="otpravka.php" class="status-main-text">Отправка</a>
                                </h6>

                            </div>

                            <div class="card-body order-datatable">
                                <table class="display table table-bordered" id="basic-1">
                                    <thead ">
                                    <tr>
                                        <th class="status-text">В пути(<?=$_SESSION['vputi']?>)</th>
                                        <th class="status-text">Вручено(<?=$_SESSION['c_vrucheno']?>)</th>
                                        <th class="status-text">Отказ(<?=$_SESSION['otkaz']?>)</th>
                                        <th class="status-text">Дубль(<?=$_SESSION['c_dubl'] ?>)</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr>
                                        <td>
                                            <?php vputi(); ?>
                                        </td>
                                        <td>
                                            <?php vrucheno(); ?>
                                        </td>
                                        <td>
                                            <?php otkaz(); ?>
                                        </td>
                                        <td>
                                            <?php dubl(); ?>
                                        </td>
                                        
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

        </div>

        <?php include "includes/footer.php"; ?>


    </div>

</div>

<?php include "includes/scripts.php"; ?>

</body>
</html>
