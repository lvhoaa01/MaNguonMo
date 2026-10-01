<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Demo Form PHP</title>
    <style>
        body { font-family: Arial; max-width: 500px; margin: 50px auto; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="password"], input[type="email"] {
            width: 100%; padding: 8px; box-sizing: border-box;
        }
        button { padding: 10px 20px; background: #007bff; color: #fff; border: none; cursor: pointer; }
        button:hover { background: #0056b3; }
        .error { color: red; font-size: 14px; }
        .success-box { background: #d4edda; padding: 15px; border-radius: 5px; }
    </style>
</head>
<body>

<h2>Form Đăng Nhập Demo</h2>

<!-- 
  QUAN TRỌNG:
  - method="POST"  → dữ liệu gửi ngầm, không hiện trên URL
  - action="process.php" → nơi xử lý dữ liệu
-->
<form action="process.php" method="POST">
    
    <div class="form-group">
        <label for="username">Tên đăng nhập:</label>
        <input type="text" id="username" name="username" required>
    </div>

    <div class="form-group">
        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" required>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>

    <div class="form-group">
        <label for="age">Tuổi:</label>
        <input type="text" id="age" name="age">
    </div>

    <button type="submit" name="submit">Gửi dữ liệu</button>
</form>

</body>
</html>