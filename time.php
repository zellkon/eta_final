<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath."/inc/header.php");
Session::checkSession();
$durationData = $exm->getDuration();

if($durationData)
{
	while($result = $durationData->fetch_assoc())
	{
		$duration = $result['duration'];
	}
	$_SESSION['duration'] = $duration;
	$_SESSION['start_time'] = date("Y-m-d H:i:s");
	$end_time = date("Y-m-d H:i:s", strtotime('+', $_SESSION['duration'].'minutes', strtotime($_SESSION['start_time'])));
	$_SESSION['end_time'] = $end_time;
}
?>  