<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/11/10
 * Time: 9:24
 */

/**
 * 注册：
 *   app/Providers/EventServiceProvider.php
 *       protected $listen = [
 *           'App\Events\WelcomeEmail' => [
 *               'App\Listeners\WelcomeEmailEventListener'
 *           ]
 *       ]
 *
 * 生成：
 *   php artisan event:generate
 *
 * 代码：
 *   app\Events\WelcomeEmail.php
 *       public function event() {
 *           //event(new WelcomeEmail($user));
 *           Event::fire(new WelcomeEmail($user));
 *       }
 *   app\Listeners\WelcomeEmailEventListener.php
 *       public fucntion handle(WelcomeEmail $event) {
 *           $user = $event->user;
 *           dispatch(new SendEmail($user));
 *       }
 *   app\Jobs\SendEmail.php
 *       public function handle(){
 *           $email = $this->email;
 *           Mail::raw('队列测试', function ($message) use ($email) {
 *               $message->from('xx');
 *               $message->subject('xxx');
 *               $message->to('xxx');
 *           });
 *       }
 */
