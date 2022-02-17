<?php
session_start();
//Проверка, если нет Сесси, уволим
if(!isset($_SESSION['user_login'])){
    header("Location: login.php");
}
include "functions/orders-o.php";
include "functions/count/count-o.php";

$_SESSION['page-otpravka'] = 'otpravka.php';
unset($_SESSION['page-manager'],$_SESSION['page-logist'],$_SESSION['page-success']);

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
                                    <a href="logist.php" class="status-main-text">Логистика</a>
                                </h6>

                            </div>

                            <div class="card-body order-datatable">
                                <table class="display table table-bordered" id="basic-1" style="width: 2000px; overflow-x: scroll">
                                    <thead>
                                    <tr>
                                        <th class="status-text">Подтвержден(<?=$_SESSION['podtverzhden']?>)</th>
                                        <th class="status-text">Алматы(<?=$_SESSION['almaty']?>)</th>
                                        <th class="status-text">Заберут(<?=$_SESSION['zaberut']?>)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <?php podtverzhden(); ?>
                                        </td>
                                        <td>
                                            <?php almaty(); ?>
                                        </td>
                                        <td>
                                            <?php zaberut(); ?>
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
