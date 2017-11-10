<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/11/10
 * Time: 8:54
 */

/**
 * debug 模式
 * 上线时，把 .env 中的 APP_DEBUG 设置为 false
 */

/**
 * http 异常
 * 页面准备 resources/view/errors/404.blade.php ,503.blade.php, 504.blade.php
 * 控制器调用页面：abort('504');
 */

/**
 * 日志记录
 * 前言
 *   设置模式与级别
 *   模式：single、daily、syslog、errorlog，其中 daily 是根据日期独立文件
 *   级别：debug、info、notice、warning、error、critical、alert
 * 配置文件 .env
 *   APP_LOG=daily
 *   APP_LOG_LEVEL=debug
 * 代码
 *   use Illuminate\Support\Facades\Log;
 *   Log::info('this is a info message');
 *   Log::info('array autochange to json', ['name'=>'mao', 'age'=>18]); //数组会被 json 化之后保存。
 */