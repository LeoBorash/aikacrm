<?php
session_start();
//Проверка, если нет Сесси, уволим
if(!isset($_SESSION['user_login'])){
    header("Location: login.php");
}
?>
<?php include "includes/db.php";
include "functions/status/select_edit.php";
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <?php include "includes/head.php"; ?>
    <link rel="stylesheet" href="assets/css/edit.css">
    <style>
        td, th, p, span, a {
            color: black;
        }

        input {
            width: 100%;
            border: none;
        }

        td {
            border: 2px solid gray;
        }

        span {
            font-weight: bold;
        }
    </style>
</head>

<body>
<?php
$index = 1;
$query = $conn->query("SELECT * FROM clients WHERE client_id = '$_GET[id]'");
while ($row = mysqli_fetch_assoc($query)) :
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php

                if (isset($_SESSION['page-otpravka'])) {
                    echo '<a href="' . $_SESSION['page-otpravka'] . '" class="btn btn-light mt-2 mb-3">Назад!</a>';
                } elseif (isset($_SESSION['page-manager'])) {
                    echo '<a href="' . $_SESSION['page-manager'] . '" class="btn btn-light mt-2 mb-3">Назад!</a>';
                } elseif (isset($_SESSION['page-logist'])) {
                    echo '<a href="' . $_SESSION['page-logist'] . '" class="btn btn-light mt-2 mb-3">Назад!</a>';
                } elseif (isset($_SESSION['page-success'])) {
                    echo '<a href="' . $_SESSION['page-success'] . '" class="btn btn-light mt-2 mb-3">Назад!</a>';
                }elseif (isset($_SESSION['page-search'])) {
                    echo '<a href="' . $_SESSION['page-search'] . '" class="btn btn-light mt-2 mb-3">Назад!</a>';
                }
                ?>
                <form action="" method="POST">
                    <span>Имя:</span> <input type="text" class="form-control" name="client_name"
                                             value="<?= $row['client_name'] ?> ">
                    <span> Номер:</span> <input type=" text" class="form-control" readonly name="client_phone"
                                                value="<?= $row['client_phone'] ?> ">
                    <span>Товар:</span> <input type=" text" class="form-control" readonly name="client_product"
                                               value="<?= $row['client_product'] ?>"
                    <span>Цена:</span> <input type=" text" class="form-control" name="client_price"
                                              value="<?= $row['client_price'] ?> ">
                    <?php
                        if($_SESSION['user_status'] != 3) { ?>
                            <span>Город:</span> <input type=" text" class="form-control" name="client_city"
                                                       value="<?= $row['client_city'] ?> ">
                            <span>Адрес:</span> <input type=" text" class="form-control" name="client_adress"
                                                       value="<?= $row['client_adress'] ?> ">
                            <span>Трек:</span> <input type=" text" class="form-control" name="client_track"
                                                      value="<?= $row['client_track'] ?> ">
                        <?php }
                    ?>


                    <span>Статус:</span>
                    <select name="client_status" class="m-1 form-control">
                        <?php
                        select_edit();
                        ?>

                    </select>


                    <?php
                    if ($_SESSION['user_status'] == 2) { ?>
                        <button name="btn-save" class="btn btn-primary mb-5 ml-1 mt-2"">Изменить</button>
                    <?php } elseif ($_SESSION['user_status'] == 4) { ?>
                        <button name="btn-save" class="btn btn-primary mb-5 ml-1 mt-2">Изменить</button>
                        <button name="btn-delete" class="btn btn-danger mb-5 ml-1 mt-2">Удалить</button>
                    <?php }
                    ?>

                </form>
            </div>
            <div class="col-md-6">
                <div class="block">

                    <?php
                    // START TASKS
                    $query = $conn->query("
                    SELECT * FROM tasks WHERE task_client_id = '$_GET[id]' 
                    ORDER BY task_text DESC");
                    $row = mysqli_fetch_assoc($query);

                    ?>
                    <form action="" method="POST">
                        <div class="rows">
                            <input type="date" name="task_date" value="<?= $row['task_date'] ?>"
                                   class="form-control w-25 float-left">
                            <input type="time" name="task_time" value="<?= $row['task_time'] ?>"
                                   class="form-control w-25">
                        </div>
                        <textarea placeholder="<?= $row['task_text'] ?>" name="task_text" cols="20" rows="1"
                                  class="form-control w-50" id="com_pole"></textarea>
                        <button name="add_tasks" class="btn btn-danger w-50 mb-1 float-left">Добавить</button>
                        <button name="taskdel" class="btn btn-danger w-25 ml-2 mb-1">Удалить</button>
                    </form>
                    <?php
                    //START COMMENT
                    $query = $conn->query("
                    SELECT * FROM comments 
                    WHERE com_client_id = '$_GET[id]' 
                    ORDER BY com_date DESC, com_time DESC");
                    while ($row = mysqli_fetch_assoc($query)) { ?>
                        <p><?= $row['com_user'] ?> (<?= substr($row['com_date'], -5) ?>/
                            <?= substr($row['com_time'], 0, -3) ?>): <?= $row['com_text'] ?> </p>
                    <?php }
                    ?>
                    <!--Изменение статуса-->
                    <?php
                    $query = $conn->query("
                    SELECT * FROM status 
                    WHERE status_client_id = '$_GET[id]' 
                    ORDER BY status_date DESC, status_time DESC");
                    while ($row = mysqli_fetch_assoc($query)) { ?>
                        <p><?= $row['status_name'] ?> (<?= substr($row['status_date'], -5) ?>/
                            <?= substr($row['status_time'], 0, -3) ?>): Изменил статус на
                            <span style="color: red"><?= substr($row['status_status'], 2) ?></span></p>
                    <?php }
                    ?>

                </div>
                <form action="" method="POST">
                    <textarea placeholder="Написать коммент" name="com_text" cols="30" rows="2"
                              class="form-control" id="com_pole"></textarea>
                    <button name="add_com" class="btn btn-primary w-100">Коммент</button>
                </form>
            </div>
        </div>
    </div>
<?php endwhile; ?>
<?php

// START TASKS
if(isset($_POST['taskdel'])){
    $queryd = $conn->query("DELETE FROM tasks WHERE task_client_id = '$_GET[id]'");
    if($queryd){
        echo '<script>document.location = "edit.php?id='.$_GET['id'].'"</script>';
    }else{echo 'Ошибка';}
}
if (isset($_POST['add_tasks'])) {
    $query = $conn->query("SELECT task_client_id FROM tasks WHERE task_client_id = '$_GET[id]'");
    $row = mysqli_fetch_assoc($query);
    if ($query->num_rows >= 1) {

        $query2 = $conn->query("
            UPDATE tasks SET
            task_user = '$_SESSION[user_name]',
            task_text = '$_POST[task_text]',
            task_date = '$_POST[task_date]',
            task_time = '$_POST[task_time]'
            WHERE task_client_id = '$_GET[id]';");
            if($query2){
                echo '<script>document.location = "edit.php?id='.$_GET['id'].'"</script>';
            }
    } else {

        $query3 = $conn->query("
            INSERT INTO `tasks`(`task_client_id`, `task_user`, `task_text`, `task_date`, `task_time`) 
            VALUES ('$_GET[id]','$_SESSION[user_name]','$_POST[task_text]','$_POST[task_date]','$_POST[task_time]')");
        if ($query) {
            echo '<script>history.go(-1)</script>';
        } else {
            echo '<script>alert("Ошибка")</script>';
        }

    }
}
// END TASKS

if (isset($_POST['btn-save'])) {

    $data = date("Y-m-d H:i:s");
    $time = date("H:i:s");

    $querys = $conn->query("
        INSERT INTO `status`(`status_client_id`,`status_name`, `status_status`, `status_date`,`status_time`)
        VALUES ('$_GET[id]','$_SESSION[user_name]','$_POST[client_status]','$data','$time')");


    $query = $conn->query("SELECT client_confirm FROM clients WHERE client_id='$_GET[id]'");
    $row = mysqli_fetch_assoc($query);

    if ($row['client_confirm'] == '') {
        $query = $conn->query("UPDATE clients SET
        client_name = '$_POST[client_name]',
        client_price = '$_POST[client_price]',
        client_track = '$_POST[client_track]',
        client_product = '$_POST[client_product]',
        client_city = '$_POST[client_city]',
        client_adress = '$_POST[client_adress]',
        client_status = '$_POST[client_status]',
        client_confirm = '$_SESSION[user_name]'
        WHERE client_id = '$_GET[id]';
        ");

        if ($query) {
            echo '<script>history.go(-1)</script>';
        }
    } else {
        $query = $conn->query("UPDATE clients SET
        client_name = '$_POST[client_name]',
        client_price = '$_POST[client_price]',
        client_track = '$_POST[client_track]',
        client_product = '$_POST[client_product]',
        client_city = '$_POST[client_city]',
        client_adress = '$_POST[client_adress]',
        client_status = '$_POST[client_status]'
        WHERE client_id = '$_GET[id]';
        ");

        if ($query) {
            echo '<script>history.go(-1)</script>';
        }
    }

}


if (isset($_POST['btn-delete'])) {
    $query = $conn->query("DELETE FROM clients WHERE client_id='$_GET[id]';");
    if ($query) {
        if (isset($_SESSION['page-manager'])) {
            echo '<script>document.location="' . $_SESSION['page-manager'] . '"</script>';
        } elseif (isset($_SESSION['page-otpravka'])) {
            echo '<script>document.location="' . $_SESSION['page-otpravka'] . '"</script>';
        } elseif (isset($_SESSION['page-logist'])) {
            echo '<script>document.location="' . $_SESSION['page-logist'] . '"</script>';
        } elseif (isset($_SESSION['page-success'])) {
            echo '<script>document.location="' . $_SESSION['page-success'] . '"</script>';
        }elseif (isset($_SESSION['page-search'])) {
            echo '<script>document.location="' . $_SESSION['page-search'] . '"</script>';
        }
    }
}
?>

<?php
if (isset($_POST['add_com'])) {
    $data = date("Y-m-d H:i:s");
    $time = date("H:i:s");
    $query = $conn->query("
        INSERT INTO `comments`(`com_client_id`,`com_user`, `com_text`, `com_date`,`com_time`)
        VALUES ('$_GET[id]','$_SESSION[user_name]','$_POST[com_text]','$data','$time')");
    if ($query) {
        echo '<script>history.go(-1)</script>';
    }
}
?>
</body>

</html>
