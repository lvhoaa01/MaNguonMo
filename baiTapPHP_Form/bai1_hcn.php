<?php
  $chieu_dai = "";
  $chieu_rong = "";
  $dien_tich = "";
  $thong_bao = "";

  if(isset($_POST["tinh"])){
    $chieu_dai = $_POST["chieu_dai"];
    $chieu_rong = $_POST["chieu_rong"];

    if(!is_numeric($chieu_dai) || !is_numeric($chieu_rong)){
      $thong_bao = "Chiều dài và chiều rộng phải là số";
    }elseif($chieu_dai <= 0 || $chieu_rong <= 0){
      $thong_bao = "Chiều dài và chiều rộng phải lớn hơn 0";
    }else{
      $dien_tich = $chieu_dai * $chieu_rong;
    }
  };
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Diện tích hình chữ nhật</title>
</head>
<body>

    <form action="" method="POST">
      <table>
        <tr>
          <th colspan="2" class="table_tittle">DIỆN TÍCH HÌNH CHỮ NHẬT</th>
        </tr>
        <tr>
          <td>Chiều dài:</td>
          <td>
            <input type="number" name="chieu_dai"
            value="<?php echo $chieu_dai ?>">
          </td>
        </tr>
        <tr>
          <td>Chiều rộng:</td>
          <td>
            <input type="number" name="chieu_rong"
            value="<?php echo $chieu_rong ?>">
          </td>
        </tr>
        <tr>
          <td>Diện tích:</td>
          <td>
            <input type="text"
            value="<?php echo $dien_tich ?>"
            readonly>
          </td>
        </tr>
        <tr>
          <td colspan="2" class="center" >
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