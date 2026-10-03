<?php

$n = "";

$mang = [];
$mang_tang_dan = [];

$so_chan = 0;
$so_nho_hon_100 = 0;
$tong_so_am = 0;

$vi_tri_so_0 = [];

$thong_bao = "";


if (isset($_POST["thuc_hien"])) {

    $n = $_POST["n"] ?? "";
    if (
        !is_numeric($n) ||
        intval($n) != $n ||
        $n <= 0
    ) {

        $thong_bao = "n phải là số nguyên dương.";

    } else {
        $n = intval($n);
        for ($i = 0; $i < $n; $i++) {
            $mang[] = rand(-100, 200);
        }
    
        $so_chan = count(
          array_filter($mang, fn($x) => $x % 2 == 0)
        );
  
        $so_nho_hon_100 = count(
          array_filter($mang, fn($x) => $x < 100)
        );

        $tong_so_am = array_sum(
          array_filter($mang, fn($x) => $x < 0)
        );

        $vi_tri_so_0 = array_keys(
          array_filter($mang, fn($x) => $x == 0)
        );


        $mang_tang_dan = $mang;

        sort($mang_tang_dan);
    }
}

?>

<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="UTF-8">

    <title>Bài tập mảng</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<form method="POST" action="">

    <table>

        <tr>

            <th colspan="2">
                PHÁT SINH VÀ XỬ LÝ MẢNG
            </th>

        </tr>

        <tr>

            <td>Nhập n:</td>

            <td>

                <input
                    type="text"
                    name="n"
                    value="<?php echo $n; ?>">

            </td>

        </tr>

        <tr>

            <td colspan="2" class="center">

                <input
                    type="submit"
                    name="thuc_hien"
                    value="Thực hiện">

            </td>

        </tr>

    </table>

</form>


<?php

if ($thong_bao != "") {

    echo "<p class='error'>$thong_bao</p>";
}

?>


<?php if (count($mang) > 0): ?>  

<table class="result">

    <tr>

        <td>Mảng phát sinh:</td>

        <td>
            <?php echo implode(", ", $mang); ?>
        </td>

    </tr>


    <tr>

        <td>Số phần tử chẵn:</td>

        <td>
            <?php echo $so_chan; ?>
        </td>

    </tr>


    <tr>

        <td>Số phần tử nhỏ hơn 100:</td>

        <td>
            <?php echo $so_nho_hon_100; ?>
        </td>

    </tr>


    <tr>

        <td>Tổng các phần tử âm:</td>

        <td>
            <?php echo $tong_so_am; ?>
        </td>

    </tr>


    <tr>

        <td>Vị trí phần tử bằng 0:</td>

        <td>

            <?php

            if (count($vi_tri_so_0) > 0) {

                echo implode(", ", $vi_tri_so_0);

            } else {

                echo "Không có phần tử bằng 0";
            }

            ?>

        </td>

    </tr>


    <tr>

        <td>Mảng tăng dần:</td>

        <td>
            <?php echo implode(", ", $mang_tang_dan); ?>
        </td>

    </tr>

</table>

<?php endif; ?>


</body>

</html>