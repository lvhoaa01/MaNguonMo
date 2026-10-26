
<?php

function inChuoi($chuoi, $kt) {
    return str_replace($kt, "\n" . $kt, $chuoi);
}

$chuoi = "";
$kt = "";
$ketqua = "";
$thongbao = "";

if (isset($_POST['run'])) {
    $chuoi = $_POST['chuoi'] ?? "";
    $kt = $_POST['kt'] ?? "";

    if ($kt === "") {
        $thongbao = "Vui lòng nhập ký tự!";
    } else {
        $ketqua = inChuoi($chuoi, $kt);
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Xử lý chuỗi</title>
</head>
<body>

<form action="" method="POST">
    Nhập chuỗi:
    <input type="text" name="chuoi"
           value="<?= htmlspecialchars($chuoi) ?>">

    <br><br>

    Ký tự:
    <input type="text" name="kt" maxlength="2"
           value="<?= htmlspecialchars($kt) ?>">

    <br><br>

    <button type="submit" name="run">Run</button>

    <br><br>

    Kết quả:
    <textarea rows="6" cols="40" readonly><?= htmlspecialchars($ketqua) ?></textarea>

    <p><?= htmlspecialchars($thongbao) ?></p>
</form>

</body>
</html>
