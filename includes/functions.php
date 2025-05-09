<?php
session_start();
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/db.php';

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function isAdmin() {
    return isLoggedIn() && $_SESSION['role'] === 'admin';
}

function redirect($url) {
    header("Location: $url");
    exit();
}

function uploadImage($file, $folder) {
    $targetDir = UPLOAD_PATH . $folder . '/';
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    $fileName = uniqid() . '_' . basename($file['name']);
    $targetFile = $targetDir . $fileName;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
    // Validate file
    $check = getimagesize($file['tmp_name']);
    if ($check === false) {
        return false;
    }
    
    if ($file['size'] > 5000000) { // 5MB limit
        return false;
    }
    
    if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
        return false;
    }
    
    if (move_uploaded_file($file['tmp_name'], $targetFile)) {
        return $folder . '/' . $fileName;
    }
    return false;
}

function generateSlug($string) {
    $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($string));
    return trim($slug, '-');
}

function validateYouTubeEmbedCode($embed_code) {
    $pattern = '/<iframe[^>]+src=["\']https:\/\/www\.youtube\.com\/embed\/([a-zA-Z0-9_-]+)(\?[^"\']*)?["\']/i';
    return preg_match($pattern, $embed_code) === 1;
}

function makeCurlRequest($url, $method, $data, $key_id, $key_secret) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_USERPWD, "$key_id:$key_secret");
    
    if ($method === 'POST') {
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    }
    
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    curl_close($ch);
    
    if ($error) {
        file_put_contents('razorpay_log.txt', date('Y-m-d H:i:s') . ' - cURL Error: ' . $error . PHP_EOL, FILE_APPEND);
        return ['error' => true, 'message' => 'cURL error: ' . $error];
    }
    
    $result = json_decode($response, true);
    
    if ($http_code >= 200 && $http_code < 300) {
        return $result;
    }
    file_put_contents('razorpay_log.txt', date('Y-m-d H:i:s') . ' - API Error: ' . json_encode($result) . PHP_EOL, FILE_APPEND);
    return ['error' => true, 'message' => $result['error']['description'] ?? 'Unknown error'];
}
?>