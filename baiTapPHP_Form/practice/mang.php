<?php 

function taoMang($n){
  $mang = [];
  for($i = 0; $i  < $n; ++$i){
    $mang = rand(0, 20);
  }

  return $mang;
}

function xuatMang($mang){
  return implode(", ", $mang);
}

function checkInt($n){
  $nn = intval($n);
  if ($nn != $n || $n < 0 || !is_numeric($n)) return false;
  return true;
}

function countChan($mang){
  return count(
    array_filter($mang, fn($x) => $x % 2 == 0)
  );
}

function count100($mang){
  return count(
    array_filter($mang, fn($x) => $x < 100)
  );
}

function sumNeg($mang){
  return array_sum(
    array_filter($mang, fn($x) => $x < 0)
  );
}

function post0($mang){
  return array_keys(
    $mang, fn($x) => $x == 0
  );
}

function sapXepTang($mang){
  $n = count($mang);
  for($i = 0; $i < $n; ++$i){
    for($j = $i+1; $j < $n; ++$j){
      if($mang[$i] > $mang[$j]){
        $tmp = $mang[$i];
        $mang[$i] = $mang[$j];
        $mang[$j] = $tmp;
      }
    }
  }
  // return sort($mang);
  return $mang;
}


$mang = [];
$n = "";
$mang_tang_dan = [];
$so_chan = 0;
$so_nho_hon_100 = 0;
$tong_so_am = 0;

$vi_tri_so_0 = [];

$thong_bao = "";



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Mảng</title>
</head>
<body>
  
  <form action="" method="POST">
    <table border="1">
      <tr>
        <td colspan="2">
          <h2 style="color: red;">Mảng bài 1</h2>
        </td>
      </tr>
      <tr>
        <td><label for="">Nhập n:</label></td>
        <td>
          <input type="number" name="n" value="<?php echo $n ?>">
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <input type="submit" value="Thực hiện" name="tinh">
        </td>
      </tr>
    </table>

  </form>

  <?php 
    if ($thong_bao !=  ""){
      echo "<p class='error'> $thong_bao </p>";
    }
  ?>

  <?php if(count($mang) > 0): ?>
  <table class="result">

    <tr>

        <td>Mảng phát sinh:</td>

        <td>
            <?php echo implode(", ", $mang); ?>
        </td>

    </tr>


    <tr>

        <td>Số phần tử chẵn:</td>

        <td>
            <?php echo $so_chan; ?>
        </td>

    </tr>


    <tr>

        <td>Số phần tử nhỏ hơn 100:</td>

        <td>
            <?php echo $so_nho_hon_100; ?>
        </td>

    </tr>


    <tr>

        <td>Tổng các phần tử âm:</td>

        <td>
            <?php echo $tong_so_am; ?>
        </td>

    </tr>


    <tr>

        <td>Vị trí phần tử bằng 0:</td>

        <td>

            <?php

            if (count($vi_tri_so_0) > 0) {

                echo implode(", ", $vi_tri_so_0);

            } else {

                echo "Không có phần tử bằng 0";
            }

            ?>

        </td>

    </tr>


    <tr>

        <td>Mảng tăng dần:</td>

        <td>
            <?php echo implode(", ", $mang_tang_dan); ?>
        </td>

    </tr>

</table>
  <?php endif; ?>
</body>
</html>