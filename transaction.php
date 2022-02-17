<?php
session_start();

//Проверка, если нет Сесси, уволим
if(!isset($_SESSION['user_login'])){
    header("Location: login.php");
}


if($_SESSION['user_status'] != 4){
    // Заходим в кабинет Клиента
    header("Location: index.php");
}

include "includes/db.php";
include "functions/transaction/index.php";



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
                                <th scope="col" class="text-center">Кому</th>
                            </tr>
                            </thead>

                            <tr>
                                <?php transaction_arbitraj(); ?>
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
                                <th scope="col" class="text-center">Кому</th>
                            </tr>
                            </thead>

                            <tr>
                                <?php transaction_client(); ?>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>

            <?php
                if(isset($_POST['add_transaction'])){
                    $tr_date = $_POST['transaction_date'];
                    $tr_summ = $_POST['transaction_summ'];
                    $tr_comment = $_POST['transaction_comment'];
                    $tr_who = $_POST['transaction_who'];
                    global $conn;

                    $query = $conn->query("
                    INSERT INTO `transaction`(`transaction_date`, `transaction_summ`, `transaction_comment`, `transaction_who`)
                    VALUES('$tr_date', '$tr_summ', '$tr_comment', '$tr_who')");

                    if(!$query){
                        echo '<script>alert("Ошибка")</script>';
                    }
                }
            ?>
            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <form action="" class="form-control" method="POST">
                    <input type="date" name="transaction_date" placeholder="Дата" class="form-control mb-1">
                    <input type="text" name="transaction_summ" placeholder="Сумма" class="form-control mb-1">
                    <textarea name="transaction_comment" cols="20" rows="3" class="form-control mb-1"></textarea>
                    <select name="transaction_who" class="form-control mb-1">
                        <option value="alimzhan">Алимжан</option>
                        <option value="aika">Айгерім</option>
                    </select>
                    <button name="add_transaction" class="form-control btn btn-info-gradien">Отправить</button>
                </form>
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
