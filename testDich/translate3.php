<?php

$result = "";
$detectedLang = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $text = trim($_POST["text"] ?? "");
  $toLang = $_POST["to"] ?? "vi";

  if ($text !== "") {

    $curl = curl_init();

    curl_setopt_array($curl, [

      CURLOPT_URL =>
      "https://google-api31.p.rapidapi.com/translate",

      CURLOPT_RETURNTRANSFER => true,

      CURLOPT_ENCODING => "",

      CURLOPT_MAXREDIRS => 10,

      CURLOPT_TIMEOUT => 30,

      CURLOPT_HTTP_VERSION =>
      CURL_HTTP_VERSION_1_1,

      CURLOPT_CUSTOMREQUEST => "POST",

      /*
             * Endpoint /translate hỗ trợ tự nhận diện
             * ngôn ngữ nguồn khi from_lang = ""
             */
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

    if ($err) {

      $result = "cURL Error: " . $err;
    } else {

      $data = json_decode($response, true);

      if (!is_array($data)) {

        $result = "Response từ API không hợp lệ.";
      } elseif (isset($data[0]["translated"])) {

        // Lấy nội dung đã dịch
        $result = $data[0]["translated"];

        // Lấy ngôn ngữ nguồn mà API tự phát hiện
        $detectedLang =
          $data[0]["detected_language"] ?? "";
      } else {

        $result = "Không lấy được kết quả dịch.";
      }
    }
  }
}


/*
 * Đổi mã ngôn ngữ sang tên dễ đọc.
 * Nếu API trả mã khác thì vẫn hiện mã gốc.
 */
$languageNames = [
  "en"  => "English",
  "eng" => "English",

  "vi"  => "Vietnamese",
  "vie" => "Vietnamese",

  "fr"  => "French",
  "fra" => "French",

  "de"  => "German",
  "deu" => "German",

  "es"  => "Spanish",
  "spa" => "Spanish"
];

$detectedLangName =
  $languageNames[$detectedLang]
  ?? $detectedLang;

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

    <p>
      Ngôn ngữ nguồn:
      <strong>Tự động phát hiện</strong>
    </p>


    <?php if ($detectedLangName !== ""): ?>

      <p>
        Đã phát hiện:
        <strong>
          <?= htmlspecialchars($detectedLangName) ?>
        </strong>
      </p>

    <?php endif; ?>


    <textarea
      name="text"
      rows="7"
      cols="60"
      placeholder="Nhập nội dung cần dịch..."><?= htmlspecialchars($_POST["text"] ?? "") ?></textarea>


    <br><br>


    <label>
      Ngôn ngữ đích:
    </label>


    <select name="to">

      <option
        value="vi"
        <?= ($_POST["to"] ?? "vi") === "vi"
          ? "selected"
          : "" ?>>
        Vietnamese
      </option>


      <option
        value="en"
        <?= ($_POST["to"] ?? "") === "en"
          ? "selected"
          : "" ?>>
        English
      </option>


      <option
        value="fr"
        <?= ($_POST["to"] ?? "") === "fr"
          ? "selected"
          : "" ?>>
        French
      </option>


      <option
        value="de"
        <?= ($_POST["to"] ?? "") === "de"
          ? "selected"
          : "" ?>>
        German
      </option>


      <option
        value="es"
        <?= ($_POST["to"] ?? "") === "es"
          ? "selected"
          : "" ?>>
        Spanish
      </option>

    </select>


    <br><br>


    <button type="submit">
      Translate
    </button>

  </form>


  <br>


  <h3>Kết quả:</h3>


  <textarea
    rows="10"
    cols="60"
    readonly><?= htmlspecialchars($result) ?></textarea>


</body>

</html>