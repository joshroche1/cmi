#!/bin/bash
# run as root

# from Ubuntu 20.04

apt-get update && apt-get upgrade -y
# apt-get install apache2 -y
# apt-get install nginx -y
# apt-get install php -y
# apt-get install python python3 python-pip python3-pip -y
# apt-get install sqlite3 -y
# apt-get install mysql-server php-mysql -y
# django?

# mod_wsgi
wget https://github.com/GrahamDumpleton/mod_wsgi/archive/4.7.1.tar.gz
tar xvfz 4.7.1.tar.gz
./configure
make
make install
cd .libs
cp mod_wsgi.so /usr/lib/apache2/modules/
touch /etc/apache2/mods-available/mod_wsgi.load
echo "LoadModule wsgi_module /usr/lib/apache2/modules/mod_wsgi.so" >> /etc/apache2/mods-available/mod_wsgi.load
a2enmod mod_wsgi
apachectl restart

#uwsgi
wget https://projects.unbit.it/downloads/uwsgi-2.0.19.1.tar.gz
pip install uwsgi


$from apache2-django.conf in tkl django
WSGIScriptAlias		/	/location/of/wsgi.py
WSGIPythonPath		/var/www/???
WSGIDaemonProcess	django	processes=1	threads=3
WSGIProcessGroup	django
==========================================================
/var/www/html/
  resources/css|js|php/
/srv/cmi/info/ # li -s /home/user/cmi/info/ /var/www/html/
  aws|gcp|oci|azure/ # chown -R www-data:
===PHP====================================================
<?php   # will output instance-id : publicip #
$strcmd = "aws ec2 describe-instances --query 'Reservations[].Instances[].[InstanceId,PublicIpAddress]'";
$output = null;
$retval = null;
$swtch = 0;
exec($strcmd, $output, $retval);
foreach ($output as $value) {
  if ($swtch == 0) {
    echo "$value : ";
    $swtch = 1;
  } elseif ($swtch == 1) {
    echo "$value\n";
    $swtch = 0;
  }
}
?>
$date1 = date("d-m-Y");
$time1 = date("H:i:s");
$dtg = $time . " " . $date;
$strcmd = "echo " . $dtg . " > /home/josh/cmi/info/timestamp.log";
$output = null;
$retval = null;
exec($strcmd, $output, $retval);
===jQuery=================================================
$("button").click(function(){
  $.get("../resources/php/timestamp.php", function(data, status){
    alert("Data: " + data + "\nStatus: " + status);
	location.reload(true);
  });
});
===SHELL==================================================
shell-command > file.log
command >> append.log
===AWSCLI=================================================
AWSCLI
aws ec2 describe-instances \
    --query "Reservations[].Instances[].[InstanceId,PublicIpAddress,Tags[?Key == 'Name'].Value]" \
	> aws-test.json
aws ec2 describe-instances \
    --query "Reservations[].Instances[].[InstanceId,PublicIpAddress,Tags]"
reboot-instances --instance-ids <>
aws ec2 describe-instances \
    --instance-id "i-0b600f7fc43960f8a" \
    --query "Reservations[].Instances[].[InstanceId,PublicIpAddress,Tags[?Key=='Name'].Value,State.Name]"

# get instance ids 
aws ec2 describe-instances --query "Reservations[].Instances[].InstanceId" > /srv/cmi/info/aws/aws-ec2-instances.inf
# get status of instance
aws ec2 describe-instances --instance-id <> --query "Reservations[].Instances[].[InstanceId,PublicIpAddress,Tags[?Key=='Name'].Value,State.Name]"
===========================================================
        <!-- Template for each server instance -->
      <div class = "w3-col l3 m6 s6 w3-container w3-light-blue" style = "padding:5px;">
        <div class = "w3-container w3-card w3-blue" style = "margin:5px;">
          <table class = "w3-table w3-hoverable">
            <tr><th>HOSTNAME</th><th>STATUS</th></tr>
            <tr><td>Host</td><td>123.45.67.89</td></tr>
            <tr><td>User</td><td>username</td></tr>
            <tr><td>Distribution</td><td>DISTRIBUTION</td></tr>
            <tr><td>Distribution Release</td><td>RELEASE</td></tr>
            <tr><td>Distribution Version</td><td>VERSION</td></tr>
          </table>
          <div class = "w3-bar w3-black w3-card">
            <button class = "w3-button w3-round">PING</button>
            <button class = "w3-button w3-round">REBOOT</button>
            <button class = "w3-button w3-round">STOP</button>
          </div>
        </div>
      </div>
          <!-- -->
==============================================================
<?php
$strcmd = "";
$output = null;
$retval = null;
exec($strcmd,$output,$retval);
?>
<?php
$file1 = fopen("info/aws/aws-ec2-instances","r") or die("Cannot open file");
while(!feof($file1)) {
  echo fgets($file1) . "<br>";
}
fclose($file1);
?>
<?php  // pulls instances and opens each instance info file
$instanceid = "";
$file1 = fopen("info/aws/aws-ec2-instances.inf","r") or die("Cannot open file: >
echo '<div class = "w3-col l3 m6 s6 w3-container w3-light-blue" style = "padding:5px;">';
while(!feof($file1)) {
  $str = fgets($file1);
  $str1 = ltrim($str,"\-");
  $instanceid = trim($str1);
  $filename = "info/aws/" . $instanceid . ".inf";
  echo '<div class = "w3-container w3-card" style = "padding:5px;">';
  echo '<div class = "w3-container w3-third">';
  echo '<form action = "#" method = "post"><input type = "hidden" value = "';
  echo trim($instanceid);
  echo '"><input type = "submit" value = "REBOOT"></form>';
  echo '<form action = "#" method = "post"><input type = "hidden" value = "';
  echo trim($instanceid);
  echo '"><input type = "submit" value = "STOP"></form>';
  echo '</div><div class = "w3-container w3-twothird">';
  echo '<table class = "w3-table-all w3-hoverable">';
  echo "<tr><td>";
  $file2 = fopen($filename,"r") or die("Cannot open file: " . $filename);
  while(!feof($file2)) {
    $str01 = fgets($file2);
    $str02 = ltrim($str01,"\-");
    $str03 = trim($str02);
    $str04 = ltrim($str03,"\-");
    $str05 = trim($str04);
    echo $str05;
    echo "</td></tr><tr><td>";
  }
  fclose($file2);
  echo '</td></tr></table></div></div>';
}
echo '</div>';
fclose($file1);
?>
