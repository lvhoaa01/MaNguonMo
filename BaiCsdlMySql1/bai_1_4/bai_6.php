<?php

require_once __DIR__ . '/../config.php';

/** @var mysqli $conn */

$sql = "SELECT
            So_Hoa_Don,
            DATE_FORMAT(Ngay_HD, '%W - %d - %m - %Y') AS Ngay_dinh_dang,
            Ma_khach_hang,
            Tri_gia
        FROM hoa_don";

$result = mysqli_query($conn, $sql)
    or die('Lỗi truy vấn: ' . mysqli_error($conn));

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Bài 1.4 - Câu 6</title>
</head>

<body>

<h2>Danh sách hóa đơn</h2>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Số hóa đơn</th>
        <th>Ngày hóa đơn</th>
        <th>Mã khách hàng</th>
        <th>Trị giá</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['So_Hoa_Don']; ?></td>
            <td><?php echo $row['Ngay_dinh_dang']; ?></td>
            <td><?php echo $row['Ma_khach_hang']; ?></td>
            <td><?php echo $row['Tri_gia']; ?></td>
        </tr>
    <?php } ?>

</table>

</body>
</html>