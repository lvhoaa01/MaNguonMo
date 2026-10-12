<?php

require_once __DIR__ . "/../config.php";

$sql = "select round(avg(Tri_gia), -3) as Tri_gia_trung_binh from hoa_don";
$result = mysqli_query($conn, $sql) or die('Lỗi truy vấn: ' . mysqli_error($conn));

$row = mysqli_fetch_assoc($result);
// s% bắt đầu || %s kết thúc || %s% giữa bất kì
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cau9</title>
</head>

<body>
  <?php 
      echo "Trị giá trung bình : " . $row['Tri_gia_trung_binh'];
  ?>
</body>

</html>