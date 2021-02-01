<?php
	if (isset($_POST['key'])) {

        $connect = mysqli_connect("localhost", "root", "", "lottogame");
      
	
        if ($_POST['key'] == 'Select') {
			$userresult = mysqli_query($connect, "SELECT * FROM members");
			$rows = array();
			while($r = mysqli_fetch_assoc($userresult)) {
				$rows[] = $r;
			}

			$lotteryesult = mysqli_query($connect, "SELECT * FROM result");
			$rows1 = array();
			while($r = mysqli_fetch_assoc($lotteryesult)) {
				$rows1[] = $r;
			}

			$tempresult = $rows1[0]['LotteryNumber'];
			$luckynoresult = $rows1[0]['LuckyNumber'];
			$tempresultarray = explode(",", $tempresult);
			
			$finalresult = array();
			for ($x = 0; $x < count($rows); $x++) {
				$indexobj = $rows[$x];
				$temp = $indexobj['LotteryNumber'];
				$luckyno = $indexobj['LuckyNumber'];
				$temparray = explode (",", $temp);
				$result = array_intersect($temparray, $tempresultarray);
				$luckeybool = $luckyno === $luckynoresult;
				$tempict = [];
				$tempict["CustomerName"] = $indexobj["CustomerName"];
				$tempict["GridNo"] = $indexobj["GridNo"];
				$tempict["LotteryId"] = $indexobj["id"];
				$tempict["MatcingLotterNumber"] =  count($result);
				$tempict["LuckyNumber"] = $luckeybool;
				$finalresult[] = $tempict;
			}
			echo json_encode($finalresult);
		 }
	}
?>