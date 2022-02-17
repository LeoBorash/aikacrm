<?php
session_start();
include "includes/db.php";
include "functions/fsearch.php";
date_default_timezone_set('Asia/Almaty');
unset($_SESSION['page-otpravka'],$_SESSION['page-logist'],$_SESSION['page-success'],$_SESSION['page-manager']);
$_SESSION['page-search'] = 'search.php';
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
                                    <a href="logist.php" class="status-main-text">Логистика</a>
                                </h6>

                            </div>

                            <div class="card-body order-datatable">
                                <table class="display table table-bordered" id="basic-1">
                                    <thead>
                                    <tr>
                                        <th class="status-text">Менеджер</th>
                                        <th class="status-text">Отправка</th>
                                        <th class="status-text">Логистика</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr>
                                        <td>
                                            <?php if(isset($_POST['search'])){searchManager();} ?>
                                        </td>
                                        <td>
                                            <?php if(isset($_POST['search'])){searchOtpravka();} ?>
                                        </td>
                                        <td>
                                            <?php if(isset($_POST['search'])){searchLogistik();} ?>
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
