<?php 


function hash_password($password) {
	return password_hash($password, PASSWORD_DEFAULT);
}

function check_password($password, $hash) {
	return password_verify($password, $hash); //parameter pertama adalah dari form login dan kedua dari database
}

function indonesia_month_name($month_number) {
	$month_name = array(
		'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
	);

	return $month_name[$month_number-1];
}

function indonesia_date($datetime) {

	//2017-03-11 19:18:43 
	$day = substr($datetime, 8, 2);
	$month = substr($datetime, 5, 2);
	$year = substr($datetime, 0, 4);

	return $day.'/'.indonesia_month_name($month).'/'.$year;

}

?>