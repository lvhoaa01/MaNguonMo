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


    table{
            margin-bottom: 2px;

    }
    input[type="number"] {
      width: 100%;
    }

    input[type="radio"] {
      color: red;
    }
  </style>
  <title>Nhập</title>
</head>

<body>
  <form action="ketqua.php" method="POST">
    <table>
      <tr>
        <th colspan="2" style="color:blue;">
          <h2>PHÉP TÍNH TRÊN HAI SỐ </h2>
        </th>
      </tr>
      <tr>
        <td style="color:brown;">Chọn phép tính:</td>
        <td style="color:red;">
          <input type="radio" name="phepTinh" value="cong" checked id="">Cộng
          <input type="radio" name="phepTinh" value="tru" id="">Trừ
          <input type="radio" name="phepTinh" value="nhan" id="">Nhân
          <input type="radio" name="phepTinh" value="chia" id="">Chia
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
  </form>
</body>

</html>