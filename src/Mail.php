<?php
/**
 * Created by PhpStorm.
 * User: chengxun
 * Date: 2018/7/6
 * Time: 14:04
 * GMAIL
 * 默认情况下，自己编写的发送gmail邮件程序因无法访问google帐号，导致不能成功发送邮件，解决办法：开启不安全应用访问权限。
 * 登入该网站https://www.google.com/settings/security/lesssecureapps ，并启用不够安全的应用访问权限，设备就可以正常发送邮件了。
 * 如账户事先开启了两步验证，则需要先关闭两步验证功能，才能开启上述功能。
 * 其他方法参看此链接http://www.ghacks.net/2014/07/21/gmail-starts-block-less-secure-apps-enable-access/
 */

namespace Email;

use PHPMailer;
class Mail
{
    private $_Config = [
        //各邮箱smtp服务器 以及支持的协议
        'Host' => [
            'qq' => 'smtp.qq.com',// SSL/TLS/ STARTTLS（TLS）
            'gmail' => 'smtp.gmail.com',// TLS/ STARTTLS（TLS）
            'foxmail' => 'smtp.exmail.qq.com',// SSL/TLS/ STARTTLS（TLS）
            'outlook' => 'smtp-mail.outlook.com',// STARTTLS（TLS）
            'yahoo' => 'smtp.mail.yahoo.com', // TLS/STARTTLS（TLS）
            '163' => 'smtp.163.com', // SSL/TLS
            'hotmail' => 'smtp.live.com', // STARTTLS（TLS）
            'icloud' => 'smtp.mail.me.com', // STARTTLS（TLS）
            'yandex' => 'smtp.yandex.ru', // SSL/TLS/STARTTLS（SSL/TLS）
            'gmx' => 'smtp.gmx.com', // TLS/STARTTLS
            'sina' => 'smtp.sina.com', // SSL/TLS/STARTTLS（SSL/TLS）
            'aol' => 'smtp.aol.com', // TLS／STARTTLS
            'rediff' => 'smtp.rediffmail.com', // SSL/TLS/STARTTLS（SSL/TLS）
        ],
        //对于ssl/tls加密，使用465端口
        //对于starttls 一般使用587端口
        'Port' => [
            'ssl' => 465,
            'tls' => 465,
            'starttls' => 587,
        ],
    ];
    public function __construct()
    {
    }

    public function send(){
        var_dump($this->_Config);
    }

    /**
     * @param $to
     * @param $title
     * @param $content
     * @return bool
     */
    public function sendMail($to,$title,$content){
        $mail = new PHPMailer();
        $mail->isSMTP();  //使用smtp鉴权方式发送邮件
        $mail->SMTPAuth=true; //smtp需要鉴权 这个必须是true
        $mail->Host = 'smtp.qq.com'; //链接qq域名邮箱的服务器地址
        $mail->SMTPSecure = 'ssl';//设置使用ssl加密方式登录鉴权
        $mail->Port = 465; //465//587
        $mail->CharSet = 'UTF-8';
        $mail->FromName = '';
        $mail->Username ='1769059514@qq.com';
        $mail->Password = 'iudtoaukbiroecag';
        $mail->From = '1769059514@qq.com';
        $mail->isHTML(true);
        $mail->addAddress($to,'中商溯源正品商城');
        $mail->Subject = $title;
        $mail->Body = $content;
        $status = $mail->send();
        //简单的判断与提示信息
        if($status) {
            return true;
        }else{
            return false;
        }
    }
}