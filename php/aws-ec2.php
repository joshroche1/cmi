<?php
$strcmd = "sudo -u josh aws ec2 describe-instances --query 'Reservations[].Instances[].InstanceId' > /srv/cmi/info/aws/aws-ec2-instances.inf";
$output = null;
$retval = null;
exec($strcmd,$output,$retval);
$file1 = fopen("info/aws/aws-ec2-instances.inf","r") or die();
while(!feof($file1)) {
  $str = fgets($file1);
  $str2 = ltrim($str,"\-");
  $str1 = trim($str2);
  echo $str1;
  $strcmd = "sudo -u josh aws ec2 describe-instances --instance-id " . $str1 . " --query 'Reservations[].Instances[].[InstanceId,PublicIpAddress,Tags[?Key==Name].Value,State.Name]' > /srv/cmi/info/aws/" . $str1 . ".inf";
  echo $strcmd;
  exec($strcmd,$output,$retval);
}
fclose($file1);
?>
