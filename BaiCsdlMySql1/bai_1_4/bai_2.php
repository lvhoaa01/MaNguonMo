<?php

require_once __DIR__ . "/../config.php";

$sql = "select So_hoa_don, Ngay_HD, Ma_khach_hang, Tri_gia from hoa_don where month(Ngay_HD) = 7 and year(Ngay_HD) = 2007";
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
  <table border="1">
    <tr>
      <th>Số hóa đơn</th>
      <th>Ngày hóa đơn</th>
      <th>Mã khách hàng</th>
      <th>Trị giá</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) {
    ?>
      <tr>
        <td><?php echo $row['So_Hoa_Don']; ?></td>
        <td><?php echo $row['Ngay_HD']; ?></td>
        <td><?php echo $row['Ma_khach_hang']; ?></td>
        <td><?php echo $row['Tri_gia']; ?></td>
      </tr>
    <?php
    }
    ?>
  </table>
</body>

</html>