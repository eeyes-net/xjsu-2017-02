# 西安交通大学学生会官方网站

<http://www.xjsu1919.org/>

## 安装

* 要求`php >= 5.6.4`

1. 解压到服务器

2. `composer install`

3. 将`.env.example`复制一份到`.env`，并修改`.env`中的设置

4. 执行`php artisan migrate`

5. 将服务器根目录设置到`public/`文件夹，必须使用单独域名（`http://ip:port/`也可以）

6. 访问管理页面`http://www.xjsu1919.org/admin`，首次使用需注册管理员账户

7. 进入之后请及时关闭注册功能

## 说明

* 本项目使用`Laravel 5.4`作为开发框架

## 开发人员

* 产品：tsgyhwxh
* 视觉：WBJ
* 前端：Ganlv <https://github.com/ganlvtech>
* 后端：Ganlv <https://github.com/ganlvtech>

## LICENSE

[MIT license](http://opensource.org/licenses/MIT).

    The MIT License (MIT)
    
    Copyright (c) 2017 eeyes.net
    
    Permission is hereby granted, free of charge, to any person obtaining a copy
    of this software and associated documentation files (the "Software"), to deal
    in the Software without restriction, including without limitation the rights
    to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
    copies of the Software, and to permit persons to whom the Software is
    furnished to do so, subject to the following conditions:
    
    The above copyright notice and this permission notice shall be included in all
    copies or substantial portions of the Software.
