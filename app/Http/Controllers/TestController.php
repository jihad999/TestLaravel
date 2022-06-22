<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        dd('TestController.index()');
    }
    public function test($id)
    {
        dump($id);
        dd('TestController.test()');
    }
}
