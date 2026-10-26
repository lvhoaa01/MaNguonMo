<?php 

  function getDay($input){
    $output = "";
    for($i = 0; $i < strlen($input);  ++$i){
      if($input[$i] == '/') break;
      $output .= $input[$i];
    }
    return $output;
  }

  function getMonth($input){
    $output = "";
    $flag = 0;
    for($i = 0; $i < strlen($input);  ++$i){
      if($input[$i] == '/') ++$flag;
      if($flag == 1) $output .= $input[$i];
      if($flag == 2) break;
    }
    return $output;
  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="" method="POST">
    <table>
      <tr>
        <td>Ngày thứ 1:</td>
        <td>Ngày thứ 2:</td>
      </tr>
      <tr>
        <td><input type="text"></td>
        <td></td>
      </tr>
    </table>
  </form>
</body>
</html>