<?php
declare(strict_types = 1);
require 'connect2.php';
use mySql_connect\Connection;

$pdo = Connection::create();

echo "Kết nối thành công đến cơ sở dữ liệu!";

echo "<h2>DANH SÁCH KHÁCH HÀNG</h2>";

$stmt = $pdo->query("SELECT * FROM khach_hang");
$rows = $stmt->fetchAll();

echo "<table border='1' cellpadding='8'>";
echo "<tr>
        <th>Mã KH</th>
        <th>Tên KH</th>
        <th>Phái</th>
        <th>Địa chỉ</th>
        <th>Điện thoại</th>
        <th>Email</th>
      </tr>";

foreach ($rows as $row) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['Ma_khach_hang']) . "</td>";
    echo "<td>" . htmlspecialchars($row['Ten_khach_hang']) . "</td>";
    echo "<td>" . ($row['Phai'] == 1 ? 'Nam' : 'Nữ') . "</td>";
    echo "<td>" . htmlspecialchars($row['Dia_chi']) . "</td>";
    echo "<td>" . htmlspecialchars('0' . $row['Dien_thoai']) . "</td>";
    echo "<td>" . htmlspecialchars($row['Email']) . "</td>";
    echo "</tr>";
}