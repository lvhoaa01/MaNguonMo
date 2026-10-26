<?php 
$chieu_dai="";
$chieu_rong="";
$dien_tinh="";
$thong_bao="";

if(isset($_POST['tinh'])){
  $chieu_dai = $_POST['chieu_dai'];
  $chieu_rong = $_POST['chieu_rong'];
  if(!is_numeric($chieu_dai) || !is_numeric($chieu_rong)){
    $thong_bao = "Input đầu vào không được khác số";
  }elseif($chieu_dai < 0 || $chieu_rong < 0){
    $thong_bao = "Input đầu vào không được âm";
  }else $dien_tich = $chieu_dai*$chieu_rong;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body{
      display: flex;
      justify-content: center;
    }

    table{
      background-color: yellow;
    }

    .tittle{
      background-color: green;
      color: white;
    }

    .inputArea{
      background-color: red;
    }
    .center{
      text-align: center;
    }
    input[type="number"]{
      width: 100%;
    }
  </style>
  <title>Diện tích hình chữ nhật</title>
</head>
<body>
  <form action="" method="POST">
    <table >
      <tr>
        <td colspan="2" class="tittle"><h2>DIỆN TÍCH HÌNH CHỮ NHẬT</h2></td>
      </tr>
      <tr>
        <td>Chiều dài:</td>
        <td><input type="number" name="chieu_dai" value="<?php echo $_POST['chieu_dai'] ?? "" ?>"></td>
      </tr>
      <tr>
        
        <td>Chiều rộng:</td>
        <td><input type="number" name="chieu_rong" value="<?php echo $_POST['chieu_rong'] ?? "" ?>"></td>
      </tr>
      <tr>
        
        <td>Diện tích:</td>
        <td><input type="number" class="inputArea" name="dien_tich" value="<?php echo $dien_tich ?>" readonly></td>
      </tr>
      <tr>
        <td colspan="2" class="center"><button type="submit" name="tinh">Tính</button></td>
      </tr>
    </table>
  </form>

  <?php if($thong_bao != ""){
    echo "<p class='error'> $thong_bao </p>";
  } ?>
</body>
</html>