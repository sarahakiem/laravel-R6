<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clacss;

class ClacssController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $class=Clacss::get();
        return view('classes',compact('class'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_class');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $className='math';
        // $capacity=15;
        // $is_fulled=true;
        // $price=33.3;
        // $time_from='8:00:00';
        // $time_to='12:00:00';
        // $published=false;

        // Clacss::create([
        // 'className'=>$className,
        // 'capacity'=>$capacity,
        // 'is_fulled'=>$is_fulled,
        // 'price'=>$price,
        // 'time_from'=>$time_from,
        // 'time_to'=>$time_to,
        // 'published'=>$published
        // ]
        // );

        Clacss::create([
            'className' => $request['className'],
            'capacity' => $request['capacity'],
            'is_fulled' => $request->boolean('is_fulled'),
            'price' => $request['price'],
            'time_from' => $request['time_from'],
            'time_to' => $request['time_to'],
            'published' => $request->boolean('published')
        ]);
        //return "data saved sussesfully";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $classes=Clacss::findOrfail($id);
        return view('edit_class',compact('classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
