<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/11/10
 * Time: 9:01
 */
/**
 * 配置 .env QUEUE_DRIVER=database
 * 步骤：
 *   1.迁移数据表
 *     php artisan queue:table
 *     php artisan migrate
 *
 *   2.编写任务类
 *     php artisan make:job SendEmail
 *     app/Jobs/SendEmail.php
 *         public function __construct($email){}
 *         public function handle(){}
 *
 *   3.推送任务到队列
 *     app/Http/Controller/WebController.php
 *         public function do() {
 *             dispatch(new SendEmail($email));
 *             //$job = (new SendEmail($email))->onQueue('vip')->delay(20);
 *             //dispatch($job);
 *         }
 *
 *   4.运行队列监听器
 *     php artisan queue:listen;//queue:work;
 *
 *   5.处理失败的任务
 *     php artisan queue:failed-table //新建失败任务数据表，用于保存失败任务
 *     php artisan queue:failed //展示失败任务
 */