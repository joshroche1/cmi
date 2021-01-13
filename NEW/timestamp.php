<?php
$date1 = date("d-m-Y");
$time1 = date("H:i:s");
$dtg = $time1 . " " . $date1;
$strcmd = "echo " . $dtg . " > /srv/testinfo/timestamp.log";
$output = null;
$retval = null;
exec($strcmd, $output, $retval);
?>
