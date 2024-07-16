<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    function login(){
        return view('login');
    }
    function cv(){
        return view('cv');
    }
    function contact(){
        return view('contact');
    }
    function recieved(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $subject = $request->input('subject');
        $message = $request->input('message');
        return " $name<br> $email<br> $subject<br> $message";
    }
}
