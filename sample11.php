<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ファイル名</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="file">画像選択:</label>
        <input type="file" name="file" id="file" accept="image/*" required>
        <input type="submit" value="送信">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["file"])) {
        $file = $_FILES["file"];
        echo "<h2>アップロードされた画像:</h2>";
        echo "<p>ファイル名: " . htmlspecialchars($file["name"], ENT_QUOTES, 'UTF-8') . "</p>";
        echo "<p>ファイルタイプ: " . htmlspecialchars($file["type"], ENT_QUOTES, 'UTF-8') . "</p>";
        echo "<p>一時ファイル名: " . htmlspecialchars($file["tmp_name"], ENT_QUOTES, 'UTF-8') . "</p>";
        echo "<p>ファイルサイズ: " . htmlspecialchars($file["size"], ENT_QUOTES, 'UTF-8') . " bytes</p>";

        // 表示
        if ($file["error"] === UPLOAD_ERR_OK) {
            $image_path = $file["tmp_name"];
            $image_info = getimagesize($image_path);
            $image_mime = $image_info['mime'];

            // 画像を表示する
            echo "<h2>プレビュー:</h2>";
            echo "<img src='data:{$image_mime};base64," . base64_encode(file_get_contents($image_path)) . "' alt='アップロードされた画像'>";
        } else {
            echo "<p>エラーが発生しました。</p>";
        }
    }
    ?>
</body>
</html>