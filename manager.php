<?php
session_start();
//Проверка, если нет Сесси, уволим
if(!isset($_SESSION['user_login'])){
    header("Location: login.php");
}
include "functions/orders-m.php";
include "functions/count/count-m.php";
date_default_timezone_set('Asia/Almaty');
unset($_SESSION['page-otpravka'],$_SESSION['page-logist'],$_SESSION['page-success']);
$_SESSION['page-manager'] = 'manager.php';
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
                                    <a href="otpravka.php" class="status-main-text">Отправка</a>
                                    <a href="logist.php" class="status-main-text">Логистика</a>
                                </h6>

                            </div>

                            <div class="card-body order-datatable">
                                <table class="display table table-bordered" id="basic-1">
                                    <thead>
                                    <tr>
                                        <th class="status-text">В Оброботке(<?=$_SESSION['obrobotke']?>)</th>
                                        <th class="status-text">Перезвон(<?=$_SESSION['perezvon']?>)</th>
                                        <th class="status-text">Ожидает(<?=$_SESSION['ozhidaet']?>)</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr>
                                        <td>
                                            <?php obrobotke(); ?>
                                        </td>
                                        <td>
                                            <?php perezvon(); ?>
                                        </td>
                                        <td>
                                            <?php ozhidaet(); ?>
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
