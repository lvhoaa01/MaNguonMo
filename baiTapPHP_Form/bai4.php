<?php
$toan = "";
$ly = "";
$hoa = "";
$diem_chuan = "";
$tong_diem = "";
$ket_qua = "";
$thong_bao = "";
if (isset($_POST["xem_ket_qua"])) {
  $toan = $_POST["toan"];
  $ly = $_POST["ly"];
  $hoa = $_POST["hoa"];
  $diem_chuan = $_POST["diem_chuan"];

  if (
    !is_numeric($toan) ||
    !is_numeric($ly) ||
    !is_numeric($hoa) ||
    !is_numeric($diem_chuan)
  ) {
    $thong_bao = "Dữ liệu nhập chưa đúng kiểu dữ liệu";
  } elseif (
    $toan < 0 ||
    $ly < 0 ||
    $hoa < 0 ||
    $diem_chuan < 0
  ) {
    $thong_bao = "Dữ liệu nhập vào khác âm";
  } else {
    $tong_diem = $toan + $ly + $hoa;
    if (
      $toan != 0 &&
      $ly != 0 &&
      $hoa != 0 &&
      $tong_diem >= $diem_chuan
    ) {
      $ket_qua = "Đậu";
    } else {
      $ket_qua = "Rớt";
    }
  }
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Tính tiền điện</title>
</head>

<body>

  <form action="" method="POST">
    <table>

        <tr>
            <th colspan="2" class="table_tittle">
                KẾT QUẢ THI ĐẠI HỌC
            </th>
        </tr>

        <tr>
            <td>Toán:</td>

            <td>
                <input
                    type="number"
                    step="any"
                    name="toan"
                    value="<?php echo $toan; ?>">
            </td>
        </tr>

        <tr>
            <td>Lý:</td>

            <td>
                <input
                    type="number"
                    step="any"
                    name="ly"
                    value="<?php echo $ly; ?>">
            </td>
        </tr>

        <tr>
            <td>Hóa:</td>

            <td>
                <input
                    type="number"
                    step="any"
                    name="hoa"
                    value="<?php echo $hoa; ?>">
            </td>
        </tr>

        <tr>
            <td>Điểm chuẩn:</td>

            <td>
                <input
                    type="number"
                    step="any"
                    name="diem_chuan"
                    value="<?php echo $diem_chuan; ?>">
            </td>
        </tr>

        <tr>
            <td>Tổng điểm:</td>

            <td>
                <input
                    type="text"
                    value="<?php echo $tong_diem; ?>"
                    readonly>
            </td>
        </tr>

        <tr>
            <td>Kết quả thi:</td>

            <td>
                <input
                    type="text"
                    value="<?php echo $ket_qua; ?>"
                    readonly>
            </td>
        </tr>

        <tr>
            <td colspan="2" class="center">

                <input
                    type="submit"
                    name="xem_ket_qua"
                    value="Xem kết quả">

            </td>
        </tr>

    </table>
  </form>

  <?php
  if ($thong_bao != "") {
    echo "<p class='error'> $thong_bao</p> ";
  }
  ?>

</body>

</html>