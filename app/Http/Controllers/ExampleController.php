<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Car;

use Illuminate\Support\Facades\DB;

class ExampleController extends Controller
{
    public function about(){
     return view('about');
    }
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
    public function fileUpload(){

        return view('upload');
    }
    public function upload(Request $request){
        $file_extension = $request->image->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'assets/images';
        $request->image->move($path, $file_name);
        return 'Uploaded';
    }
    public function test(){
        //////////////////احدد ستيودنت معين find////////////////////////
      //dd(student::find(3)?->phone->phone_num);
      dd(DB::table('students')
      ->join('phones', 'phones.id', '=', 'students.phone_id')
      ->where('students.id', '=', 2)
      ->first());
    }
    // public function secTest(){
    //     dd(DB::table('cars')
    //   ->join('categories', 'categories.id', '=', 'cars.cat_id')
    //   ->where('students.id', '=', 11)
    //   ->first());

    // }
    
    }

