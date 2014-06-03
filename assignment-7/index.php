<?php
include('passwords.php');
$mysql = new mysqli("localhost","pdodd001",$mysql_pass,"pdodd001");
?>


<!doctype html>
<html>
<head>
	<meta name="robots" content="noindex,nofollow" />
	<meta charset="utf-8" />
	<title>Patrick Dodd - Assignment-7</title>
	<style>
		
		.book-wrapper{
			display:inline-block;
			margin:10px;
			padding:10px;
			border:1px solid rgb(200,200,200);
			width: 225px;
			font-family: arial;
			font-size: 0.85em;
		}

		.inner-wrapper{
			margin:0 auto;
			padding-left: 15%;
		}

		label{
			margin-right:10px;
			font-family: arial;
			font-size: 0.8em;
		}	

		button{
			margin-top:10px;
		}
	</style>
</head>
<body>
<form method="GET" action="index.php">
	<label>Select View: <select name="sort-list">
		<option value="default-val">--select an option below--</option>
		<option value="cover-view">Cover View</option>
		<option value="list-view">List View</option>
	</select></label>
	<button type="submit">submit changes</button>
</form>	

<?php
$sortList = "";
if(isset($_REQUEST["sort-list"])){$sortList = $_REQUEST["sort-list"]; }

$query='SELECT cover, title, author FROM books;';
$prepared=$mysql->prepare($query);
$prepared->execute();

$results=$prepared->get_result();

	

if($sortList == "" || $sortList == "default-val" || $sortList = "cover-view"){
foreach ($results as $rows) {
?>
  <div class="book-wrapper">
  	<div class="inner-wrapper">
	<div><img src="<?= htmlentities($rows["cover"]) ?>" alt="img"></div>
	<div><?= htmlentities($rows["title"]) ?></div>
	<div><?= htmlentities($rows["author"]) ?></div>
	<button>checkout</button>
  </div>
 </div>

<?php
	}
}
  else{
  	foreach ($results as $rows) {
?>
  <div class="book-wrapper">
  	<div class="inner-wrapper">
	<div><img src="<?= htmlentities($rows["cover"]) ?>" alt="img"></div>
	<div><?= htmlentities($rows["title"]) ?></div>
	<div><?= htmlentities($rows["author"]) ?></div>
	<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
	 Nunc faucibus tincidunt nibh, porttitor commodo mi adipiscing eget.
	 In eleifend porta ante non faucibus. </div>
	<button>checkout</button>
  </div>
 </div>
  <?php
  }
}
 
?>

</body>

</html>