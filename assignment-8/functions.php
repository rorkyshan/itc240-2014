<?php

$mysql = new mysqli("localhost","pdodd001",$mysql_pass,"pdodd001");

function get_data($table, $sort){
	global $mysql;
	$prepared = $mysql->prepare("SELECT * FROM $table ORDER BY $sort ASC;");
	$prepared->execute();
	return $results = $prepared->get_result();
}	

function print_data($results){
foreach($results as $rows){
	?>
	<div class="book-wrapper">
	 <div class="inner-wrapper">
	  <div><img src="<?= htmlentities($rows["cover"]) ?>" alt="img"></div>
	  <div><?= htmlentities($rows["title"]) ?></div>
	  <div><?= htmlentities($rows["author"]) ?></div>
	 </div>
	</div>
<?php
 }
}
?>