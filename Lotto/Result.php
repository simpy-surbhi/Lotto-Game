<?php
	if (isset($_POST['key'])) {

        $connect = mysqli_connect("localhost", "root", "", "lottogame");
        $connect->query("TRUNCATE TABLE result");
        mysqli_query($connect, $sql);
	
      $item1 = $connect->real_escape_string($_POST['LuckyNumber']);
		$item2 = $connect->real_escape_string($_POST['LotteryNumber']);
       $item3 = mysqli_real_escape_string($connect, date("Y/m/d"));
 if($_POST['key'] == 'Insert'){
    $connect->query("INSERT INTO result(LuckyNumber,LotteryNumber,Date)
    values('$item1','$item2','$item3')");
    mysqli_query($connect, $query);
    exit('The Row has been deleted');
       
    }
 
    }
    echo "<script>alert('Customer Details Successfully Uploaded');</script>";
    ?>