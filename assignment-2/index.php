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
	<input name="noun" placeholder="noun (place)"></br></br>
	<input name="verb" placeholder="verb ending in s"></br></br>
	<input name="adjective" placeholder="adjective"></br></br>
	<input name="first_number" placeholder="enter # between 1-10"></br></br>
	<input name="second_number" placeholder="pick another #"></br></br>
	<button>SUBMIT</button>
</form>
<?php }else{ ?>

<p>The rain in <?= htmlentities($_REQUEST["noun"]); ?> <?= htmlentities($_REQUEST["verb"]); ?> on the <?= htmlentities($_REQUEST["adjective"]); ?> plain. 
<?php $firstnumber=htmlentities($_REQUEST["first_number"]);
 if($firstnumber <= 5){ ?>
     <?=  htmlentities($firstnumber); ?> is not that many enchiladas for breakfast! <?php 
 }elseif($firstnumber>5) {  ?>
     <?=  htmlentities($firstnumber);  ?> is a lot of enchiladas for breakfast! <?php }  ?>
<?php };
$secondnumber = isset($_REQUEST["second_number"]);
if (htmlentities($secondnumber == 17)){
 
 ?>
 Yahtzee!
 <?php } ?> </p>

</body>
</html>
