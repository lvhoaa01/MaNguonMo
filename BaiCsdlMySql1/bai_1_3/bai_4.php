<?php

require_once __DIR__ . "/../config.php";

$sql = "select Ten_sua, Trong_luong, Don_gia from sua order by Ten_sua asc, Don_gia desc";
$result = mysqli_query($conn, $sql) or die('Lỗi truy vấn: ' . mysqli_error($conn));
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cau4</title>
</head>

<body>
  <table border='1'>
    <tr>
      <th>Tên sữa</th>
      <th>Trọng lượng</th>
      <th>Đơn giá</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) {
    ?>
      <tr>
        <td><?php echo $row['Ten_sua'] ?></td>
        <td><?php echo $row['Trong_luong'] ?></td>
        <td><?php echo $row['Don_gia'] ?></td>
      </tr>
    <?php
    }
    ?>

  </table>
</body>

</html>