<?php

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/class_pager.php';

/** @var mysqli $conn */

$sqlDem = "SELECT COUNT(*) AS tong FROM sua";

$ketQuaDem = mysqli_query($conn, $sqlDem)
    or die('Lỗi truy vấn: ' . mysqli_error($conn));

$dongDem = mysqli_fetch_assoc($ketQuaDem);
$tongDong = (int) $dongDem['tong'];

$pager = new Pager($tongDong, 4);

$offset = $pager->getOffset();
$limit = $pager->getLimit();

$sql = "SELECT
            s.Ma_sua,
            s.Ten_sua,
            hs.Ten_hang_sua,
            ls.Ten_loai,
            s.Trong_luong,
            s.Don_gia
        FROM sua s
        INNER JOIN hang_sua hs
            ON s.Ma_hang_sua = hs.Ma_hang_sua
        INNER JOIN loai_sua ls
            ON s.Ma_loai_sua = ls.Ma_loai_sua
        ORDER BY s.Ten_sua
        LIMIT $offset, $limit";

$result = mysqli_query($conn, $sql)
    or die('Lỗi truy vấn: ' . mysqli_error($conn));

$stt = $offset + 1;

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lưới phân trang</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="wrapper">

    <h2>THÔNG TIN SỮA</h2>

    <table>
        <thead>
        <tr>
            <th>STT</th>
            <th>Tên sữa</th>
            <th>Hãng sữa</th>
            <th>Loại sữa</th>
            <th>Trọng lượng</th>
            <th>Đơn giá</th>
        </tr>
        </thead>

        <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td class="center"><?php echo $stt++; ?></td>
                <td><?php echo $row['Ten_sua']; ?></td>
                <td><?php echo $row['Ten_hang_sua']; ?></td>
                <td><?php echo $row['Ten_loai']; ?></td>
                <td class="center">
                    <?php echo $row['Trong_luong']; ?> gr
                </td>
                <td class="price">
                    <?php
                    echo number_format(
                        $row['Don_gia'],
                        0,
                        ',',
                        '.'
                    ) . ' VNĐ';
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>

    <?php
    $pager->hienThiDanhSachTrang();
    ?>

</div>

</body>

</html>
