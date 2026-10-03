<?php

$nam_duong = "";
$nam_am_lich = "";
$hinh = "";
$thong_bao = "";

$mang_can = [
    "Giáp",
    "Ất",
    "Bính",
    "Đinh",
    "Mậu",
    "Kỷ",
    "Canh",
    "Tân",
    "Nhâm",
    "Quý"
];

$mang_chi = [
    "Tý",
    "Sửu",
    "Dần",
    "Mão",
    "Thìn",
    "Tỵ",
    "Ngọ",
    "Mùi",
    "Thân",
    "Dậu",
    "Tuất",
    "Hợi"
];

$mang_hinh = [
    "ty.png",
    "suu.png",
    "dan.png",
    "mao.png",
    "thin.png",
    "ti.png",
    "ngo.png",
    "mui.png",
    "than.png",
    "dau.png",
    "tuat.png",
    "hoi.png"
];


if (isset($_POST["tinh"])) {

    $nam_duong = $_POST["nam_duong"] ?? "";

    if (
        !is_numeric($nam_duong) ||
        intval($nam_duong) != $nam_duong ||
        $nam_duong <= 0
    ) {

        $thong_bao = "Năm dương lịch phải là số nguyên dương.";

    } else {

        $nam_duong = intval($nam_duong);

        $chi_so_can = ($nam_duong + 6) % 10;
        $chi_so_chi = ($nam_duong + 8) % 12;

        $nam_am_lich =
            $mang_can[$chi_so_can]
            . " "
            . $mang_chi[$chi_so_chi];


        $hinh = $mang_hinh[$chi_so_chi];
    }
}

?>

<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="UTF-8">

    <title>Tính năm âm lịch</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<form method="POST" action="">

    <table>

        <tr>
            <th colspan="3">
                TÍNH NĂM ÂM LỊCH
            </th>
        </tr>


        <tr>

            <td>Năm dương lịch:</td>

            <td></td>

            <td>Năm âm lịch:</td>

        </tr>


        <tr>

            <td>

                <input
                    type="text"
                    name="nam_duong"
                    value="<?php echo $nam_duong; ?>">

            </td>


            <td>

                <input
                    type="submit"
                    name="tinh"
                    value="=>">

            </td>


            <td>

                <input
                    type="text"
                    value="<?php echo $nam_am_lich; ?>"
                    readonly>

            </td>

        </tr>


        <?php if ($hinh != ""): ?>

            <tr>

                <td colspan="3" class="center">

                    <img
                        src="./images/<?php echo $hinh; ?>"
                        alt="<?php echo $nam_am_lich; ?>">

                </td>

            </tr>

        <?php endif; ?>

    </table>

</form>


<?php

if ($thong_bao != "") {
    echo "<p class='error'>$thong_bao</p>";
}

?>

</body>

</html>