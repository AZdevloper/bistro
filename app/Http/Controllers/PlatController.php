<?php

namespace App\Http\Controllers;

use App\Models\plat;
// use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PlatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // dd(plat::all());
         return view('home',[
            'plats'=> plat::all(),
         ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('plat/create');
    }
    public function __construct()
    {
        $this->middleware('auth');
        // return view('home', [
        //     'plats' => plat::all(),
        // ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $imageUrl = time().'.'.request()->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageUrl);
        $data = [
            'img' => $imageUrl,
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'meal_category_id' => $request->input('category_id'),
            'discretion' => $request->input('description'),
            'user_id'=>Auth::user()->id,
        ];
        $request->session()->flash('status','your new meal has added successfully !');
        plat::create($data);
        return redirect()->route('plats.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    //     dd(plat::find($id));
       
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $plat = plat::findOrfail($id);

        return view('plat.edit',[
            'plat'=>$plat
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $plat = plat::findOrfail($id);

        $imageUrl = time() . '.' . request()->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageUrl);

        $plat->name = $request->input('name');
        $plat->price = $request->input('price');
        $plat->meal_category_id = $request->input('category_id');
        $plat->img = $imageUrl;
        $plat->discretion = $request->input('description');

        $plat->save();

        $request->session()->flash('status', 'your new meal has updated successfully !');
        return redirect()->route('plats.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        $plat = plat::findOrfail($id);
        $plat->delete();

        $request->session()->flash('status', 'your new meal has updated successfully !');
        return redirect()->route('plats.index');
    }
}
