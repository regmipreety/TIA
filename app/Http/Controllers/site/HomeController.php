<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\site\Home;

class HomeController extends Controller
{
    public function index(){
        return view('site.home');
    }
}
