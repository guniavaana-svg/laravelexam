<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Dashboard\PostController as DashboardPostController;
use Illuminate\Http\Request;
use App\Http\Controllers\PostController;

class PageController extends Controller
{
    //ვქმნით ფუნქციას
    
    public function home(){
         return view('front.pages.home.index',[
            'title'=>'home',
         ]);
    }
    public function about(){
          return view('front.pages.about.index',[
            'title'=>'about'
          ]);
    }
    public function contact(){
        return view('front.pages.contact.index',[
            'title'=>'contact'
        ]);
    }
}
