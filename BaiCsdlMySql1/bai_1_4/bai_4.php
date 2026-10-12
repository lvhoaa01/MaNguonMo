<?php

require_once __DIR__ . '/../config.php';

/** @var mysqli $conn */

$sql = "SELECT Ten_sua, Trong_luong, Don_gia
        FROM sua
        WHERE LENGTH(Ten_sua) <= 10";

$result = mysqli_query($conn, $sql)
    or die('Lỗi truy vấn: ' . mysqli_error($conn));

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Bài 1.4 - Câu 4</title>
</head>

<body>

<h2>Danh sách sữa có tên không quá 10 ký tự</h2>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Tên sữa</th>
        <th>Trọng lượng</th>
        <th>Đơn giá</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['Ten_sua']; ?></td>
            <td><?php echo $row['Trong_luong']; ?></td>
            <td><?php echo $row['Don_gia']; ?></td>
        </tr>
    <?php } ?>

</table>

</body>
</html>