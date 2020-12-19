<!DOCTYPE html>
<head>
  <title>Cloud Management Interface</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"></meta>
  <link rel="stylesheet" href="../resources/w3.css">
  <script src="../resources/jquery-3.5.1.min.js"></script>
  <script src="../resources/appml.js"></script>
</head>
<body>

<div class="w3-container w3-blue-grey">
  <a href="../index.php">
  <h1>Cloud Management Interface</h1></a>
  <h2>SERVERS</h2>
</div>

<div class="w3-bar w3-black w3-card">
  <a href="../dashboard.php" class="w3-bar-item w3-button">Dashboard</a>
  <a href="../servers.php" class="w3-bar-item w3-button">Servers</a>
  <a href="../cloud.php" class="w3-bar-item w3-button">Cloud</a>
  <a href="../hypervisors.php" class="w3-bar-item w3-button">Hypervisors</a>
  <a href="../admin.php" class="w3-bar-item w3-button">Admin</a>
  <a href="../jquery.html" class="w3-bar-item w3-button">jQuery</a>
</div>

<div class="w3-row-padding">

<div class="w3-col s12 m12 l12 w3-container w3-blue w3-card">
<script>
$(document).ready(function(){
  $("button").click(function(){
    $("#infolog").load("../info/local.yml.log");
  });
});
</script>
<div id="infolog">INFO HERE</div>
<button>PULL</button>
</div>

<div class="w3-col s12 m12 l12 w3-container w3-green w3-card">
<div appml-data="appml.php?model=/resources/appmldata/model_local_yml.json">
<table>
<tr><th>DTG</th>
<th>Hostname</th>
<th>User</th>
<th>Distribution</th>
<th>Release</th>
<th>Version</th>
<th>IPv4 Addresses</th></tr>
<tr appml-repeat="records">
  <td>{{dtg}}</td>
  <td>{{ansible_hostname}}</td>
  <td>{{ansible_user}}</td>
  <td>{{ansible_distribution}}</td>
  <td>{{ansible_distribution_release}}</td>
  <td>{{ansible_distribution_version}}</td>
  <td>{{ansible_all_ipv4_addresses}}</td>
</tr>
</table>
</div>
</div>

</div>

</div>

<div class="w3-container w3-blue-grey">
<h2>Cloud Management Interface</h2>
</div>

</body>
</html>
