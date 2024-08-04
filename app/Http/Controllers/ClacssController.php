<?php

namespace App\Http\Controllers;

use App\Models\Clacss;
use Illuminate\Http\Request;

class ClacssController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $class = Clacss::get();
        return view('classes', compact('class'));
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
        $data = $request->validate([
            'className' => 'required|string',
            'capacity' => 'required|numeric|max:30',
            'price' => 'required|numeric|max:200',
            'time_from' => 'required',
            'time_to' => 'required',
        ]);
        $data['published'] = isset($request->published);
        $data['is_fulled'] = isset($request->is_fulled);
        Clacss::create($data);
        return redirect()->route('clas');

        // Clacss::create([
        //     'className' => $request['className'],
        //     'capacity' => $request['capacity'],
        //     'is_fulled' => $request->boolean('is_fulled'),
        //     'price' => $request['price'],
        //     'time_from' => $request['time_from'],
        //     'time_to' => $request['time_to'],

        //     'published' => $request->boolean('published')
        // ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $classes = Clacss::findOrFail($id);
        return view('classes_details', compact('classes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $classes = Clacss::findOrfail($id);
        return view('edit_class', compact('classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    { //dd($request,$id);
        $data = $request->validate([
            'className' => 'required|string',
            'capacity' => 'required|numeric|max:30',
            'price' => 'required|numeric|max:200',
            'time_from' => 'required',
            'time_to' => 'required',
        ]);
        $data['published'] = isset($request->published);
        $data['is_fulled'] = isset($request->is_fulled);

        Clacss::where('id', $id)->update($data);
        return redirect()->route('clas');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        Clacss::where('id', $id)->delete();

        return redirect()->route('clas');

    }

    //show deleted record
    public function showDeletedClasses()
    {
        $class = Clacss::onlyTrashed()->get();
        return view('trashed_classes', compact('class'));

    }
    //////////Restore deleted/////////////////
    public function restore(string $id)
    {
        Clacss::where('id', $id)->restore();
        return redirect()->route('classes.trashed');
    }
    ///////////////////   permenant delete   ///////////////////
    public function forceDelete(string $id)
    {
        Clacss::where('id', $id)->forceDelete();
        return redirect()->route('classes.trashed');
    }

}
