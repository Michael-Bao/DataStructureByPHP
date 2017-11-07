<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/11/6
 * Time: 17:31
 */
namespace App\Http\Controller;

use Illuminate\Http\Request;
use Mail;


class WebController extends Controller
{
    public function mail()
    {
        $message = '很高兴的通知您，您的账号 %s 于 $s 已激活，请查收。';
        $message = sprintf($message, 'xxee', '2017-09-19');

        Mail::raw($message, function($mail) {
            $mail->from('xinmao_lu@163.com', 'Muk');
            $mail->subject('邮件主题 测试');
            $mail->to('553291403@qq.com');
        });
    }
}

/*MAIL_DRIVER=smtp
MAIL_HOST=smtp.163.com
MAIL_PORT=465
MAIL_USERNAME=xi****u@163.com
MAIL_PASSWORD=xi****3
MAIL_ENCRYPTION=ssl*/