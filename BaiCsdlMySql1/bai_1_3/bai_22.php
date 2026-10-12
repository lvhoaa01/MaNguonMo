<?php

require_once __DIR__ . "/../config.php";

$sql = "select Ma_hang_sua, Ten_sua, Trong_luong, Loi_ich from sua where Ma_hang_sua = 'AB' order by Trong_luong asc";
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
      <th>Mã hãng sữa</th>
      <th>Tên sữa</th>
      <th>Trọng lượng</th>
      <th>Lợi ích</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) {
    ?>
      <tr>
        <td><?php echo $row['Ma_hang_sua']; ?></td>
        <td><?php echo $row['Ten_sua']; ?></td>
        <td><?php echo $row['Trong_luong']; ?></td>
        <td><?php echo $row['Loi_ich']; ?></td>
      </tr>
    <?php
    }
    ?>

  </table>
</body>

</html>