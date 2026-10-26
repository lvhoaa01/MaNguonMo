<?php

$result = "";
$rawResponse = "";
$detectedLang = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $text = trim($_POST["text"] ?? "");
  // $fromLang = $_POST["from_lang"] ?? "en";
  $toLang = $_POST["to"] ?? "vi";

  if ($text !== "") {

    $curl = curl_init();

    curl_setopt_array($curl, [
      CURLOPT_URL => "https://google-api31.p.rapidapi.com/gtranslate",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",

      CURLOPT_POSTFIELDS => json_encode([
        "text" => $text,
        "to" => $toLang,
        "from_lang" => ""
      ]),

      CURLOPT_HTTPHEADER => [
        "Content-Type: application/json",
        "x-rapidapi-host: google-api31.p.rapidapi.com",
        "x-rapidapi-key: 758f2d4484msh9af59a2ed92b85cp12a1aajsnf1a4ccd89911"
      ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    // if ($err) {
    //     $result = "cURL Error: " . $err;
    // } else {

    //     $rawResponse = $response;

    //     $data = json_decode($response, true);

    //     /*
    //      * Tạm thời chưa biết chính xác cấu trúc JSON trả về
    //      * của API này.
    //      *
    //      * Sau lần chạy đầu tiên ta sẽ xem response để
    //      * lấy đúng trường chứa câu dịch.
    //      */


    //     $result = $response;
    // }
    if ($err) {
      $result = "cURL Error: " . $err;
    } else {
      $data = json_decode($response, true);

      if (isset($data["translated_text"])) {
        $result = $data["translated_text"];
        $detectedLang = $data["from"] ?? "";
      } else {
        $result = "Không lấy được kết quả dịch.";
      }
    }
  }
}

?>

<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <title>Google Translate API</title>
</head>

<body>

  <h2>Ví dụ đọc API bằng PHP</h2>

  <form method="POST">

    <?php if ($detectedLang !== ""): ?>
      <p>
        Ngôn ngữ phát hiện:
        <strong><?= htmlspecialchars($detectedLang) ?></strong>
      </p>
    <?php endif; ?>
    

    <br><br>

    <textarea
      name="text"
      rows="7"
      cols="60"
      placeholder="Nhập nội dung cần dịch..."><?= htmlspecialchars($_POST["text"] ?? "") ?></textarea>

    <br><br>

    <label>Ngôn ngữ đích:</label>

    <select name="to">

      <option value="vi"
        <?= ($_POST["to"] ?? "vi") === "vi" ? "selected" : "" ?>>
        Vietnamese
      </option>

      <option value="en"
        <?= ($_POST["to"] ?? "") === "en" ? "selected" : "" ?>>
        English
      </option>

    </select>

    <br><br>

    <button type="submit">Translate</button>

  </form>

  <br>

  <h3>Kết quả API:</h3>

  <textarea
    rows="10"
    cols="60"
    readonly><?= htmlspecialchars($result) ?></textarea>

</body>

</html>