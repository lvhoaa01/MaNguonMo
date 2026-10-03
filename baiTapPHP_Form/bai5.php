<?php

$gio_bat_dau = "";
$gio_ket_thuc = "";
$tien_thanh_toan = "";
$thong_bao = "";

$gia_truoc_17 = 20000;
$gia_sau_17 = 45000;

if (isset($_POST["tinh_tien"])) {

    $gio_bat_dau = $_POST["gio_bat_dau"];
    $gio_ket_thuc = $_POST["gio_ket_thuc"];

    if (
        !is_numeric($gio_bat_dau) ||
        !is_numeric($gio_ket_thuc)
    ) {

        $thong_bao = "Dữ liệu nhập vào không đúng kiểu dữ liệu.";

    }
    elseif (
        $gio_bat_dau < 10 ||
        $gio_ket_thuc > 24
    ) {

        $thong_bao = "Quán chỉ hoạt động từ 10 giờ đến 24 giờ.";

    }
    elseif ($gio_ket_thuc <= $gio_bat_dau) {

        $thong_bao = "Giờ kết thúc phải lớn hơn giờ bắt đầu.";

    }

    else {
        if ($gio_ket_thuc <= 17) {

            $tien_thanh_toan =
                ($gio_ket_thuc - $gio_bat_dau)
                * $gia_truoc_17;

        }
        elseif ($gio_bat_dau >= 17) {

            $tien_thanh_toan =
                ($gio_ket_thuc - $gio_bat_dau)
                * $gia_sau_17;

        }
        else {
            $tien_truoc_17 =
                (17 - $gio_bat_dau)
                * $gia_truoc_17;

            $tien_sau_17 =
                ($gio_ket_thuc - 17)
                * $gia_sau_17;

            $tien_thanh_toan =
                $tien_truoc_17 + $tien_sau_17;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Tính tiền Karaoke</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<form method="POST" action="">

    <table>

        <tr>
            <th colspan="3" class="table_tittle">
                TÍNH TIỀN KARAOKE
            </th>
        </tr>

        <tr>
            <td>Giờ bắt đầu:</td>

            <td>
                <input
                    type="number"
                    step="any"
                    name="gio_bat_dau"
                    value="<?php echo $gio_bat_dau; ?>">
            </td>
            <td>(h)</td>
        </tr>

        <tr>
            <td>Giờ kết thúc:</td>

            <td>
                <input
                    type="number"
                    step="any"
                    name="gio_ket_thuc"
                    value="<?php echo $gio_ket_thuc; ?>">
            </td>
            <td>(h)</td>
        </tr>

        <tr>
            <td>Tiền thanh toán:</td>

            <td>
                <input
                    type="text"
                    value="<?php echo $tien_thanh_toan; ?>"
                    readonly>
            </td>
            <td>(VNĐ)</td>
        </tr>

        <tr>
            <td colspan="2" class="center">

                <input
                    type="submit"
                    name="tinh_tien"
                    value="Tính tiền">

            </td>
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