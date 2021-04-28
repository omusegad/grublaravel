<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Deliveryservice;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores  = Store::all()->sortBy(['active','Inactive']);
        //dd($stores);
        return view('store.index',compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
;
        $services = Deliveryservice::all()->pluck('vService');
        return view('store.create',compact('services'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $all = $request->all();
        dd($all);
        $validation = $request->validate([
            'store_logo' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048'
        ]);


        //Get and generate file name for storage
        $getfile     = $validation['store_logo'];
        $store_name  = str_replace(' ', '', $request->input('store_name')); // remove space from string
        $filename    = $store_name . time() . '.' . $getfile->getClientOriginalExtension();
        $filepath    = $getfile->storeAs('photos', $filename);

        dd($filepath);

        //dd($request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
