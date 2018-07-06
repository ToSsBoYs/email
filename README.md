# email

> 基于phpmail的邮箱发送类

## 安装

> composer require tossboy/email dev-master

## 使用方法

```php
use Email\Mail;
$email = new Mail($config=[
            'email' => $email,
            'password' => $password,
            'host' => '163',//163 qq ....
        ]);
$status = $email->sendMail('xun0726@qq.com','数据库备份提醒',date('Y-m-d H:i:s',time()).'备份成功');
var_dump($status);//成功返回true 失败返回错误信息
```

