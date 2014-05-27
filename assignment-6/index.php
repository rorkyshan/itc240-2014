

<!doctype html>
<html>
<head>

	<style>
		p {
			width:35%;
		}

		img{
			display:inline;
		}

		.inline-text{
			display:inline-block;
		}

	</style>
</head>

<body>
	<h2>Help Wolfie Get Ready For Swimsuit Season!</h2>
	
	<img src="images/wolfie.jpg" alt="img" width="175">
	<p class="inline-text">Wolfie has tried everything to lose weight, from the Catkins Diet to the Southpaw Beach method. 
		He has recently found that there's no substitute
		for good old fashioned excercise. Help him track his progress below.</p>
		
	
	<h3>Enter Wolfie's activity and the calories burned:</h3>
  <form action="insert.php" method="POST">
    <input type="text" name="activity" placeholder="enter activity...">
    <input type="text" name="cals_burned" placeholder="calories burned...">
    <button type="submit">SUBMIT</button>
  </form>

  <h4>ACTIVITY LOG:</h4>

  <?php
    include("passwords.php");
    $mysql = new mysqli("localhost", "pdodd001", $mysql_pass, "pdodd001");

    $prepared = $mysql->prepare('SELECT YEAR(activity_date) AS year, MONTH(activity_date) AS month, DAY(activity_date) AS day, cals_burned, activity FROM kitty_fit 
    	ORDER BY activity_date DESC;');
    $prepared->execute();

    $results = $prepared->get_result();

    foreach($results as $row){
    ?>

    <div>
    	On
      <?= htmlentities($row["month"]) ?>/<?= htmlentities($row["day"]) ?>/<?= htmlentities($row["year"]) ?>
       Wolfie burned
      <?= htmlentities($row["cals_burned"]) ?>
        calories when he
      <?= htmlentities($row["activity"]) ?>.
	</div>
 <?php
    }
  ?>

<?php 
	
	$totalQuery = $mysql->prepare('SELECT SUM(cals_burned) AS sum, MAX(cals_burned) AS max FROM kitty_fit;');
	$totalQuery->execute();

	$totalResult = $totalQuery->get_result();
	$total = $totalResult->fetch_array();

?>

  <div>

  	<p><strong>Total calories burned to date: <?= $total["sum"] ?></strong></p>
    <p><strong>Max calories burned in a single activity: <?= $total["max"] ?></strong></p>

  </div>

</body>


</html>