<?php

require_once __DIR__ . "/../config.php";

$sql = "select Ten_sua, TP_Dinh_Duong from sua where TP_Dinh_Duong like '%canxi%' and TP_Dinh_Duong like '%vitamin%'";
$result = mysqli_query($conn, $sql) or die('Lỗi truy vấn: ' . mysqli_error($conn));

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
  <table border='1'>
    <tr>
      <th>Tên sữa</th>
      <th>Thành phần dinh dưỡng</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) {
    ?>
      <tr>
        <td><?php echo $row['Ten_sua']; ?></td>
        <td><?php echo $row['TP_Dinh_Duong']; ?></td>
      </tr>
    <?php
    }
    ?>

  </table>
</body>

</html>