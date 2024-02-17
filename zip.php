<?php
// Fonksiyon: Dizini tarayıp dosya ve klasörleri listeler
function listFiles($dir) {
    $files = scandir($dir);
    $files = array_diff($files, array('.', '..'));
    return $files;
}

// Fonksiyon: Belirtilen dosyaları zip olarak indirir
function downloadFiles($files) {
    $zip = new ZipArchive();
    $zipName = 'files.zip';
    if ($zip->open($zipName, ZipArchive::CREATE) === TRUE) {
        foreach ($files as $file) {
            $filePath = realpath($file);
            if(is_file($filePath)) {
                $zip->addFile($filePath, basename($filePath));
            } elseif(is_dir($filePath)) {
                $dirName = basename($filePath);
                $zip->addEmptyDir($dirName);
                $filesInDir = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($filePath), RecursiveIteratorIterator::LEAVES_ONLY);
                foreach ($filesInDir as $fileInDir) {
                    if (!$fileInDir->isDir()) {
                        $relativePath = substr($fileInDir->getPathname(), strlen($filePath) + 1);
                        $zip->addFile($fileInDir->getPathname(), $dirName . '/' . $relativePath);
                    }
                }
            }
        }
        $zip->close();
        header("Content-type: application/zip");
        header("Content-Disposition: attachment; filename=$zipName");
        readfile($zipName);
        unlink($zipName); // Zip dosyasını sildikten sonra
        exit;
    } else {
        echo "Zip dosyası oluşturulamadı.";
    }
}

// Ana işlem
if(isset($_GET['dir'])) {
    $currentDir = $_GET['dir'];
} else {
    $currentDir = __DIR__; // Varsayılan olarak bu dosyanın bulunduğu dizin
}

if(isset($_GET['action']) && $_GET['action'] == 'download') {
    $files = $_GET['files'];
    downloadFiles($files);
}

$files = listFiles($currentDir);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Manager</title>
</head>
<body>
    <h1>File Manager</h1>
    <h2>Current Directory: <?php echo $currentDir; ?></h2>
    <ul>
        <?php foreach($files as $file): ?>
            <li>
                <?php if(is_dir($currentDir.'/'.$file)): ?>
                    <a href="?dir=<?php echo $currentDir.'/'.$file; ?>"><?php echo $file; ?></a>
                <?php else: ?>
                    <?php echo $file; ?>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
    <form action="" method="get">
        <input type="hidden" name="action" value="download">
        <input type="hidden" name="dir" value="<?php echo $currentDir; ?>">
        <label for="files">Select files to download:</label><br>
        <select name="files[]" id="files" multiple>
            <?php foreach($files as $file): ?>
                <option value="<?php echo $currentDir.'/'.$file; ?>"><?php echo $file; ?></option>
            <?php endforeach; ?>
        </select><br>
        <button type="submit">Download Selected Files</button>
    </form>
</body>
</html>
