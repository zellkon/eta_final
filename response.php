<?php 
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/lib/Session.php');
Session::init();
$from_time= date("Y-m-d H:i:s");
$to_time = $_SESSION['end_time'];

$timefirst = strtotime($from_time);
$timesecond = strtotime($to_time);

$difinseconds = $timesecond - $timefirst;

echo gmdate("i:s", $difinseconds);
?>