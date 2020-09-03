<?php

namespace App;

class Example
{

    protected $api_key;

    public function __construct($api_key)
    {
        $this->api_key = $api_key;
    }

    public function get()
    {
        dump('It works!');
    }

    public function handle()
    {
        dump('Custom facades!');
    }
}
