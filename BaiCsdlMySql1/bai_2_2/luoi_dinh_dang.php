<?php

require_once __DIR__ . '/../config.php';

/** @var mysqli $conn */

$sql = "SELECT Ma_khach_hang, Ten_khach_hang, Phai, Dia_chi, Dien_thoai
        FROM khach_hang";

$result = mysqli_query($conn, $sql)
    or die('Lỗi truy vấn: ' . mysqli_error($conn));

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lưới định dạng</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="wrapper">
        <h2>THÔNG TIN KHÁCH HÀNG</h2>

        <table>
            <thead>
                <tr>
                    <th>Mã KH</th>
                    <th>Tên khách hàng</th>
                    <th>Giới tính</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                </tr>
            </thead>

            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['Ma_khach_hang']; ?></td>
                        <td><?php echo $row['Ten_khach_hang']; ?></td>
                        <td class="gioi-tinh"><?php echo $row['Phai']; ?></td>
                        <td><?php echo $row['Dia_chi']; ?></td>
                        <td><?php echo $row['Dien_thoai']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>
