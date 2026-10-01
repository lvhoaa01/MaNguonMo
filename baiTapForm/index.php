<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HCN</title>
</head>
<body>
  <form action="hcnArea.php" name = "HCN" method = "post">
    <table>
      
      <tr style="background: beige;">
        <th colspan="2">
          DIỆN TÍCH HÌNH CHỮ NHẬT 
        </th>
      </tr>

      <tr>
        <td>Chiều dài</td>
        <td>
          <input type="number" name="dai" size="20" step="any" value="<?php if(isset($cd)) echo "$cd"; ?>">
        </td>
      </tr>

      <tr>
        <td>Chiều rộng</td>
        <td>
          <input type="number" name="rong" size="20" step="any" value="<?php if(isset($cr)) echo "$cr"; ?>">
        </td>
      </tr>


      <tr>
        <td>Diện tích</td>
        <td>
          <input type="number" name="rong" size="20" step="any" value="<?php if(isset($cr)) echo "$cr"; ?>">
        </td>
      </tr>
    </table>


  </form>


</body>
</html>