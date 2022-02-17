<?php
session_start();
//Проверка, если нет Сесси, уволим
if(!isset($_SESSION['user_login'])){
    header("Location: login.php");
}
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
                                <h3>Наши продукты</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

            <!-- Container-fluid starts-->
            <div class="page-body">

                <!-- Container-fluid starts-->
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="card-body order-datatable">
                                <table class="display table table-bordered" id="basic-1">
                                    <thead>
                                    <tr>
                                        <th class="status-text" style="width: 150px;">Изображение</th>
                                        <th class="status-text" style="width: 350px;">Название</th>
                                        <th class="status-text">Сумма</th>
                                        <th class="status-text">Ссылка</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr>
                                        <td>
                                            <img src="assets/images/products/amst.jpg" width="150px" height="80px" alt="">
                                        </td>
                                        <td class="align-middle text-center">
                                            Армейские часы + Портмоне + Ремень
                                        </td>
                                        <td class="align-middle text-center">
                                            11990тг
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="https://go-dota.kz/site/amst-kz/">https://go-dota.kz/site/amst-kz</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="assets/images/products/a1.jpg" width="150px" height="80px" alt="">
                                        </td>
                                        <td class="align-middle text-center">
                                            Умные часы А1 + Наушники + Power Bank
                                        </td>
                                        <td class="align-middle text-center">
                                            12990тг
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="https://go-dota.kz/">https://go-dota.kz</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <img src="assets/images/products/airpods.jpg" width="150px" height="80px" alt="">
                                        </td>
                                        <td class="align-middle text-center">
                                            AirPods
                                        </td>
                                        <td class="align-middle text-center">
                                            11990тг
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="https://go-dota.kz/site/airpods-2/">go-dota.kz/site/airpods-2</a>
                                        </td>
                                    </tr>

                                    <!--KULON-->
                                    <tr>
                                        <td>
                                            <img src="assets/images/products/kulon.jpg" width="150px" height="80px" alt="">
                                        </td>
                                        <td class="align-middle text-center">
                                            Кулон + Кольцо
                                        </td>
                                        <td class="align-middle text-center">
                                            9990тг
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="https://go-dota.kz/site/kulon">go-dota.kz/site/kulon</a>
                                        </td>
                                    </tr>
                                    <!--Forever-Lux-->
                                    <tr>
                                        <td>
                                            <img src="assets/images/products/forever-lux.jpg" width="150px" height="80px" alt="">
                                        </td>
                                        <td class="align-middle text-center">
                                            Клатч + Скай часы
                                        </td>
                                        <td class="align-middle text-center">
                                            10990тг
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="https://go-dota.kz/site/forever-lux">go-dota.kz/site/forever-lux</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid Ends-->
            </div>

            <!-- Container-fluid Ends-->

        </div>

        <!-- footer start-->
        <?php include 'includes/footer.php'?>
        <!-- footer end-->

    </div>

</div>

<!-- latest jquery-->
<script src="../assets/js/jquery-3.3.1.min.js"></script>

<!-- Bootstrap js-->
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.js"></script>

<!-- feather icon js-->
<script src="../assets/js/icons/feather-icon/feather.min.js"></script>
<script src="../assets/js/icons/feather-icon/feather-icon.js"></script>

<!-- Sidebar jquery-->
<script src="../assets/js/sidebar-menu.js"></script>

<!--Customizer admin-->
<script src="../assets/js/admin-customizer.js"></script>

<!-- Jsgrid js-->
<script src="../assets/js/jsgrid/jsgrid.min.js"></script>
<script src="../assets/js/jsgrid/griddata-manage-product.js"></script>
<script src="../assets/js/jsgrid/jsgrid-manage-product.js"></script>

<!--right sidebar js-->
<script src="../assets/js/chat-menu.js"></script>

<!--script admin-->
<script src="../assets/js/admin-script.js"></script>

</body>
</html>
