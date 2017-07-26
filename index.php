<?php
header("Content-Type: application/json");
header('Access-Control-Allow-Origin:http://bg.suarez.com');

$returnData = [
    'success' => false,
    'url' => ''
];

$file = $_FILES['file_data'];
if (file_exists($file['tmp_name'])) {
    $filePath = '/home/vagrant/www/yo/img/upload/';
    $fileName = md5_file($file['tmp_name']) . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
    if (move_uploaded_file($file['tmp_name'], $filePath . $fileName)) {
        $returnData = [
            'success' => true,
            'url' => 'http://img.suarez.com/upload/' . $fileName
        ];
    }
}

echo json_encode($returnData);
exit;