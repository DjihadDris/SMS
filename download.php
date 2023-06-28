<?php
// Folder path
$folderPath = 'Reader';

// Create a new ZIP archive
$zip = new ZipArchive();

// Create a temporary file for the ZIP archive
$zipFileName = tempnam(sys_get_temp_dir(), 'SMS');
$zip->open($zipFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE);

// Add files and subdirectories to the ZIP archive
$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($folderPath),
    RecursiveIteratorIterator::LEAVES_ONLY
);

foreach ($files as $name => $file) {
    if (!$file->isDir()) {
        $filePath = $file->getRealPath();
        $relativePath = substr($filePath, strlen($folderPath) + 1);
        $zip->addFile($filePath, $relativePath);
    }
}

// Close the ZIP archive
$zip->close();

// Set the appropriate headers for the download
header('Content-Type: application/zip');
header('Content-Disposition: attachment; filename="SMS.zip"');
header('Content-Length: ' . filesize($zipFileName));

// Send the ZIP file to the browser
readfile($zipFileName);

// Delete the temporary ZIP file
unlink($zipFileName);
?>
