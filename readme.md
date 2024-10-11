## 系统介绍

本社会公益软件基于PHP+csv轻量化设计，基于MIT协议授权，
亮点：
1. 前后端分离设计，易于维护和嵌入到相关系统当中；
2. 使用csv文件作为数据源而非MySQL，允许直接将方正教务系统软件导出.xlsx名单，直接另存为.csv文件使用；
3. 使用更多最新的技术特性，学校使用后，在新技术的生命周期内几乎不需要维护本项目的源代码；
4. 支持各种个性化设置。

## 代码申明

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

## 系统预览

[![pAYZigH.png](https://s21.ax1x.com/2024/10/11/pAYZigH.png)](https://imgse.com/i/pAYZigH)
[![pAYZFvd.png](https://s21.ax1x.com/2024/10/11/pAYZFvd.png)](https://imgse.com/i/pAYZFvd)
[![pAYZP8e.png](https://s21.ax1x.com/2024/10/11/pAYZP8e.png)](https://imgse.com/i/pAYZP8e)

## 特别注意

请务必修改网站的配置文件，添加下面*示例的*禁止访问规则，请根据具体使用目录，修改禁止访问的目录位置，防止源数据被下载

```
    // 设置禁止访问数据源目录
    location ^~ /path/to/bukaochaxun/action/data/ {
        return 400;
    }
```

## 使用方法

#### 1. 设置系统个性化参数

打开“config.php”，设置变量`$cutoffDateTime`为关闭查询系统的时间，注意，如果是2024年9月9日，**不能写为**“2024-9-9”，需要补全为“2024-09-09”。**时间也是同理。**

``` php
// 设定查询关闭的时间
$cutoffDateTime = '2024-09-10 08:20:00';

// 当前时间
$currentDateTime = date('Y-m-d H:i:s');
```

#### 2. 更新补考的数据源

> 更新“/action/data/”下的“data.csv”文件，csv表头必须是教务处系统导出的默认表头，即“学号,姓名,行政班,课程代码,课程名称,学分,课程性质,总评成绩,任课教师,考试性质,考试具体时间,考试地点,计数”，如果数据不全，会报错！

[![pAlyd5F.png](https://s21.ax1x.com/2024/09/27/pAlyd5F.png)](https://imgse.com/i/pAlyd5F)

首先打开导出的数据excel表格，选择另存为，保存为csv，最后重命名为“data.csv”，覆盖示例的数据文件即可。
