## 系统介绍

学校原本使用的学生补考查询系统的界面设计比较简陋，在更换新的教务处网站以后无法适配新的现代化界面设计，而且使用的SQL和方法比较老旧，不方便教务处老师操作。于是重新开发了轻量化设计的补考信息查询系统。

## 系统预览

[![pAlyRUO.png](https://s21.ax1x.com/2024/09/27/pAlyRUO.png)](https://imgse.com/i/pAlyRUO)
[![pA3EoFJ.png](https://s21.ax1x.com/2024/09/30/pA3EoFJ.png)](https://imgse.com/i/pA3EoFJ)

## 特别注意

请务必修改网站的配置文件，添加下面*示例的*禁止访问规则，请根据具体使用目录，修改禁止访问的目录位置，防止源数据被下载

```
    // 设置禁止访问数据源目录
    location ^~ /path/to/bukaochaxun/action/data/ {
        return 400;
    }
```

## 使用方法

#### 1. 设置系统关闭时间

打开“index.php”，设置变量`$cutoffDateTime`为关闭查询系统的时间，注意，如果是2024年9月9日，**不能写为**“2024-9-9”，需要补全为“2024-09-09”。**时间也是同理。**

``` php
// 设定查询关闭的时间
$cutoffDateTime = '2024-09-10 08:20:00';

// 当前时间
$currentDateTime = date('Y-m-d H:i:s');
```

#### 2. 更新补考数据源

> 更新“/action/data/”下的“data.csv”文件，csv表头必须是教务处系统导出的默认表头，即“学号,姓名,行政班,课程代码,课程名称,学分,课程性质,总评成绩,任课教师,考试性质,考试具体时间,考试地点,计数”，如果数据不全，会报错！

[![pAlyd5F.png](https://s21.ax1x.com/2024/09/27/pAlyd5F.png)](https://imgse.com/i/pAlyd5F)

首先打开导出的数据excel表格，选择另存为，保存为csv，最后重命名为“data.csv”，覆盖示例的数据文件即可。
