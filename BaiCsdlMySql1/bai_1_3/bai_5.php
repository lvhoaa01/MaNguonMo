<?php

require_once __DIR__ . '/../config.php';

/** @var mysqli $conn */

$sql = "SELECT Ten_sua, Trong_luong, Don_gia, TP_Dinh_Duong
        FROM sua
        WHERE Ten_sua LIKE 'S%'";

$result = mysqli_query($conn, $sql)
    or die('Lỗi truy vấn: ' . mysqli_error($conn));

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Câu 5</title>
</head>

<body>

<table border="1" >
    <tr>
        <th>Tên sữa</th>
        <th>Trọng lượng</th>
        <th>Đơn giá</th>
        <th>Thành phần dinh dưỡng</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['Ten_sua']; ?></td>
            <td><?php echo $row['Trong_luong']; ?></td>
            <td><?php echo $row['Don_gia']; ?></td>
            <td><?php echo $row['TP_Dinh_Duong']; ?></td>
        </tr>
    <?php } ?>

</table>

</body>

</html>