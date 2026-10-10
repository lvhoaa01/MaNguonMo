<?php

require_once __DIR__ . '/../config.php';

/** @var mysqli $conn */

$sql = "SELECT Ma_sua, Ten_sua, Trong_luong, Don_gia, Hinh
        FROM sua
        ORDER BY Ten_sua";

$result = mysqli_query($conn, $sql)
    or die('Lỗi truy vấn: ' . mysqli_error($conn));

$soCot = 5;
$viTriCot = 0;

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List dạng cột có link</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="wrapper">

    <h2>THÔNG TIN CÁC SẢN PHẨM</h2>

    <table class="product-grid">
        <tbody>

        <?php
        while ($row = mysqli_fetch_assoc($result)) {

            if ($viTriCot % $soCot == 0) {
                echo '<tr>';
            }
        ?>
            <td class="product-cell">
                <table class="product-card">
                    <tr>
                        <td class="product-name">
                            <a href="list_chi_tiet.php?ma_sua=<?php echo $row['Ma_sua']; ?>">
                                <?php echo $row['Ten_sua']; ?>
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td class="product-info">
                            <?php echo $row['Trong_luong']; ?> gr
                            -
                            <?php
                            echo number_format(
                                $row['Don_gia'],
                                0,
                                ',',
                                '.'
                            ) . ' VNĐ';
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td class="product-image">
                            <img
                                src="images/<?php echo $row['Hinh']; ?>"
                                alt="<?php echo $row['Ten_sua']; ?>">
                        </td>
                    </tr>
                </table>
            </td>
        <?php

            $viTriCot++;

            if ($viTriCot % $soCot == 0) {
                echo '</tr>';
            }
        }

        if ($viTriCot % $soCot != 0) {

            $soOTrong = $soCot - ($viTriCot % $soCot);

            for ($i = 0; $i < $soOTrong; $i++) {
                echo '<td class="product-cell empty"></td>';
            }

            echo '</tr>';
        }
        ?>

        </tbody>
    </table>

</div>

</body>

</html>
