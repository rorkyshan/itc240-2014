 <!doctype html>
<html>
<head>
</head>

<body>
<?php $method=($_SERVER["REQUEST_METHOD"]);
      if($method == "GET"){
       
?>
<form method="post">
Mad Libs!</br></br>
	<input name="noun" placeholder="noun ending in ly"></br></br>
	<input name="verb" placeholder="verb ending in s"></br></br>
	<input name="adjective" placeholder="adjective"></br></br>
	<input name="first_number" placeholder="enter a # between 1-10"></br></br>
	<input name="second_number" placeholder="pick another #"></br></br>
	<button>SUBMIT</button>
</form>
<?php }else{ ?>

<p>The rain in <?= htmlentities($_REQUEST["noun"]); ?> <?= htmlentities($_REQUEST["verb"]); ?> falls mainly on the <?= htmlentities($_REQUEST["adjective"]); ?> plain.</p>
<?php } ?>
</body>
</html>
