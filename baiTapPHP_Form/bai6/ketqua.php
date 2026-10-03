<?php
function cong($a, $b)
{
  return $a + $b;
}
function tru($a, $b)
{
  return $a - $b;
}

function nhan($a, $b)
{
  return $a * $b;
}

function chia($a, $b)
{
  return $a / $b;
}



$phep_tinh = $_POST["phep_tinh"];

$so_thu_nhat = $_POST["so_thu_nhat"];
$so_thu_hai = $_POST["so_thu_hai"];

$ten_phep_tinh = "";
$ket_qua = "";

if (!is_numeric($so_thu_nhat) || !is_numeric($so_thu_nhat)) {
  echo "
    <script>
      alert('Dữ liệu nhập sai kiểu dữ liệu');
      window.history.back();
    </script>
  ";
  exit;
} else {
  switch ($phep_tinh) {

    case "cong":

      $ten_phep_tinh = "Cộng";

      $ket_qua = cong(
        $so_thu_nhat,
        $so_thu_hai
      );

      break;


    case "tru":

      $ten_phep_tinh = "Trừ";

      $ket_qua = tru(
        $so_thu_nhat,
        $so_thu_hai
      );

      break;


    case "nhan":

      $ten_phep_tinh = "Nhân";

      $ket_qua = nhan(
        $so_thu_nhat,
        $so_thu_hai
      );

      break;


    case "chia":

      $ten_phep_tinh = "Chia";

      $ket_qua = chia(
        $so_thu_nhat,
        $so_thu_hai
      );

      break;
  }
}

?>

<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">

  <title>Kết quả phép tính</title>

  <link rel="stylesheet" href="style.css">
</head>

<body>

  <table>

    <tr>
      <th colspan="2" class="table_tittle">
        PHÉP TÍNH TRÊN HAI SỐ
      </th>
    </tr>

    <tr>
      <td>Chọn phép tính:</td>

      <td>
        <?php echo $ten_phep_tinh; ?>
      </td>
    </tr>

    <tr>
      <td>Số thứ nhất:</td>

      <td>
        <input
          type="text"
          value="<?php echo $so_thu_nhat; ?>"
          readonly>
      </td>
    </tr>

    <tr>
      <td>Số thứ hai:</td>

      <td>
        <input
          type="text"
          value="<?php echo $so_thu_hai; ?>"
          readonly>
      </td>
    </tr>

    <tr>
      <td>Kết quả:</td>

      <td>
        <input
          type="text"
          value="<?php echo $ket_qua; ?>"
          readonly>
      </td>
    </tr>

    <tr>
      <td colspan="2" class="center">

        <a href="javascript:window.history.back(-1);">
          Trở về trang trước
        </a>

      </td>
    </tr>

  </table>

</body>

</html>