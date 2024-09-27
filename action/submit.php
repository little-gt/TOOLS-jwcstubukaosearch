<?php
// 设置内容类型为JSON格式
header('Content-Type: application/json');

// 获取POST数据中的学生学号
$studentID = isset($_POST['studentID']) ? trim($_POST['studentID']) : '';

// 定义正则表达式来验证15位正整数
$pattern = '/^\d{15}$/';

// 验证学号是否为空或不符合格式
if (empty($studentID) || !preg_match($pattern, $studentID)) {
    session_start(); //启动session会话
    $_SESSION['massage'] = '请输入有效的15位正整数作为学号';
    header('Location: ../action/error.php');
    exit;
}

// CSV文件路径
$filePath = './data/data.csv';

// 初始化结果数组
$results = [];

// 打开CSV文件
if (($handle = fopen($filePath, "r")) !== FALSE) {
    // 读取标题行（如果有的话）
    $headers = fgetcsv($handle);

    // 逐行读取数据
    while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
        // 检查第一列（索引为0）是否为指定的学号
        if ($data[0] === $studentID) {
            // 将读取的数据转换为关联数组
            $rowData = array_combine($headers, $data);
            // 存储匹配的行数据
            $results[] = $rowData;
        }
    }

    fclose($handle); // 关闭文件句柄
}

if (empty($results)) {
    session_start(); //启动session会话
    $_SESSION['massage'] = '未找到匹配学号';
    header('Location: ../action/error.php');
    exit;
}

// 查询成功，重定向到结果页面并传递查询结果
session_start(); // 启动会话
$_SESSION['results'] = $results;
header('Location: ../action/result.php');
exit;
?>