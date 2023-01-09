<?php

namespace App\Http\Controllers\Web\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{

    private $module   = '.home';
    private $langFile = 'web';

    public function index()
    {
        return view('web.home.index');
    }

}
