<?php

function xuatMang($mang)
{
    return implode(", ", $mang);
}


function thayThe($mang, $giaTriCu, $giaTriMoi)
{
    for ($i = 0; $i < count($mang); $i++) {

        if ($mang[$i] == $giaTriCu) {
            $mang[$i] = $giaTriMoi;
        }
    }

    return $mang;
}


$chuoi_mang = "";
$gia_tri_cu = "";
$gia_tri_moi = "";

$mang_cu_hien_thi = "";
$mang_moi_hien_thi = "";

$thong_bao = "";


if (isset($_POST["thay_the"])) {

    $chuoi_mang = $_POST["mang"] ?? "";
    $gia_tri_cu = $_POST["gia_tri_cu"] ?? "";
    $gia_tri_moi = $_POST["gia_tri_moi"] ?? "";


    if (trim($chuoi_mang) == "") {

        $thong_bao = "Mảng không được để trống.";

    } elseif (!is_numeric($gia_tri_cu)) {

        $thong_bao = "Giá trị cần thay phải là số.";

    } elseif (!is_numeric($gia_tri_moi)) {

        $thong_bao = "Giá trị thay thế phải là số.";

    } else {
        $mang_cu = explode(",", $chuoi_mang);
        $mang_cu = array_map("trim", $mang_cu);

        $hop_le = true;

        foreach ($mang_cu as $gia_tri) {

            if (!is_numeric($gia_tri)) {
                $hop_le = false;
                break;
            }
        }


        if (!$hop_le) {

            $thong_bao = "Các phần tử trong mảng phải là số.";

        } else {
            $mang_moi = thayThe(
                $mang_cu,
                $gia_tri_cu,
                $gia_tri_moi
            );

            $mang_cu_hien_thi = xuatMang($mang_cu);

            $mang_moi_hien_thi = xuatMang($mang_moi);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="UTF-8">

    <title>Thay thế phần tử trong mảng</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<form method="POST" action="">

    <table>

        <tr style="background-color: pink;">
            <th colspan="2">
                THAY THẾ
            </th>
        </tr>


        <tr>

            <td>Nhập các phần tử:</td>

            <td>

                <input
                    type="text"
                    name="mang"
                    value="<?php echo htmlspecialchars($chuoi_mang); ?>">

            </td>

        </tr>


        <tr>

            <td>Giá trị cần thay thế:</td>

            <td>

                <input
                    type="text"
                    name="gia_tri_cu"
                    value="<?php echo htmlspecialchars($gia_tri_cu); ?>">

            </td>

        </tr>


        <tr>

            <td>Giá trị thay thế:</td>

            <td>

                <input
                    type="text"
                    name="gia_tri_moi"
                    value="<?php echo htmlspecialchars($gia_tri_moi); ?>">

            </td>

        </tr>


        <tr>

            <td colspan="2" class="center" >

                <input
                    type="submit"
                    name="thay_the"
                    style="background-color: yellow;"
                    value="Thay thế">

            </td>

        </tr>


        <tr>

            <td>Mảng cũ:</td>

            <td>

                <input
                    type="text"
                    class="result"
                    value="<?php echo $mang_cu_hien_thi; ?>"
                    style="background-color: red;"
                    readonly>

            </td>

        </tr>


        <tr>

            <td>Mảng sau khi thay thế:</td>

            <td>

                <input
                    type="text"
                    class="result"
                    value="<?php echo $mang_moi_hien_thi; ?>"
                    style="background-color: red;"
                    readonly>

            </td>

        </tr>
        <tr>
            <td colspan="2" class="center">
                <span style="color: red;font-weight: bold;">(*)</span> Các phần từ trong mảng sẽ cách nhau bằng dấu ","
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