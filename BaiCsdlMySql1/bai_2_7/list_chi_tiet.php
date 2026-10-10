<?php

require_once __DIR__ . '/../config.php';

/** @var mysqli $conn */

if (!isset($_GET['ma_sua']) || $_GET['ma_sua'] == '') {
    die('Không tìm thấy mã sữa.');
}

$maSua = mysqli_real_escape_string($conn, $_GET['ma_sua']);

$sql = "SELECT
            s.Ma_sua,
            s.Ten_sua,
            s.Trong_luong,
            s.Don_gia,
            s.TP_Dinh_Duong,
            s.Loi_ich,
            s.Hinh,
            hs.Ten_hang_sua
        FROM sua s
        INNER JOIN hang_sua hs
            ON s.Ma_hang_sua = hs.Ma_hang_sua
        WHERE s.Ma_sua = '$maSua'";

$result = mysqli_query($conn, $sql)
    or die('Lỗi truy vấn: ' . mysqli_error($conn));

if (mysqli_num_rows($result) == 0) {
    die('Không tìm thấy sản phẩm sữa.');
}

$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm sữa</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="detail-wrapper">

    <h2 class="detail-title">
        <?php echo $row['Ten_sua']; ?>
        -
        <?php echo $row['Ten_hang_sua']; ?>
    </h2>

    <table class="detail-table">
        <tr>
            <td class="detail-image" rowspan="2">
                <img
                    src="images/<?php echo $row['Hinh']; ?>"
                    alt="<?php echo $row['Ten_sua']; ?>">
            </td>

            <td class="detail-content">
                <strong>Thành phần dinh dưỡng:</strong><br>
                <?php echo $row['TP_Dinh_Duong']; ?>

                <br><br>

                <strong>Lợi ích:</strong><br>
                <?php echo $row['Loi_ich']; ?>
            </td>
        </tr>

        <tr>
            <td class="detail-price">
                <strong>Trọng lượng:</strong>
                <?php echo $row['Trong_luong']; ?> gr
                -
                <strong>Đơn giá:</strong>
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
    </table>

    <div class="back-link">
        <a href="list_dang_cot_co_link.php">Quay về</a>
    </div>

</div>

</body>

</html>
