<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\trait\common;

class ProductController extends Controller
{     use common;
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $products = Product::latest()->take(3)->get();
        // $products = Product::where('products', 1)
        //             ->orderBy('order', 'asc')
        //             ->take(3)
        //             ->get();

        return view ('index_fashion',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    
    $data = $request->validate([
        'image' => 'required|image|mimes:png,jpg,jpeg,gif|max:2024',
        'title' => 'required|string|max:15',
        'price' => 'required|numeric',
        'short_description' => 'required|string|max:100',
        
    ]);

    
    $data['image'] = $this->uploadFile($request->image, 'assets/images');

    
    $data['published']= isset($request->published);

    
    Product::create($data);

    
    return 'Data uploaded successfully';
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
