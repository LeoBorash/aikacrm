<?php session_start();
if(!isset($_SESSION['user_login'])){
    header("Location: login.php");
}
include "includes/db.php"; ?>

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
                <div class="page-headers">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left mt-3 mb-3">
                                <h3>Наши продукты</h3>
                            </div>
                        </div>
                    </div>
                    <?php
                    $date = date('Y-m-d');
                    $time = date('H:i:s');
                        if(isset($_POST['pr_btn'])){
                            $query = $conn ->query("
                            INSERT INTO products(pr_title,pr_price,pr_count,pr_date,pr_time, pr_user)
                            VALUES ('$_POST[pr_title]','$_POST[pr_price]','$_POST[pr_count]','$date','$time','$_SESSION[user_name]')");
                        }
                    ?>
                    <form action="" method="post" class="form-control d-flex">
                        <select name="pr_title" class="form-control w-25">
                            <option value="Смарт часы A1">Смарт часы A1</option>
                            <option value="Портмоне Муж Baellery">Портмоне Муж Baellery</option>
                            <option value="Портмоне Жен Baellery">Портмоне Жен Baellery</option>
                        </select>
                        <input class="form-control w-25" type="tel" name="pr_price" placeholder="Цена">
                        <input class="form-control w-25" type="tel" name="pr_count" placeholder="Количество">
                        <input class="w-25" type="submit" name="pr_btn" value="Добавить">
                    </form>
                </div>
            </div>
            <!-- Container-fluid Ends-->

            <!-- Container-fluid starts-->
            <div class="page-body">

                <!-- Container-fluid starts-->
                <div class="container-fluid">
                    <div class="page-headers">
                        <div class="row">
                            <div class="card-body order-datatable">
                                <table class="display table table-bordered" id="basic-1">
                                    <thead>
                                        <tr>
                                            <th class="status-text" style="width: 250px;">Дата</th>
                                            <th class="status-text" style="width: 350px;">Товар</th>
                                            <th class="status-text">Сумма</th>
                                            <th class="status-text">Количество</th>
                                            <th class="status-text">Добавил</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            $query = $conn->query("
                                            SELECT * FROM products");
                                            while ($row = $query->fetch_assoc()) : ?>
                                            <tr>
                                                <td class="status-text2"> <?=mb_substr($row['pr_date'],5)?> | <?=mb_substr($row['pr_time'], 0,-3)?> </td>
                                                <td class="status-text2"> <?=$row['pr_title']?> </td>
                                                <td class="status-text2"><?=$row['pr_price'] * $row['pr_count']?></td>
                                                <td class="status-text2"><?=$row['pr_count']?></td>
                                                <td class="status-text2"><?=$row['pr_user']?></td>
                                            </tr>
                                          <?php endwhile;
                                        ?>

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
