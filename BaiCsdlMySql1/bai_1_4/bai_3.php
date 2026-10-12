<?php

require_once __DIR__ . '/../config.php';

/** @var mysqli $conn */

$sql = "SELECT
            So_Hoa_Don,
            Ngay_HD,
            Ma_khach_hang,
            Tri_gia,
            DATEDIFF(CURDATE(), Ngay_HD) AS So_ngay
        FROM hoa_don
        ORDER BY So_ngay DESC";

$result = mysqli_query($conn, $sql)
    or die('Lỗi truy vấn: ' . mysqli_error($conn));

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Bài 1.4 - Câu 3</title>
</head>

<body>

<h2>Danh sách hóa đơn</h2>

<table border="1">
    <tr>
        <th>Số hóa đơn</th>
        <th>Ngày hóa đơn</th>
        <th>Mã khách hàng</th>
        <th>Trị giá</th>
        <th>Số ngày</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['So_Hoa_Don']; ?></td>
            <td><?php echo $row['Ngay_HD']; ?></td>
            <td><?php echo $row['Ma_khach_hang']; ?></td>
            <td><?php echo $row['Tri_gia']; ?></td>
            <td><?php echo $row['So_ngay']; ?></td>
        </tr>
    <?php } ?>

</table>

</body>
</html>