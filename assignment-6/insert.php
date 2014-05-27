<?php 

  include("passwords.php");
  $mysql = new mysqli("localhost", "pdodd001", $mysql_pass, "pdodd001");

  $query = 'INSERT INTO kitty_fit (activity, cals_burned, activity_date) VALUES (?,?,now());';
  $prepared = $mysql->prepare($query);
  $prepared->bind_param("si", $_REQUEST["activity"], $_REQUEST["cals_burned"]);
  $prepared->execute();

  header("Location: index.php")
?>