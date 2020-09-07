<?php 

$from_time1= date('Y-m-d H:i:s');
		$to_time1= $this->session->userdata('end_tim');
		// print_r($to_time1);
		$timefirst=strtotime($from_time1);
		$timesecond=strtotime($to_time1);

		$differenceinseconds=$timesecond-$timefirst;
		echo gmdate("H:i:s",$differenceinseconds);
 ?>