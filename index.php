<?php
/*
    Copyright Statement

    Developer: Huang Deyong (GitHub: @little-gt)
    License: MIT Agreement

    Project created on 9/27/2024. The name “Academic Affairs Office of Southwest University” used in
    the creation of the project is only an example. According to the Statement of Technical Communication,
    it is hereby emphasized that “The source code of this technical communication is intended to promote
    information sharing and technical discussion among the participants, and is only used for non-commercial
    purposes of technical research and study. The opinions, conclusions, and any technical recommendations in
    the Technical Communication Source Code do not represent the opinions or positions of any unit, organization,
    or individual mentioned in the text. All content is based on information available at the time of writing
    and may be updated at any time without notice.” .
 */

include './config.php';

// 检查当前时间是否超过了设定的时间
if ($currentDateTime > $cutoffDateTime) {
    session_start(); //启动session会话
    $_SESSION['massage'] = '已过查询时间，禁止继续查询';
    header('Location: ./action/error.php');
    exit;
}

// 读取模板文件
$templatePath = './templates/template1.html';

if (file_exists($templatePath)) {
    ob_start(); // 开始输出缓冲
    include $templatePath;
    $content = ob_get_clean(); // 获取缓冲区内容
    $content = str_replace('{{university_name}}', $universityName, $content); // 替换学校名称
    $content = str_replace('{{university_logo}}', $universityLogoURL, $content); // 替换学校校徽
    $content = str_replace('{{html_background}}', $htmlBackgroundURL, $content); // 替换页面背景
    echo $content; // 输出内容
} else {
    echo "错误：无法加载模板文件";
}