<?php
	$kon=mysqli_connect('localhost','root','','db_pkh');

function status_pkh($status_pkh)
{
	global $kon;
	$query = "select count(status_pkh) from tbl_training where status_pkh='$status_pkh'";
	$res = mysqli_query($kon, $query);
	$result = mysqli_fetch_row($res);
	return $result[0];
}

function c($c)
{
	global $kon;
	$query = "select distinct $c from tbl_training";
	$result = mysqli_query($kon, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function hitung($c, $nilai, $status_pkh)
{
	global $kon;
	$query = "select count($c) from tbl_training where $c = '$nilai' AND status_pkh = '$status_pkh'";
	$res = mysqli_query($kon, $query);
	$result = mysqli_fetch_row($res);
	return $result[0];
}
?>

