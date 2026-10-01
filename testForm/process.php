<?php
// Bật hiển thị lỗi để dễ debug khi quay video
ini_set('display_errors', 1);
error_reporting(E_ALL);


# _SERVER VÀ _POST  là 2 biến superglobal có sẵn của PHP




// ============================================
// BƯỚC 1: KIỂM TRA FORM CÓ ĐƯỢC SUBMIT KHÔNG
// ============================================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // ============================================
    // BƯỚC 2: LẤY DỮ LIỆU TỪ $_POST
    // ============================================
    
    // Cách 1: Lấy trực tiếp (không khuyến khích nếu chưa validate)
    // $username = $_POST['username'];
    
    // Cách 2: Dùng isset() để tránh lỗi undefined index
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $email    = isset($_POST['email'])    ? $_POST['email']    : '';
    $age      = isset($_POST['age'])      ? $_POST['age']      : '';
    
    // Cách 3: Dùng null coalescing (PHP 7+)
    // $username = $_POST['username'] ?? '';

    // ============================================
    // BƯỚC 3: LÀM SẠCH DỮ LIỆU (SANITIZE)
    // ============================================
    $username = trim($username);       // Xóa khoảng trắng đầu/cuối
    $email    = trim($email);
    $age      = (int)$age;             // Ép kiểu số nguyên

    // ============================================
    // BƯỚC 4: VALIDATE DỮ LIỆU
    // ============================================
    $errors = [];

    if (empty($username)) {
        $errors[] = "Tên đăng nhập không được để trống!";
    }
    if (strlen($password) < 6) {
        $errors[] = "Mật khẩu phải từ 6 ký tự trở lên!";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email không hợp lệ!";
    }

    // ============================================
    // BƯỚC 5: HIỂN THỊ KẾT QUẢ
    // ============================================
    ?>
    <!DOCTYPE html>
    <html lang="vi">
    <head>
        <meta charset="UTF-8">
        <title>Kết quả Submit</title>
        <style>
            body { font-family: Arial; max-width: 600px; margin: 50px auto; }
            .box { background: #f8f9fa; padding: 20px; border-radius: 8px; border-left: 4px solid #007bff; }
            .error { background: #f8d7da; border-left-color: #dc3545; color: #721c24; }
            table { border-collapse: collapse; width: 100%; margin-top: 10px; }
            td { padding: 8px; border-bottom: 1px solid #ddd; }
            td:first-child { font-weight: bold; width: 150px; }
            a { display: inline-block; margin-top: 20px; color: #007bff; }
        </style>
    </head>
    <body>

    <?php if (!empty($errors)): ?>
        <div class="box error">
            <h3>❌ Có lỗi xảy ra:</h3>
            <ul>
                <?php foreach ($errors as $err): ?>
                    <li><?= htmlspecialchars($err) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php else: ?>
        <div class="box">
            <h3>✅ Nhận dữ liệu thành công!</h3>
            <table>
                <tr>
                    <td>Tên đăng nhập:</td>
                    <td><?= htmlspecialchars($username) ?></td>
                </tr>
                <tr>
                    <td>Mật khẩu:</td>
                    <!-- KHÔNG BAO GIỜ hiển thị password thật trong production! -->
                    <td><?= str_repeat('•', strlen($password)) ?> 
                        (<?= strlen($password) ?> ký tự)
                    </td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?= htmlspecialchars($email) ?></td>
                </tr>
                <tr>
                    <td>Tuổi:</td>
                    <td><?= $age ?> tuổi</td>
                </tr>
            </table>
        </div>
    <?php endif; ?>

    <a href="index.php">← Quay lại form</a>

    </body>
    </html>
    <?php

} else {
    // Nếu ai đó truy cập process.php trực tiếp (không qua form)
    header('Location: index.php');
    exit;
}
?>