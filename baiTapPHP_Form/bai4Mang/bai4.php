<?php

function timKiem($mang, $soCanTim)
{
  // return fn($mang, $soCanTim) => array_search($soCanTim, $mang);
  $viTri = [];
  for ($i = 0; $i < count($mang); $i++) {

    if ($mang[$i] == $soCanTim) {
      $viTri[] = $i + 1;
    }
  }

  return $viTri;
}


$chuoi_mang = "";
$so_can_tim = "";
$ket_qua = "";
$thong_bao = "";


if (isset($_POST["tim_kiem"])) {

  $chuoi_mang = $_POST["mang"] ?? "";
  $so_can_tim = $_POST["so_can_tim"] ?? "";

  if (trim($chuoi_mang) == "") {

    $thong_bao = "Mảng không được để trống.";
  } elseif (!is_numeric($so_can_tim)) {

    $thong_bao = "Số cần tìm phải là số.";
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

      $thong_bao = "Mảng chỉ được chứa các số.";
    } else {

      $vi_tri = timKiem($mang, $so_can_tim);


      if (count($vi_tri) > 0) {

        $ket_qua =
          "Đã tìm thấy "
          . $so_can_tim
          . " tại vị trí thứ "
          . implode(", ", $vi_tri)
          . " của mảng";
      } else {

        $ket_qua =
          "Không tìm thấy "
          . $so_can_tim
          . " trong mảng";
      }
    }
  }
}

?>

<!DOCTYPE html>
<html lang="vi">

<head>

  <meta charset="UTF-8">

  <title>Tìm kiếm trong mảng</title>

  <link rel="stylesheet" href="style.css">

</head>

<body>

  <form method="POST" action="">

    <table>

      <tr>
        <th colspan="2">
          TÌM KIẾM
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

        <td>Số cần tìm:</td>

        <td>

          <input
            type="text"
            name="so_can_tim"
            value="<?php echo htmlspecialchars($so_can_tim); ?>">

        </td>

      </tr>


      <tr>

        <td colspan="2" class="center">

          <input
            type="submit"
            name="tim_kiem"
            value="Tìm kiếm">

        </td>

      </tr>


      <tr>

        <td>Kết quả tìm kiếm:</td>

        <td>

          <input
            type="text"
            value="<?php echo $ket_qua; ?>"
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