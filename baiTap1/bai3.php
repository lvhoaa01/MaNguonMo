<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php 
    function isSoNguyenTo($n){
      if($n < 2){
        return false;
      }
      else {
        for($i = 2; $i <= sqrt($n); $i++){
          if($n % $i == 0){
            return false;
          }
        }
      }
      return true;
    }

    function tongCacSoNguyenTo($n){
      $sum = 0;
      for($i = 2; $i < $n; $i++){
        if(isSoNguyenTo($i)){
          $sum += $i;
        }
      }
      return $sum;
    }



    function isSoChinhPhuong($n){
      $a = sqrt($n);
      if($a === floor($a)){
        return true;
      }
      else return false;
    }

    function  isDuong($a){
      if($a > 0){
        echo "Số $a là số dương <br>";

        echo "Các ước số của $a là: ";
        for($i = 1; $i <= $a; $i++){
          if($a % $i == 0){
            echo $i . " ";
          }
        }

        if(isSoNguyenTo($a)){
          echo "<br>Số $a là số nguyên tố";
          echo "<br> Tổng các số nguyên tố nhỏ hơn $a là: " . tongCacSoNguyenTo($a);
        }
        else {
          echo "<br>Số $a không phải là số nguyên tố";
        }

        if(isSoChinhPhuong($a)){
          echo "<br> Số $a là số chính phương";
        }else echo "<br> Số $a không phải là số chính phương";

      }else {
        echo "Số $a là số âm";
      }
    }


    $n = rand(-100, 100);
    isDuong($n);

  ?>
</body>
</html>