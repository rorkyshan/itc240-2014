<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/albums.css">
</head>
<body>
  
  <h2>Album Collection:</h2>

<article>
  
    <?php 
      foreach($albums as $album){
      	include("albums.php");
      }
    ?> 
   
</article>
  
</body>
</html>
