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

	<label>Select Style: <select name="styles">
		<option value="white">white</option>
		<option value="grey">grey</option>
	</select></label>

	<button type="submit">submit changes</button>
</form>	

<?php

//LIST OPTIONS (AUTHOR, TITLE)
$sortList = "";
if(isset($_COOKIE["list"])){
	$sortList = $_COOKIE["list"];
	
}
if(isset($_REQUEST["sort-list"])){
	$sortList = $_REQUEST["sort-list"];
	setcookie("list",$sortList,time()+60*60*24*30,"/");
}

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

//VIEW OPTIONS(LIST OR COVER)
$sortView = "";

if(isset($_COOKIE["view"])){
	$sortView = $_COOKIE["view"];
}

if(isset($_REQUEST["sort-view"])){
	$sortView = $_REQUEST["sort-view"];
	setcookie("view",$sortView,time()+60*60*24*30,"/");
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
  elseif($sortView == "list-view") {
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
<?php
//STYLE OPTIONS (CHANGE BACKGROUND COLOR)
$styleSheet = "";

if(isset($_COOKIE["styles"])){
	$styleSheet = $_COOKIE["styles"];
}

if(isset($_REQUEST["styles"])){
	$styleSheet = $_REQUEST["styles"];
	setcookie("styles",$styleSheet,time()+60*60*24*30,"/"); 
}

if($styleSheet == "" || $styleSheet == "white"){
?>

<link rel="stylesheet" type="text/css" href="css/light.css">
<?php
}elseif ($styleSheet == "grey"){
	?>
<link rel="stylesheet" type="text/css" href="css/dark.css">
<?php
}

?>
</body>

</html>