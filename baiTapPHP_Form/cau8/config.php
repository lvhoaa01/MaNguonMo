<?php

$fullname = trim($_POST["fullname"] ?? "");
$address = trim($_POST["address"] ?? "");
$phone = trim($_POST["phone"] ?? "");
$country = $_POST["country"] ?? "NONE";

$gender = $_POST["gender"] ?? "Nam";
$study = $_POST["study"] ?? [];
$note = trim($_POST["note"] ?? "");

$loi = "";


if ($fullname == "") {

    $loi = "Fullname không được để trống.";

}

elseif ($address == "") {

    $loi = "Address không được để trống.";

}

elseif ($phone == "") {

    $loi = "Phone không được để trống.";

}
// Hàm preg_match hàm PHP kiểm tra 1 CHUỖI có khớp với 1 biểu thức regex(biểu thức chính quy đã config) không
//bao quanh / ... /
// ^ bắt đầu chuỗi
// $ kết thúc chuỗi
// Ví dụ với chuỗi regex quy định bắt đầu 0 và có 10 số
// /^0[0-9]{9}$/
elseif (!preg_match("/^[0-9]{9,11}$/", $phone)) {

    $loi = "Phone phải gồm từ 9 đến 11 chữ số.";

}

elseif (
    !in_array(
        $country,
        ["Việt Nam", "Mỹ", "Nhật Bản"]
    )
) {

    $loi = "Bạn phải chọn Country.";

}
if ($loi != "") {

    echo "
        <script>
            alert('$loi');
            window.history.back();
        </script>
    ";

    exit;
}

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">

    <title>Config</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="result">

    <p>
        Bạn đã nhập thành công, dưới đây là những thông tin bạn đã nhập:
    </p>

    <p>
        Họ tên:
        <?php echo $fullname; ?>
    </p>

    <p>
        Address:
        <?php echo $address; ?>
    </p>

    <p>
        Phone:
        <?php echo $phone; ?>
    </p>

    <p>
        Gender:
        <?php echo $gender; ?>
    </p>

    <p>
        Country:
        <?php echo $country; ?>
    </p>

    <p>
        Study:

        <?php
        echo implode(", ", $study); // chuyển mảng thành chuỗi, nối bằng dấu ,
        ?>
    </p>

    <p>
        Note:
        <?php echo nl2br($note); ?>
    </p>

    <button onclick="window.history.back()">
        Quay về
    </button>

</div>

</body>
</html>