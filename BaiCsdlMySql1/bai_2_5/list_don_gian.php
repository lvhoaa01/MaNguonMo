<?php

require_once __DIR__ . '/../config.php';

/** @var mysqli $conn */

$sql = "SELECT
            s.Ma_sua,
            s.Ten_sua,
            s.Trong_luong,
            s.Don_gia,
            s.Hinh,
            hs.Ten_hang_sua,
            ls.Ten_loai
        FROM sua s
        INNER JOIN hang_sua hs
            ON s.Ma_hang_sua = hs.Ma_hang_sua
        INNER JOIN loai_sua ls
            ON s.Ma_loai_sua = ls.Ma_loai_sua
        ORDER BY s.Ten_sua";

$result = mysqli_query($conn, $sql)
    or die('Lỗi truy vấn: ' . mysqli_error($conn));

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List đơn giản</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="wrapper">

    <h2>THÔNG TIN CÁC SẢN PHẨM</h2>

    <table class="product-list">
        <tbody>

        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td class="image-cell">
                    <img
                        src="images/<?php echo $row['Hinh']; ?>"
                        alt="<?php echo $row['Ten_sua']; ?>">
                </td>

                <td class="info-cell">
                    <div class="product-name">
                        <?php echo $row['Ten_sua']; ?>
                    </div>

                    <div>
                        Nhà sản xuất:
                        <span><?php echo $row['Ten_hang_sua']; ?></span>
                    </div>

                    <div>
                        Loại:
                        <span><?php echo $row['Ten_loai']; ?></span>
                    </div>

                    <div>
                        <?php echo $row['Trong_luong']; ?> gr
                        -
                        <?php
                        echo number_format(
                            $row['Don_gia'],
                            0,
                            ',',
                            '.'
                        ) . ' VNĐ';
                        ?>
                    </div>
                </td>
            </tr>
        <?php
        }
        ?>

        </tbody>
    </table>

</div>

</body>

</html>
