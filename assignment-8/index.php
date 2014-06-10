<?php

include('passwords.php');
include('functions.php');

?>
<!doctype html>
<html>
<head>
	<meta name="robots" content="noindex,nofollow" />
	<meta charset="utf-8" />
	<title>Patrick Dodd - Assignment-8</title>
	<link rel="stylesheet" type="text/css" href="css/light.css">
	
</head>
<body>
<form method="GET" action="index.php">
 <label>Show books by category: <select name="booksReturn">
   <option value="all">Show all</option>
   <option value="booksWant">Show books to read</option>
   <option value="booksRead">Show books read</option>
 </select></label>
 <button>submit changes</button>
</form>
<?php

$booksTwo = get_data("books_two", "author");

$books = get_data("books", "title");

?>
<div class="books-area">
<?php 
$booksReturn = "all";

if(isset($_REQUEST["booksReturn"])){
   $booksReturn = $_REQUEST["booksReturn"];
}

$booksWhitelist = [
	"all" => true,
	"booksWant" => true,
	"booksRead" => true
];

if(!isset($booksWhitelist["$booksReturn"])){
	$booksReturn = "all";
}

if($booksReturn == "all"){
   print_data($booksTwo);
   print_data($books);
} elseif( $booksReturn == "booksWant"){
   print_data($booksTwo);
} else {
	print_data($books);
}
?>
</div>
</body>