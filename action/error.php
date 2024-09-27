<?php
// 读取错误参数
$error = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : '';

// 读取模板文件
$templatePath = '../templates/error.html';

if (file_exists($templatePath)) {
    ob_start(); // 开始输出缓冲
    include $templatePath;
    $content = ob_get_clean(); // 获取缓冲区内容
    echo str_replace('{{error}}', $error, $content); // 替换模板中的占位符
} else {
    echo "错误：无法加载模板文件";
}
?>