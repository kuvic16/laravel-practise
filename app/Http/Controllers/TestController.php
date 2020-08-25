<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

class TestController extends Controller
{

    /**
     * All dependency should here those are using in constructor
     */
    public function __construct()
    {
    }

    public function file()
    {
        return File::get(public_path('index.php'));
    }

    public function file1(File $file)
    {
        return $file::get(public_path('index.php'));
    }

    public function cache()
    {
        Cache::remember('foo', 60, function () {
            return 'foobar';
        });
        return Cache::get('foo');
    }
}
