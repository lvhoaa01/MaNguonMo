<?php

require_once __DIR__ . "/../config.php";

$sql = "select Ten_hang_sua, Dia_chi, Dien_thoai from hang_sua";
$result = mysqli_query($conn, $sql) or die('Lỗi truy vấn: ' . mysqli_error($conn));
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cau1</title>
</head>

<body>
  <table border='1'>
    <tr>
      <th>Tên hãng sữa</th>
      <th>Địa chỉ</th>
      <th>Điện thoại</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) {
    ?>
      <tr>
        <td><?php echo $row['Ten_hang_sua'] ?></td>
        <td><?php echo $row['Dia_chi'] ?></td>
        <td><?php echo $row['Dien_thoai'] ?></td>
      </tr>
    <?php
    }
    ?>

  </table>
</body>

</html>