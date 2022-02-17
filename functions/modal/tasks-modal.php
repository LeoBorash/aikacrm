<div class="float-right">
    <i class="fa fa-phone-square ic-phone" aria-hidden="true" data-toggle="modal" data-target="#ph<?=$row['client_id']?>">
        <div class="goo" style="display: none">
            <span><?= $row['client_phone'] ?></span>
        </div>
    </i>
    <br>
    <?php
    if(isset($row['task_date'])){
        if(date('Y-m-d') == $row['task_date']){

            if(date('H:i:s') > $row['task_time']){ ?>
                <i class="fa fa-list-ul ic-task" style="color: red" data-toggle="modal" data-target="#<?=$row['client_id']?>"></i>
            <?php }else{ ?>
                <i class="fa fa-list-ul ic-task" style="color: blueviolet" data-toggle="modal" data-target="#<?=$row['client_id']?>"></i>
            <?php }

        }
        elseif (date('Y-m-d') > $row['task_date']){ ?>
            <i class="fa fa-list-ul ic-task" style="color: red" data-toggle="modal" data-target="#<?=$row['client_id']?>"></i>
        <?php } else{ ?>
            <i class="fa fa-list-ul ic-task" data-toggle="modal" data-target="#<?=$row['client_id']?>"></i>
        <?php }
    } ?>
</div>
<!--MODAL TASKS-->
<div class="modal fade" id="<?=$row['client_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?=$row['client_name']?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <i class="fa fa-calendar-o" aria-hidden="true"></i> <?=mb_substr($row['task_date'], 5)?> <br>
                <i class="fa fa-clock-o" aria-hidden="true"></i> <?=mb_substr($row['task_time'], 0,-3)?> <br>
                <hr>
                <?=$row['task_text']?>
            </div>
            <div class="modal-footer">
                <form action="del-task.php" method="post">
                    <input type="hidden" name="task_id" value="<?=$row['task_client_id']?>">
                    <input type="submit" class="btn btn-danger w-100" name="taskdel" value="Удалить">
                </form>
            </div>
        </div>
    </div>
</div>
<!--END MODAL TASKS-->

<?php

?>

<!--MODAL PHONE-->
<div class="modal fade" id="ph<?=$row['client_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <?=$row['client_name']?> <br>
                <hr>
                <?=$row['client_phone']?> <br>
            </div>
        </div>
    </div>
</div>
<!--END MODAL PHONE-->
</div>

