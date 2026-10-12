<?php

require_once __DIR__ . '/../config.php';

/** @var mysqli $conn */

$sql = "SELECT
            UPPER(Ten_hang_sua) AS Ten_hang_sua,
            Dia_chi,
            Dien_thoai
        FROM hang_sua";

$result = mysqli_query($conn, $sql)
    or die('Lỗi truy vấn: ' . mysqli_error($conn));

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Bài 1.4 - Câu 5</title>
</head>

<body>

<h2>Danh sách hãng sữa</h2>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Tên hãng sữa</th>
        <th>Địa chỉ</th>
        <th>Điện thoại</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['Ten_hang_sua']; ?></td>
            <td><?php echo $row['Dia_chi']; ?></td>
            <td><?php echo $row['Dien_thoai']; ?></td>
        </tr>
    <?php } ?>

</table>

</body>
</html>