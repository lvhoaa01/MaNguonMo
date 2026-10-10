<?php
require_once __DIR__ . '/../config.php';

$sql = "SELECT Ma_hang_sua, Ten_hang_sua, Dia_chi, Dien_thoai, Email
        FROM hang_sua";

$result = mysqli_query($conn, $sql)
    or die('Lỗi truy vấn: ' . mysqli_error($conn));
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin hãng sữa</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="wrapper">
    <h2>THÔNG TIN HÃNG SỮA</h2>

    <table>
        <thead>
            <tr>
                <th>Mã HS</th>
                <th>Tên hãng sữa</th>
                <th>Địa chỉ</th>
                <th>Điện thoại</th>
                <th>Email</th>
            </tr>
        </thead>

        <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td><?php echo $row['Ma_hang_sua']; ?></td>
                <td><?php echo $row['Ten_hang_sua']; ?></td>
                <td><?php echo $row['Dia_chi']; ?></td>
                <td><?php echo $row['Dien_thoai']; ?></td>
                <td><?php echo $row['Email']; ?></td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>
