<?php
$strcmd = "sudo -u josh aws ec2 describe-instances --query 'Reservations[].Instances[].InstanceId' > /srv/cmi/info/aws/aws-ec2-instances.inf";
$output = null;
$retval = null;
exec($strcmd,$output,$retval);
?>
