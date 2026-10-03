<?php

$day_so = "";
$tong = "";
$thong_bao = "";

if (isset($_POST["tinh_tong"])) {

    $day_so = $_POST["day_so"] ?? "";

    if (trim($day_so) == "") {

        $thong_bao = "Dãy số không được để trống.";

    } else {
        $mang = explode(",", $day_so);
        $mang = array_map("trim", $mang);

        $hop_le = true;
        foreach ($mang as $gia_tri) {

            if (!is_numeric($gia_tri)) {

                $hop_le = false;
                break;
            }
        }

        if (!$hop_le) {

            $thong_bao = "Dãy nhập vào phải chỉ gồm các số.";

        } else {
            $tong = array_sum($mang);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="UTF-8">

    <title>Nhập và tính trên dãy số</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<form method="POST" action="">

    <table>

        <tr>

            <th colspan="2">
                NHẬP VÀ TÍNH TRÊN DÃY SỐ
            </th>

        </tr>

        <tr>

            <td>Nhập dãy số:</td>

            <td>

                <input
                    type="text"
                    name="day_so"
                    value="<?php echo htmlspecialchars($day_so); ?>">

            </td>

        </tr>

        <tr>

            <td colspan="2" class="center">

                <input
                    type="submit"
                    name="tinh_tong"
                    value="Tổng dãy số">

            </td>

        </tr>

        <tr>

            <td>Tổng dãy số:</td>

            <td>

                <input
                    type="text"
                    value="<?php echo $tong; ?>"
                    readonly>

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