<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //ვქმნით ფუნქციას
    public function home(){
         return view('front.pages.home.index',[
            'title'=>'home'
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
