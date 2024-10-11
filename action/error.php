<?php
include '../config.php';

session_start(); // 启动会话

// 读取错误参数
if (!isset($_SESSION['massage'])) {
    $error = '数据传递丢失，请返回主页';
}else{
    $error = $_SESSION['massage'];
    unset($_SESSION['massage']); // 清除会话中的消息数据
}

// 读取模板文件
$templatePath = '../templates/error.html';

if (file_exists($templatePath)) {
    ob_start(); // 开始输出缓冲
    include $templatePath;
    $content = ob_get_clean(); // 获取缓冲区内容
    $content = str_replace('{{university_name}}', $universityName, $content); // 替换学校名称
    $content = str_replace('{{university_logo}}', $universityLogoURL, $content); // 替换学校校徽
    $content = str_replace('{{html_background}}', $htmlBackgroundURL, $content); // 替换页面背景
    $content = str_replace('{{error_message}}', $error, $content); // 替换错误信息
    echo $content;
} else {
    echo "错误：无法加载模板文件";
}
