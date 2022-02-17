<?php
include 'includes/db.php';
if(isset($_POST['taskdel'])){
    $queryd = $conn->query("DELETE FROM tasks WHERE task_client_id = '$_POST[task_id]'");
    if($queryd){
        echo '<script>history.go(-1)</script>';
    }else{echo 'Ошибка';}
}