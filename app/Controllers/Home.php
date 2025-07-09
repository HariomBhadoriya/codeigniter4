<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('home');
    }
      public function index1()
    {
        return view('about');
    }
    // public function index2()
    // {
    //     return view('tutorials');
    // }

}
