<?php
// Fonksiyon: Belirtilen dosyaları zip olarak oluşturur ve indirme bağlantısını döndürür
function createZipAndReturnDownloadLink($files) {
    $zip = new ZipArchive();
    $zipName = 'files.zip';
    if ($zip->open($zipName, ZipArchive::CREATE) === TRUE) {
        foreach ($files as $file) {
            $filePath = realpath($file);
            if(is_file($filePath)) {
                $zip->addFile($filePath, basename($filePath));
            } elseif(is_dir($filePath)) {
                $dirName = basename($filePath);
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
        return $zipName;
    } else {
        echo "Zip dosyası oluşturulamadı.";
        return false;
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
    $zipFile = createZipAndReturnDownloadLink($files);
    if ($zipFile) {
        header("Content-type: application/zip");
        header("Content-Disposition: attachment; filename=$zipFile");
        readfile($zipFile);
        unlink($zipFile); // Zip dosyasını sildikten sonra
        exit;
    }
}

$files = array_diff(scandir($currentDir), array('.', '..'));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Manager</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <h1>File Manager</h1>
    <h2>Current Directory: <?php echo $currentDir; ?></h2>
    <ul id="fileList">
        <?php foreach($files as $file): ?>
            <li>
                <?php if(is_dir($currentDir.'/'.$file)): ?>
                    <a class="dirLink" href="#" data-dir="<?php echo $currentDir.'/'.$file; ?>"><?php echo $file; ?></a>
                <?php else: ?>
                    <?php echo $file; ?>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
    <form id="downloadForm" action="" method="get">
        <input type="hidden" name="action" value="download">
        <input type="hidden" name="dir" value="<?php echo $currentDir; ?>">
        <label for="files">Select files to download:</label><br>
        <select name="files[]" id="files" multiple>
            <?php foreach($files as $file): ?>
                <option value="<?php echo $currentDir.'/'.$file; ?>"><?php echo $file; ?></option>
            <?php endforeach; ?>
        </select><br>
        <button id="downloadBtn" type="button">Download Selected Files</button>
    </form>
    <script>
        $(document).ready(function(){
            $('.dirLink').click(function(e){
                e.preventDefault();
                var dir = $(this).data('dir');
                $.get('index.php?dir=' + dir, function(data){
                    $('#fileList').html(data);
                    $('#downloadForm input[name="dir"]').val(dir);
                    $('#downloadForm select[name="files[]"]').html('');
                    $('#downloadForm button[type="submit"]').prop('disabled', true);
                });
            });

            $('#files').change(function(){
                $('#downloadForm button[type="submit"]').prop('disabled', $(this).val() == null);
            });

            $('#downloadBtn').click(function(){
                var selectedFiles = $('#files').val();
                if(selectedFiles && selectedFiles.length > 0) {
                    $('#downloadForm').submit();
                    $(this).prop('disabled', true).text('Downloading...');
                }
            });
        });
    </script>
</body>
</html>
