<?php

if($_SESSION['user_status'] == 3){

	echo "Идет технические работы";

}
else{
	include "all.php";
	include "iwatch-alim.php";
	include "iwatch.php";
	include "v8-gifts.php";
}



?>