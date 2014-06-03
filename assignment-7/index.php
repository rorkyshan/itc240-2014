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
	<label>Select View: <select name="sort-view">
		<option value="default-val">--select an option below--</option>
		<option value="cover-view">Cover View</option>
		<option value="list-view">List View</option>
	</select></label>

	<label>Sort by: <select name="sort-list">
		<option value="default-sort">--select an option below--</option>
		<option value="title-sort">by title</option>
		<option value="author-sort">by author</option>
	</select></label>

	<button type="submit">submit changes</button>
</form>	

<?php
$sortView = "";
if(isset($_REQUEST["sort-view"])){$sortView = $_REQUEST["sort-view"]; }

$sortList = "";
if(isset($_REQUEST["sort-list"])){$sortList = $_REQUEST["sort-list"]; }

if($sortList == "" || $sortList == "default-sort"){
	$query='SELECT cover, title, author FROM books;';
	$prepared=$mysql->prepare($query);
	$prepared->execute();

	$results=$prepared->get_result();
}elseif($sortList == "author-sort"){
	$query='SELECT cover, title, author FROM books ORDER BY author ASC;';
	$prepared=$mysql->prepare($query);
	$prepared->execute();

	$results=$prepared->get_result();
}else{
	$query='SELECT cover, title, author FROM books ORDER BY title ASC;';
	$prepared=$mysql->prepare($query);
	$prepared->execute();

	$results=$prepared->get_result();
}
	

if($sortView == "" || $sortView == "default-val" || $sortView == "cover-view"){
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
	<div><?= htmlentities($rows["author"]) ?></div></br>
	<div><strong>Description: </strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
	 Nunc faucibus tincidunt nibh, porttitor commodo. </div>
	<button>checkout</button>
  </div>
 </div> 
  <?php
  }
}
 
?>

</body>

</html>