<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/11/7
 * Time: 11:36
 */
use Illuminate\Support\Facades\Cache;

class WebController extends Controller
{

    public function cache1()
    {
        Cache::put('key1', 'val1', 10);
        Cache::forever('key2', 'val2');

        $bool = Cache::add('key3', 'val3', 10);

        var_dump($bool);
    }

    public function cache2()
    {
        if (Cache::has('key2')) {
            echo 'yes';
        } else {
            echo 'no';
        }

        $key1 = Cache::get('key1');
        $key2 = Cache::pull('key2');

        $bool = Cache::forget('key2');

        var_dump($bool);
    }
}

/*
 * config/cache.php
 *   'default' => env('CACHE_DRIVER', 'file'),
 *   'stores' => [
       'file' => [
         'driver' => 'file',
         'path' => storage_path('framework/cache/data'),
       ],

      'redis' => [
        'driver' => 'redis',
        'connection' => 'default',
      ],
     ],
 */


