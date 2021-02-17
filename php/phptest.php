<!DOCTYPE html>
<head>
  <title> PHP Test Page </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"></meta> 
  <link rel="stylesheet" href="../resources/css/w3.css">
  <script src="../resources/js/jquery-3.5.1.min.js"></script>
</head>
<body>
<div class="w3-top">
  <div class="w3-bar w3-black w3-card">
    <a href="../index.html" class="w3-bar-item w3-button w3-blue-gray">
      CMI
    </a>
    <a href="../dashboard.html" class="w3-bar-item w3-button">
      Dashboard
    </a>
    <a href="../servers.html" class="w3-bar-item w3-button">
      Servers
    </a>
    <a href="../cloud.html" class="w3-bar-item w3-button">
      Cloud
    </a>
    <a href="../hypervisors.html" class="w3-bar-item w3-button">
      Hypervisors
    </a>
    <a href="../settings.html" class="w3-bar-item w3-button">
      Settings
    </a>
  </div>
</div>

<main><br><br>
<div class = "w3-row w3-light-gray">
  <div class = "w3-container w3-light-blue w3-card" style = "margin:5px;padding:5px;">
    <h1> PHP Test Page </h1>
  </div>

  <div class = "w3-container w3-white w3-card">
<?php
echo "Date is " . date("d-m-Y");
echo " time is " . date("h:i:sa");
?>
<button id = "button">AWS EC2</button>
<script>
$("button").click(function(){
  $.get("/resources/php/aws-ec2.php", function(data, status){
    alert("Command Sent " + status);
    location.reload(true);
  });
});
</script>
<?php  // pulls instances and opens each instance info file
$instanceid = "";
$file1 = fopen("info/aws/aws-ec2-instances.inf","r") or die("Cannot open file");
echo '<div class = "w3-col l3 m6 s6 w3-container w3-light-gray" style = "padding:5px;">';
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
</div>
</div>
</main>

</body>
</html>
