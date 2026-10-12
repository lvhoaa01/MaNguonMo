<?php

require_once __DIR__ . "/../config.php";

$sql = "select Ten_khach_hang, Phai, Dia_chi, Dien_thoai from khach_hang where Phai = 0 and Ten_khach_hang like 'N%'";
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
      <th>Tên khách hàng</th>
      <th>Phái</th>
      <th>Địa chỉ</th>
      <th>Điện thoại</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) {
    ?>
      <tr>
        <td><?php echo $row['Ten_khach_hang']; ?></td>
        <td><?php if($row['Phai'] == '0') echo "Nam"; ?></td>
        <td><?php echo $row['Dia_chi']; ?></td>
        <td><?php echo $row['Dien_thoai']; ?></td>
      </tr>
    <?php
    }
    ?>

  </table>
</body>

</html>