<?php
  $ten_chu_ho = "";
  $chi_so_cu = "";
  $chi_so_moi = "";
  $don_gia = 2000;
  $tien_thanh_toan = "";
  $thong_bao = "";
  if(isset($_POST["tinh"])){
    $ten_chu_ho = $_POST["ten_chu_ho"];
    $chi_so_cu = $_POST["chi_so_cu"];
    $chi_so_moi = $_POST["chi_so_moi"];
    $don_gia = $_POST["don_gia"];

    if(!is_numeric($chi_so_cu) ||
    !is_numeric($chi_so_moi) || 
    !is_numeric($don_gia) || 
    !is_string($ten_chu_ho)
    ){
      $thong_bao = "Dữ liệu nhập chưa đúng kiểu dữ liệu";
    }elseif($chi_so_cu < 0 ||
    $chi_so_moi < 0 || 
    $don_gia < 0 ||
    $chi_so_moi < $chi_so_cu){
      $thong_bao = "Dữ liệu nhập vào khác âm và chỉ số cũ không được nhỏ hơn chỉ số mới";
    }else{
      $tien_thanh_toan = ($chi_so_moi - $chi_so_cu) * $don_gia;
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
          <th colspan="3" class="table_tittle">TÍNH TIỀN ĐIỆN</th>
        </tr>
        <tr>
          <td>Tên chủ hộ:</td>
          <td>
            <input type="text" name="ten_chu_ho"
            value="<?php echo $ten_chu_ho ?>">
          </td>
          <td></td>
        </tr>
        <tr>
          <td>Chỉ số cũ:</td>
          <td>
            <input type="number" name="chi_so_cu"
            value="<?php echo $chi_so_cu ?>">
          </td>
          <td>(Kw)</td>
        </tr>
        <tr>
          <td>Chỉ số mới:</td>
          <td>
            <input type="number"
            name="chi_so_moi"
            value="<?php echo $chi_so_moi ?>"
            >
          </td>
          <td>(Kw)</td>
        </tr>
        <tr>
          <td>Đơn giá:</td>
          <td>
            <input type="number"
            name="don_gia"
            value="<?php echo $don_gia ?>"
            >
          </td>
          <td>(VNĐ)</td>
        </tr>
        <tr>
          <td>Số tiền phải thanh toán:</td>
          <td>
            <input type="text"
            value="<?php echo $tien_thanh_toan ?>"
            readonly
            >
          </td>
          <td>(VNĐ)</td>
        </tr>
        <tr>
          <td colspan="3" class="center" >
            <input type="submit" name="tinh" value="Tính">
          </td>
        </tr>
      </table>
    </form>

    <?php 
      if($thong_bao != ""){
        echo "<p class='error'> $thong_bao</p> ";
      }
    ?>
    
</body>
</html>