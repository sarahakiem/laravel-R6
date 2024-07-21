<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    function login(){
        return view('login');
    }
    function data(request $request){
        return $request['email'] .'<br>'. $request['pwd'];
    }
    function link(){
        $url1 = route('v');
    $url2 = route('c');
    return "<a href='$url1'>go to welcome</a>
            <a href='$url2'>go to laravel22</a>";
    }
    function cv(){
        return view('cv');
    }
    function contact(){
        return view('contact');
    }
    function recieved(Request $request){
        //dd($request->all());
        $name = $request['name'];
        $email = $request->input('email');
        $subject = $request->input('subject');
        $message = $request->input('message');
        return " $name<br> $email<br> $subject<br> $message";
    }
}
