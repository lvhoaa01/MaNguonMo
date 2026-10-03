<?php

$conn = mysqli_connect('localhost', 'root', '', 'quanly_ban_sua')
    or die('database ' . mysqli_connect_error());

mysqli_set_charset($conn, 'utf8');


// $sqlAdd = "insert into khach_hang 
// (Ma_khach_hang, Ten_khach_hang, Phai, Dia_chi, Dien_thoai, Email)
// values ('kh009', 'Lê Văn Hòa', 1, 'Bình Định', '901056704', 'lvanhoa325@gmail.com')";

// mysqli_query($conn, $sqlAdd);
echo "Thêm dữ liệu thành công <br>";
$sql = "SELECT * FROM khach_hang kh
  -- where right(kh.Dien_thoai, 1) in ('0', '2', '4', '6', '8')
";
$result = mysqli_query($conn, $sql)
    or die('Lỗi truy vấn: ' . mysqli_error($conn));

echo "Kết nối MySQL thành công";

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Danh sách khách hàng</title>
</head>

<body>

<h2>THÔNG TIN KHÁCH HÀNG</h2>

<table border="1" cellpadding="8">

    <tr>
        <th>Mã khách hàng</th>
        <th>Tên khách hàng</th>
        <th>Giới tính</th>
        <th>Địa chỉ</th>
        <th>Điện thoại</th>
        <th>Email</th>
    </tr>

    <?php
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <?php 
          if ($row['Dien_thoai'] % 2 != 0){
            continue;
          }
        ?>
        <tr>
            <td><?php echo $row['Ma_khach_hang']; ?></td>
            <td><?php echo $row['Ten_khach_hang']; ?></td>
            <td>
              <?php 
                echo $row['Phai'] == 1 ? 'Nam' : 'Nữ';
              ?>
            </td>
            <td><?php echo $row['Dia_chi']; ?></td>
            <td>
              <?php 
                echo '0' . $row['Dien_thoai']; 
              ?>
            </td>
            <td><?php echo $row['Email']; ?></td>
        </tr>

    <?php
    }
    ?>

</table>

</body>
</html>