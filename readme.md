# mnnu-libaray
## 简介
一个简单的图书管理系统，包括了图书的借阅、编辑、创建、删除 和 用户的创建、评论管理等功能，使用了 laravel 5.0 框架。

## 下载
```
git clone https://github.com/zhangxiangliang/mnnu-libaray.git
```

## 安装

### 配置文件
* 复制一份 .env.example 文件，并重命名为 .env 。
* 在命令行中使用 php artisan key:generate 生成项目密钥，并填入 .env 的 APP_KEY 。
* 在 .env 开启或关闭 APP_DEBUG。

### 基本配置
* nginx / apache 的入口文件为 public/index.php
* storage 文件需要有写入权限

### 数据库
* 创建数据库，并导入数据库文件 database 目录下的 database.sql 。
* 数据库的地址填入 .env 中的 DB_HOST 。
* 数据库的名称填入 .env 中的 DB_DATABASE 。
* 数据库的用户名填入 .env 中的 DB_USERNAME 。
* 数据库的用户密码填入 .env 中的 DB_PASSWORD 。

### 邮箱配置
由于在密码找回的功能上使用了邮箱找回功能，所以需要使用到带有 `smtp` 功能的邮箱，这里推荐使用 163 邮箱。
* 邮箱的地址填入 .env 中的 MAIL_HOST。
* 邮箱的端口填入 .env 中的 MAIL_PORT。
* 邮箱的用户名填入 .env 中的 MAIL_USERNAME。
* 邮箱的用户密码填入 .env 中的 MAIL_PASSWORD，可以使用 163 邮箱的安全码。

## 使用

### 用户
项目默认设置了 老师 、 学生 和 管理员 三种用户角色。并提供了几个默认的账户。
#### 老师
账户 | 密码
----|----
teacher@taroball.net | 123456

#### 学生
账户 | 密码
----|----
xiaoer@taroball.net | 123456
xiaosi@taroball.net | 123456

#### 管理员
账户 | 密码
----|----
super@taroball.net | 123456
