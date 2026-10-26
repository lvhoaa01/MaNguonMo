<?php

require_once __DIR__ . '/../config.php';

/** @var mysqli $conn */

$sql = "select s.Ten_sua, s.Trong_luong, s.Don_gia, hd.Ngay_HD
from ct_hoadon ct
join sua s on ct.Ma_sua = s.Ma_sua
join hoa_don hd on hd.So_hoa_don = ct.So_hoa_don
where Month(hd.Ngay_HD) = 8 and year(hd.Ngay_HD) = 2007
";

$result = mysqli_query($conn, $sql)
    or die('Lỗi truy vấn: ' . mysqli_error($conn));

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Bài 1.4 - Câu 7</title>
</head>

<body>

<h2>Danh sách hóa đơn</h2>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Tên sữa</th>
        <th>Trọng lượng</th>
        <th>Đơn giá</th>
        <th>Ngày hóa đơn</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['Ten_sua']; ?></td>
            <td><?php echo $row['Trong_luong'] . "gr"; ?></td>
            <td><?php echo $row['Don_gia'] . "VND"; ?></td>
            <td><?php echo $row['Ngay_HD']; ?></td>
        </tr>
    <?php } ?>

</table>

</body>
</html>