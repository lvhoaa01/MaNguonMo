<?php

require_once __DIR__ . "/../config.php";

$sql = "select Ma_sua, Ten_sua, Ma_loai_sua, Trong_luong, Don_gia from sua where Trong_luong not in (400, 800, 900)";
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
      <th>Mã sữa</th>
      <th>Tên sữa</th>
      <th>Mã loại sữa</th>
      <th>Trọng lượng</th>
      <th>Đơn giá</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) {
    ?>
      <tr>
        <td><?php echo $row['Ma_sua']; ?></td>
        <td><?php echo $row['Ten_sua']; ?></td>
        <td><?php echo $row['Ma_loai_sua']; ?></td>
        <td><?php echo $row['Trong_luong']; ?></td>
        <td><?php echo $row['Don_gia']; ?></td>
      </tr>
    <?php
    }
    ?>

  </table>
</body>

</html>