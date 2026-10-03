<?php

function sapTang($mang)
{
    $n = count($mang);

    for ($i = 0; $i < $n - 1; $i++) {

        for ($j = $i + 1; $j < $n; $j++) {

            if ($mang[$i] > $mang[$j]) {

                $tam = $mang[$i];

                $mang[$i] = $mang[$j];

                $mang[$j] = $tam;
            }
        }
    }

    return $mang;
}


function sapGiam($mang)
{
    $n = count($mang);

    for ($i = 0; $i < $n - 1; $i++) {

        for ($j = $i + 1; $j < $n; $j++) {

            if ($mang[$i] < $mang[$j]) {

                $tam = $mang[$i];

                $mang[$i] = $mang[$j];

                $mang[$j] = $tam;
            }
        }
    }

    return $mang;
}


function xuatMang($mang)
{
    return implode(", ", $mang);
}


$chuoi_mang = "";

$tang_dan = "";
$giam_dan = "";

$thong_bao = "";


if (isset($_POST["sap_xep"])) {

    $chuoi_mang = $_POST["mang"] ?? "";

    if (trim($chuoi_mang) == "") {

        $thong_bao = "Mảng không được để trống.";

    } else {
        $mang = explode(",", $chuoi_mang);
        $mang = array_map("trim", $mang);

        $hop_le = true;

        foreach ($mang as $gia_tri) {

            if (!is_numeric($gia_tri)) {

                $hop_le = false;
                break;
            }
        }


        if (!$hop_le) {

            $thong_bao = "Các phần tử trong mảng phải là số.";

        } else {
          
            $mang_tang = sapTang($mang);
            // sort($mang);
            $mang_giam = sapGiam($mang);
            // rsort($mang);


            $tang_dan = xuatMang($mang_tang);
            $giam_dan = xuatMang($mang_giam);
            //$tangdan = fn($mang) => implode(",", $mang);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="UTF-8">

    <title>Sắp xếp mảng</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<form method="POST" action="">

    <table>

        <tr>
            <th colspan="2">
                SẮP XẾP MẢNG
            </th>
        </tr>


        <tr>

            <td>Nhập mảng:</td>

            <td>

                <input
                    type="text"
                    name="mang"
                    value="<?php echo htmlspecialchars($chuoi_mang); ?>">

            </td>

        </tr>


        <tr>

            <td colspan="2" class="center">

                <input
                    type="submit"
                    name="sap_xep"
                    value="Sắp xếp">

            </td>

        </tr>


        <tr>

            <td>Tăng dần:</td>

            <td>

                <input
                    type="text"
                    class="result"
                    value="<?php echo $tang_dan; ?>"
                    readonly>

            </td>

        </tr>


        <tr>

            <td>Giảm dần:</td>

            <td>

                <input
                    type="text"
                    class="result"
                    value="<?php echo $giam_dan; ?>"
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