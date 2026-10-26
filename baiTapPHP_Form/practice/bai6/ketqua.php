<?php 
$sothunhat = "";
$sothuhai="";
$phepTinh="";
$thongbao="";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: 'Times New Roman', Times, serif;
      font-size: 26px;
      display: flex;
      justify-content: center;
      margin-bottom: 2px;
    }


    table {
      margin-bottom: 2px;

    }

    input[type="number"] {
      width: 100%;
    }

    input[type="radio"] {
      color: red;
    }
  </style>
  <title>Kết quả</title>
</head>

<body>
  <table>
    <tr>
      <th colspan="2" style="color:blue;">
        <h2>PHÉP TÍNH TRÊN HAI SỐ </h2>
      </th>
    </tr>
    <tr>
      <td style="color:brown;">Chọn phép tính:</td>
      <td style="color:red;">
        <?php echo $phepTinh; ?>
      </td>
    </tr>
    <tr>
      <td style="color:blue;">Số thứ nhất:</td>
      <td><input type="number" name="sothunhat"></td>
    </tr>
    <tr>

      <td style="color:blue;">Số thứ hai:</td>
      <td><input type="number" name="sothuhai"></td>
    </tr>
    <tr>
      <td></td>
      <td><button type="submit" name="tinh">Tính</button></td>
    </tr>
  </table>
</body>

</html>