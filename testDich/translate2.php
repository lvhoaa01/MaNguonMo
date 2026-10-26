<?php

$result = "";
$detectedLang = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $text = trim($_POST["text"] ?? "");
    $toLang = $_POST["to"] ?? "vi";

    /*
     * API bắt buộc phải có from_lang.
     *
     * Vì chương trình hiện tại chỉ dịch:
     * English <-> Vietnamese
     *
     * nên có thể tự suy ra ngôn ngữ nguồn
     * dựa vào ngôn ngữ đích.
     */
    if ($toLang === "vi") {
        $fromLang = "en";
    } else {
        $fromLang = "vi";
    }

    if ($text !== "") {

        $curl = curl_init();

        curl_setopt_array($curl, [

            CURLOPT_URL =>
                "https://google-api31.p.rapidapi.com/gtranslate",

            CURLOPT_RETURNTRANSFER => true,

            CURLOPT_ENCODING => "",

            CURLOPT_MAXREDIRS => 10,

            CURLOPT_TIMEOUT => 30,

            CURLOPT_HTTP_VERSION =>
                CURL_HTTP_VERSION_1_1,

            CURLOPT_CUSTOMREQUEST => "POST",

            /*
             * Gửi dữ liệu sang API dưới dạng JSON
             */
            CURLOPT_POSTFIELDS => json_encode([
                "text" => $text,
                "to" => $toLang,
                "from_lang" => $fromLang
            ]),

            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",

                "x-rapidapi-host: google-api31.p.rapidapi.com",

                "x-rapidapi-key: 758f2d4484msh9af59a2ed92b85cp12a1aajsnf1a4ccd89911"
            ],
        ]);


        $response = curl_exec($curl);

        /*
         * Lấy lỗi cURL nếu có
         */
        $err = curl_error($curl);

        /*
         * Đóng kết nối cURL
         */
        curl_close($curl);

        if ($err) {

            $result = "cURL Error: " . $err;

        } else {

            /*
             * JSON response
             *      ↓
             * PHP associative array
             */
            $data = json_decode($response, true);

            if (!is_array($data)) {

                $result = "Response từ API không hợp lệ.";

            } elseif (isset($data["translated_text"])) {

                $result = $data["translated_text"];

                /*
                 * API trả ngôn ngữ nguồn thực tế
                 */
                $detectedLang =
                    $data["from"] ?? $fromLang;

            } else {

                /*
                 * Nếu API trả message lỗi thì hiển thị message
                 */
                $result =
                    $data["message"]
                    ?? "Không lấy được kết quả dịch.";
            }
        }
    }
}


/*
 * Đổi mã ngôn ngữ sang tên dễ đọc
 */
$languageNames = [
    "en" => "English",
    "eng" => "English",

    "vi" => "Vietnamese",
    "vie" => "Vietnamese"
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
        <strong>
            Tự động xác định
        </strong>
    </p>


    <?php if ($detectedLangName !== ""): ?>

        <p>

            Ngôn ngữ nguồn:

            <strong>
                <?= htmlspecialchars($detectedLangName) ?>
            </strong>

        </p>

    <?php endif; ?>


    <textarea
        name="text"
        rows="7"
        cols="60"
        placeholder="Nhập nội dung cần dịch..."
    ><?= htmlspecialchars($_POST["text"] ?? "") ?></textarea>


    <br><br>


    <label>
        Ngôn ngữ đích:
    </label>


    <select name="to">

        <option
            value="vi"

            <?=
                ($_POST["to"] ?? "vi") === "vi"
                    ? "selected"
                    : ""
            ?>
        >

            Vietnamese

        </option>


        <option
            value="en"

            <?=
                ($_POST["to"] ?? "") === "en"
                    ? "selected"
                    : ""
            ?>
        >

            English

        </option>

    </select>


    <br><br>


    <button type="submit">

        Translate

    </button>

</form>


<br>


<h3>Kết quả API:</h3>


<textarea
    rows="10"
    cols="60"
    readonly
><?= htmlspecialchars($result) ?></textarea>


</body>

</html>