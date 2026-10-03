<?php
function taoMang($n)
{
    $mang = [];
    // $mang = fn($x) => array_map(
    //   fn($x) => rand(0, 20),
    //   range(1, $n)
    // );
    for ($i = 0; $i < $n; $i++) {
        $mang[] = rand(0, 20);
    }

    return $mang;
}

function xuatMang($mang)
{
    return implode(" ", $mang);
}

function tinhTong($mang)
{
    $tong = 0;

    foreach ($mang as $gia_tri) {
        $tong += $gia_tri;
    }

    // $tong = array_sum($mang);

    return $tong;
}

function timMax($mang)
{
    $max = $mang[0];
    // $max = max($mang);
    foreach ($mang as $gia_tri) {

        if ($gia_tri > $max) {
            $max = $gia_tri;
        }
    }

    return $max;
}

function timMin($mang)
{
    $min = $mang[0];
    $min = min($mang);
    foreach ($mang as $gia_tri) {

        if ($gia_tri < $min) {
            $min = $gia_tri;
        }
    }

    return $min;
}

$n = "";

$mang_hien_thi = "";
$max = "";
$min = "";
$tong = "";

$thong_bao = "";

if (isset($_POST["phat_sinh"])) {

    $n = $_POST["n"] ?? "";

    if (
        !is_numeric($n) ||
        intval($n) != $n ||
        $n <= 0
    ) {

        $thong_bao = "Số phần tử phải là số nguyên dương.";

    } else {

        $n = intval($n);

        $mang = taoMang($n);
        $mang_hien_thi = xuatMang($mang);
        $max = timMax($mang);
        $min = timMin($mang);
        $tong = tinhTong($mang);
    }
}

?>

<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="UTF-8">

    <title>Phát sinh mảng và tính toán</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<form method="POST" action="">

    <table>

        <tr>
            <th colspan="2" class="table_tittle">
                PHÁT SINH MẢNG VÀ TÍNH TOÁN
            </th>
        </tr>


        <tr>

            <td>Nhập số phần tử:</td>

            <td>

                <input
                    type="text"
                    name="n"
                    value="<?php echo $n; ?>">

            </td>

        </tr>


        <tr>

            <td></td>

            <td>

                <input
                    type="submit"
                    name="phat_sinh"
                    value="Phát sinh">

            </td>

        </tr>


        <tr>

            <td>Mảng:</td>

            <td>

                <input
                    type="text"
                    style="background-color: pink;"
                    value="<?php echo $mang_hien_thi; ?>"
                    readonly>

            </td>

        </tr>


        <tr>

            <td>GTLN (MAX) trong mảng:</td>

            <td>

                <input
                    type="text"
                    style="background-color: pink;"
                    value="<?php echo $max; ?>"
                    readonly>

            </td>

        </tr>


        <tr>

            <td>TTNN (MIN) trong mảng:</td>

            <td>

                <input
                    type="text"
                    style="background-color: pink;"
                    value="<?php echo $min; ?>"
                    readonly>

            </td>

        </tr>


        <tr>

            <td>Tổng mảng:</td>

            <td>

                <input
                    type="text"
                    style="background-color: pink;"
                    value="<?php echo $tong; ?>"
                    readonly>

            </td>

        </tr>
        <tr>
            <td colspan="2" class="center">
                <span style="color: red;">Ghi chú: </span> Các phần từ trong mảng sẽ có giá trị từ 0 đến 20
        </tr>
    </table>

</form>


<?php

if ($thong_bao != "") {

    echo "<p class='error'>$thong_bao</p>";
}

?>

</body>
</html>