<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class WebController extends Controller
{
    public function upload(Request $request)
    {
        if (!$request->isMethod('POST')) {
            return view('web.upload');
        }

        $file = $request->file('source');

        //是否上传成功
        if (!$file->isValid()) {
            exit;
        }

        //原文件名
        $originalName = $file->getClientOriginalName();
        //扩展名
        $ext = $file->getClientOriginalExtension();
        //MimeType
        $type = $file->getClientMimeType();
        //临时绝对路径
        $realPath = $file->getRealPath();

        $filename = date('Y-m-d-H-i-s') . $originalName . '.' .$ext;
        //$filename = date('Y-m-d-H-i-s') . uniqid() . '.' .$ext;

        //uploads 是 config/filesystems 下的 disk 的配置
        $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));

        var_dump($bool);
    }
}


/*
 * config/filesystem.php
 *   'default' => env('FILESYSTEM_DRIVER', 'local'),
     'disks' => [
          'uploads' => [
              'driver' => 'local',
              'root' => storage_path('app/uploads'),//保存到 storage/app/uploads 下
          ],
      ],
 */