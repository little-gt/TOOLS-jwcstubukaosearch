<?php
session_start(); // 启动会话

if (!isset($_SESSION['results'])) {
    session_start(); //启动session会话
    $_SESSION['massage'] = '查询结果丢失，请重新查询';
    header('Location: ../action/error.php');
    exit;
}

$results = $_SESSION['results'];
unset($_SESSION['results']); // 清除会话中的结果数据

// 读取模板文件
$templatePath = '../templates/template2.html';

if (file_exists($templatePath)) {
    ob_start(); // 开始输出缓冲
    include $templatePath;
    $content = ob_get_clean(); // 获取缓冲区内容
    echo $content; // 输出内容
} else {
    echo "错误：无法加载模板文件";
}
?>