
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Import thư viện
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/env.php';

// Tạo đối tượng PHPMailer
$mail = new PHPMailer(true);

try {
    // Cấu hình SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;

    // Tài khoản Gmail
    $mail->Username = $sender_email;
    $mail->Password = $app_password;

    // Bảo mật và cổng
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->CharSet = 'UTF-8';

    // Người gửi
    $mail->setFrom($sender_email, 'PHP Demo');

    // Người nhận - THAY EMAIL NÀY
    $mail->addAddress('hoa.lv.65cntt@ntu.edu.vn');

    // Nội dung email
    $mail->isHTML(true);
    $mail->Subject = 'Kiểm tra gửi email bằng PHP';

    $mail->Body = '
        <h2>Xin chào!</h2>
        <p>Đây là email gửi từ PHP bằng PHPMailer.</p>
        <p>Gửi thành công!</p>
    ';

    $mail->AltBody = 'Day la email test PHPMailer';

    // Gửi email
    $mail->send();

    echo "Gửi email thành công!";

} catch (Exception $e) {
    echo "Gửi email thất bại: " .
        htmlspecialchars($mail->ErrorInfo, ENT_QUOTES, 'UTF-8');
}
