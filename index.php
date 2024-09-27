<?php
// 设定查询关闭的时间
$cutoffDateTime = '2024-10-10 08:20:00';

// 当前时间
$currentDateTime = date('Y-m-d H:i:s');

// 检查当前时间是否超过了设定的时间
if ($currentDateTime > $cutoffDateTime) {
    header('Location: ./action/error.php?error=查询已关闭');
    exit;
}

// 读取模板文件
$templatePath = './templates/template1.html';

if (file_exists($templatePath)) {
    ob_start(); // 开始输出缓冲
    include $templatePath;
    $content = ob_get_clean(); // 获取缓冲区内容
    echo $content; // 输出内容
} else {
    echo "错误：无法加载模板文件";
}
?>