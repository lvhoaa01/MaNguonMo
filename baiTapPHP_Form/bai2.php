<?php
  $ban_kinh = "";
  $chu_vi = "";
  $dien_tich = "";
  $thong_bao = "";
  const PI = 3.14;
  if(isset($_POST["tinh"])){
    $ban_kinh = $_POST["ban_kinh"];

    if(!is_numeric($ban_kinh)){
      $thong_bao = "Bán kính phải là số";
    }elseif($ban_kinh <= 0){
      $thong_bao = "Bán kính phải lớn hơn 0";
    }else{
      $dien_tich = $ban_kinh * $ban_kinh * PI;
      $chu_vi =  2 * $ban_kinh * PI;
    }
  };
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Diện tích và chu vi hình tròn</title>
</head>
<body>

    <form action="" method="POST">
      <table>
        <tr >
          <th colspan="2" class="table_tittle">DIỆN TÍCH VÀ CHU VI HÌNH TRÒN</th>
        </tr>
        <tr>
          <td>Bán kính:</td>
          <td>
            <input type="number" name="ban_kinh"
            value="<?php echo $ban_kinh ?>">
          </td>
        </tr>
        <tr>
          <td>Diện tích:</td>
          <td>
            <input type="number"
            value="<?php echo $dien_tich ?>"
            readonly>
          </td>
        </tr>
        <tr>
          <td>Chu vi:</td>
          <td>
            <input type="text"
            value="<?php echo $chu_vi ?>"
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