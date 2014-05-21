<?php 
include("passwords.php");
	
$mysql = new mysqli("localhost", "pdodd001", $mysql_pass, "pdodd001");
?>

<!doctype html>
<html>
 <head>
 <style>
	.container{
		border:1px solid black;
		margin-bottom:10px;
		width:25%;
		margin-top:10px;
		padding:5px;
	}
 </style>
 </head>
 <body>
   <h3>ENTER EXPENSES:</h3>
   
   <form action="index.php" method="POST">
	 <input name="total_cost" placeholder="enter cost">
	 <input name="place_purch" placeholder="enter place of purchase">
	 <input name="purch_dt" placeholder="enter date (yyyy-mm-dd)">
	 <input name="details" placeholder="enter item details">
	 <input type="submit" name="submit">
   </form>
	
	<h3>REQUEST RECEIPTS BY MONTH:</h3>
	<form action="index.php" method="GET">
      <input name="month" placeholder="enter month of receipts: mm">
      <button type="submit">get receipts</button>
    </form> 
 	
 	<?php 
 	
 	if($_SERVER["REQUEST_METHOD"] == "GET"){
		
		$select = 'SELECT total_cost, place_purch, YEAR(purch_dt) AS year, MONTH(purch_dt) AS month, DAY(purch_dt) AS day, details FROM expenses WHERE MONTH(purch_dt) = ?;';
	
		$prepared = $mysql->prepare($select);
		$prepared->bind_param("i", $_REQUEST["month"]);
		$prepared->execute();
		
	$receipts = $prepared->get_result();
	
	
	foreach($receipts as $receipt){
	?>
		<div class="container">
		<p><?= $receipt["total_cost"] ?></p> 
		<p><?= $receipt["place_purch"] ?></p>
		<p><?= $receipt["month"] ?>/
		<?= $receipt["day"] ?>/
		<?= $receipt["year"] ?></p>
		<p><?= $receipt["details"] ?></p>
		</div>
	
	<?php	 
	  }	 
	
	 
	 }
 	
 	?>
 </body>
</html>

<?php 
	 
	if($_SERVER["REQUEST_METHOD"] == "POST"){  
	$query = 'INSERT INTO expenses (total_cost, place_purch, purch_dt, details) VALUES (?,?,?,?) ;';
	
	$prepared = $mysql->prepare($query);
	$prepared->bind_param("isss", $_REQUEST["total_cost"], $_REQUEST["place_purch"], $_REQUEST["purch_dt"], $_REQUEST["details"]);
	$prepared->execute();
	}
	
 ?>