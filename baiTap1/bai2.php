<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BCC</title>
</head>
<body>
  <?php 


    function  bangCuuChuong(){
      echo "<table border = '1'>";
      for($i = 1; $i <= 10; $i++){
        echo "<tr>";
        for($j = 1; $j <= 10; $j++){
          echo "<td>" . $i . " x " . $j . " = " . ($i * $j) . "</td>";
        }
        echo "</tr>";
      }
      echo "</table>";
    }

    bangCuuChuong();
  ?>
</body>
</html>