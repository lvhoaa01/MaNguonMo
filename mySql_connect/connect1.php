<?php 
  $conn = mysqli_connect('localhost', 'root', '', 'quanly_ban_sua') or die('database ' . mysqli_connect_error());
  mysqli_set_charset($conn, 'utff8');

  $sql = "
    insert into khach_hang (Ma_khach_hang, Ten_khach_hang, Phai, Dia_chi, Dien_thoai, Email) values ('kh010', 'Lê Văn Đức', 1, 'Gia Lai', '903587654', 'lvanduc321@gmail.com');
  ";
  mysqli_query($conn, $sql);

  $sql1 = "select * from khach_hang";
  $result = mysqli_query($conn, $sql1) or die('Lỗi truy vấn ' . mysqli_error($conn));
   echo "Kết nối mySql thành công!";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lý khách hàng</title>
</head>
<body>
  <h2></h2>
</body>
</html>