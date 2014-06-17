<?php

include("class.php");

?>
<!doctype html>
<html>
<head>
  <meta name="robots" content="noindex,nofollow" />
  <meta charset="utf-8" />
  <title>Patrick Dodd - Assignment-9</title> 
</head>

<body>
<?php
 $bus = new Bus();
 $bus->setSpeed(20);
 
$tests = new Tester();
$tests->test(10,10); 
$tests->test($bus->speed, 20);
$tests->test($bus->setSpeed(20), false);
$tests->test($bus->trigger(), true);
$busTwo = new Bus();
?>
<p>Tests Passed: <?= $tests->passed; ?></p>
<p>Tests Failed: <?= $tests->failed; ?></p>


<p>The current speed of the bus is <?= $busTwo->getSpeed(); ?>mph, the bomb is <?php if($busTwo->armed == false){
 ?> unarmed <?php } else { ?>armed<?php } ?><?php 
 if($busTwo->exploded == false) { ?> 
 and the bomb has not exploded
  <?php } else { ?> and the bomb has exploded <?php } ?></p>
 
 <?php 
  $busTwo->setSpeed(55);
 ?>

<p>The current speed of the bus is <?= $busTwo->getSpeed(); ?>mph, the bomb is <?php if($busTwo->armed == false){
 ?> unarmed <?php } else { ?>armed<?php } ?><?php 
 if($busTwo->exploded == false) { ?> 
 and the bomb has not exploded
  <?php } else { ?> and the bomb has exploded <?php } ?></p>
  
  <?php 
  $busTwo->setSpeed(80);
  ?>
  
  <p>The current speed of the bus is <?= $busTwo->getSpeed(); ?>mph, the bomb is <?php if($busTwo->armed == false){
 ?> unarmed <?php } else { ?>armed<?php } ?><?php 
 if($busTwo->exploded == false) { ?> 
 and the bomb has not exploded
  <?php } else { ?> and the bomb has exploded <?php } ?></p>
  
  <?php
  $busTwo->setSpeed(30);
  ?>
  
  <p>The current speed of the bus is <?= $busTwo->getSpeed(); ?>mph, the bomb is <?php if($busTwo->armed == false){
 ?> unarmed <?php } else { ?>armed<?php } ?><?php 
 if($busTwo->exploded == false) { ?> 
 and the bomb has not exploded
  <?php } else { ?> and the bomb has exploded <?php } ?></p>
  <img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcR225_w4-fpY5XZe1h95tIg6rVzViSWAOnz3tbJyy--1IHNmO6O" alt="bogus"></br>
  <?php
  $busTwo->exploded=false;
  ?>
  
   <?php if($busTwo->exploded == false) { ?> 
 Rewrite: the bomb has not exploded.
  <?php } else { ?> Sorry, the bomb has exploded. <?php } ?></p>
    <img src="data:image/jpeg;base64,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" alt="billted"></br>

  <?php
  $busTwo->trigger();
  ?>
  
  <?php if($busTwo->exploded == false) { ?> 
 Rewrite: the bomb has not exploded.
  <?php } else { ?> Sorry, the bomb has exploded, but everyone was saved! <?php } ?></p>
  
  <iframe width="560" height="315" src="//www.youtube.com/embed/IIO3KFnXxDo" frameborder="0" allowfullscreen></iframe>
  
</body>

</html>