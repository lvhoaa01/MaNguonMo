<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    $superheroes = array(
      "spider_main" => array("Peter_Parker","peterparker@gmail.com"),
      "super_main" => array("Clark_Kent","clarkkent@gmail.com"),
      "iron_man" => array("Steve_Rogers", "steverogers@gmail.com")
    );

    for($i = 0; $i < count($superheroes); ++$i){
      echo "<ul>";
      for($j=0; $j < count($superheroes[$i]); ++$j){
        
      }
    }
  ?>
</body>
</html>