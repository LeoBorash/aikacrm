<?php
session_start();

//Проверка, если нет Сесси, уволим
if(!isset($_SESSION['user_login'])){
    header("Location: login.php");
}


if($_SESSION['user_status'] != 3){
    // Заходим в кабинет Клиента
    header("Location: index.php");
}

include "includes/db.php";
include "functions/manager/balance.php";
include "functions/previous_month.php";

//Арбитраж соеденим
include "arbitrazh/table_dohod/index.php";
include "arbitrazh/table_zayavki/index.php";
include "arbitrazh/table_transaction_/index.php";


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

                </div>
            </div>
            <!-- Container-fluid Ends-->

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6 xl-100">
                        <div class="card">
                            <div class="card-body">
                                <div class="wa">
                                    <h5>Лиды: </h5>
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col" class="text-center">Дата</th>
                                            <th scope="col" class="text-center">Поступила</th>
                                            <th scope="col" class="text-center">В Процессе</th>
                                            <th scope="col" class="text-center">Подтвержден</th>
                                            <th scope="col" class="text-center">Отказ</th>
                                        </tr>
                                        </thead>
                                        <?php
                                        foreach($rows as $date => $item):
                                            ?>
                                            <tr>
                                                <td><?=$date?> </td>
                                                <td class="text-center"><?=$item['total']?></td>
                                                <td class="text-center"><?=$item['process']?></td>
                                                <td class="text-center"><?=$item['success']?></td>
                                                <td class="text-center"><?=$item['otkaz']?></td>
                                            </tr>
                                        <? endforeach;  ?>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 xl-100">
                        <div class="card">
                            <div class="card-body">
                                <div class="wa">
                                    <h5>Доход: </h5>
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col" class="text-center">Название</th>
                                            <th scope="col" class="text-center">Период</th>
                                            <th scope="col" class="text-center">Подтвержден</th>
                                            <th scope="col" class="text-center">Расход РК</th>
                                            <th scope="col" class="text-center">Прибыл</th>
                                        </tr>
                                        </thead>

                                            <tr>
                                                <td class="text-center">IWatch + 4</td>
                                                <td class="text-center">05.02 - 08.02</td>
                                                <td class="text-center"><?=$countPodtverzhden ?></td>
                                                <?php
//                                                Подтвержден * 2000 = Выручка
                                                    $vyruchka = $countPodtverzhden * 2000;
                                                    $rashodRK = 41000;
                                                ?>
                                                <td class="text-center"><?=$rashodRK?></td>
                                                <?php
                                                    $dohod = $vyruchka - $rashodRK;
                                                ?>
                                                <td class="text-center"><?=$dohod - ($dohod * (70 / 100)) ?></td>
                                            </tr>

                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="wa">
                                    <h5>Полученные деньги: </h5>
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col" class="text-center">Дата</th>
                                            <th scope="col" class="text-center">Сумма</th>
                                            <th scope="col" class="text-center">Комментарий</th>
                                        </tr>
                                        </thead>

                                        <tr>
                                            <?php transaction_arbitrazh(); ?>
                                        </tr>

                                    </table>
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
