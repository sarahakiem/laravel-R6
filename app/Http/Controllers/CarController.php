<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\trait\common;

class CarController extends Controller
{   use common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get all cars from data
        //return view all cars data
        //select*from cara->Car::get();
        $cars =Car::get();
        return view ('cars',compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_car');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        // $carTable= "mercides";
        // $description= "dsgh";
        // $price=666;
        // $published=true;
        $data=$request->validate([
            'carTable' => 'required|string',
            'description'=>'required|string|max:100',
            'price'=>'required|numeric',
            'image'=>'required|image|mimes:png,jpg,jpeg,gif|max:2024'
        ]);

        $data['published']= isset($request->published);

        $data['image']=$this->uploadFile($request->image,'assets/images');
        

        Car::create($data);
        

        
        return 'Uploaded succesfuly';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car=Car::findOrfail($id);
        
        return view('car_details',compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //return"the car id is ".$id;
        ////select *from cars
        $car=Car::findOrfail($id);
        ////compact////send data to a view
        return view('edit_car',compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request,$id);
        $data=$request->validate([
            'carTable' => 'required|string',
            'description'=>'required|string|max:100',
            'price'=>'required|numeric',
            'image'=>'nullable|image|mimes:png,jpg,jpeg,gif|max:2024'
        ]);
        // $car=Car::findOrfail($id);
        // $car->carTable = $request->name;
        // $car->description = $request->content;
        // $car->price = $request->name;
        $data['published']= isset($request->published);
        // if($request['image']=='true'){
        // $file_extension = $request->image->getClientOriginalExtension();
        // $file_name = time() . '.' . $file_extension;
        // $path = 'assets/images';
        // $request->image->move($path, $file_name);
        // $data['image']=$file_name;
        // }
        if($request->hasFile('image')){
            $data['image']=$this->uploadFile($request->image,'assets/images');
        }

        
        car::where('id',$id)->update($data);
        return 'Uploaded succesfuly';
        //  return redirect()->route('cars.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        car::where('id',$id)->delete();
        return redirect()->route('cars.index');
    }
    
    
    public function ShowDeleted(){

        $cars=Car::onlyTrashed()->get();
        return view('trashed_cars',compact('cars'));
    }
    /////////////////restore deleted record //////////////////////////////
    public function restore(string $id){
        Car::where('id',$id)->restore();
        return redirect()->route('cars.index');

    }
    ///////////////////Force delete ////////////////////////////////////
    public function forceDelete(string $id)
    {
        car::where('id',$id)->forceDelete();
        return redirect()->route('cars.index');
    }

}
