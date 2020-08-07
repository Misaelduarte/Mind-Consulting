<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Page;
use App\User;

class HomeController extends Controller
{
    public function index() {
        return view('site.home');
    }
}
