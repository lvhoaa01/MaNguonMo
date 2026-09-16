<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php 


    function  randomChan(){
      $number = rand(1, 100);
      for($i = 1; $i <= $number; $i++){
        if ($i % 2 == 0){
          echo $i . "<br>";
        }
      }
    }

    randomChan();
    
  ?>
</body>
</html>