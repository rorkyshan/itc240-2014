<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>Panda Family</title>
<meta name="robots" content="noindex,nofollow" />
<style>

table{
  width:100%;
  border:1px solid black;
  border-collapse:collapse;
}

tr, th, td{
  border: 1px solid black;
  text-align: center;
  padding:5px;
}
</style>

</head>

<body>
<?php

include("passwords.php"); 

//server, usnm, pass, database
$mysql = new mysqli("localhost","pdodd001",$mysql_pass,"pdodd001");

//var to store results of query in
$results = $mysql->query('SELECT * FROM panda_mafia ORDER BY id DESC;');

?>
<h3>Panda Mafia Database by the Fuzzy Bureau of Investigation</h3>
<table>
<tr>
<th>Picture</th>
<th>Nickname</th>
<th>Modus Operandi</th>
<th>D.O.B.</th>
<th>ID No.</th>
</tr>

<?php
foreach($results as $rows){
?>

<tr>
<td><img src="<?= $rows["picture"]; ?>" alt="img"></td>
<td><?= $rows["nickname"]; ?></td>
<td><?= $rows["modus_operandi"]; ?> </td>
<td><?= $rows["date_of_birth"];  ?> </td>
<td><?= $rows["id"];  ?> </td>
</tr>

<?php
}
?>
</table>
</body>

</html>
