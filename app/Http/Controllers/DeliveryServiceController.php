<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deliveryservice;

class DeliveryServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Deliveryservice::all();
        //dd($services);
        return view('/deliveryservices/index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/deliveryservices/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'service_image' => 'required|image|mimes:jpeg,png,gif,svg|max:2048'
        ]);

        //check and get file name and form parth
        if($request->hasfile('service_image'))
         {
            $getfile      =  $validation['service_image'];
            $image_name   = str_replace(' ', '', $getfile); // remove space from string
            $filename     = strtolower($image_name . time() . '.' . $getfile->getClientOriginalExtension());
            $imagepathurl = $getfile->storeAs('photos', $filename);
         }

        Deliveryservice::create([
            'vService'      => request('service_name'),
            'iDisplayOrder' => request('display_order'),
            'vImage'        => $filename
        ]);

        return redirect('delivery_services')->with('success', 'Service Delivery added Seccesfully');

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
        $service = Deliveryservice::find($id);
        return view('/deliveryservices/edit',compact('service','id'));


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
        $service = Deliveryservice::find($id);
        $validation = $request->validate([
            'service_image' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048',
            'service_image' => 'required',
            'display_order' => 'required'

        ]);

        //check and get file name and form parth
        if($request->hasfile('service_image'))
         {
            $getfile      =  $validation['service_image'];
            $image_name   = str_replace(' ', '', $request->input('service_name')); // remove space from string
            $filename     = $image_name . time() . '.' . $getfile->getClientOriginalExtension();
            $imagepathurl = $getfile->storeAs('photos', $filename);
         }
         $service->vService = request('service_name');
         $service->iDisplayOrder = request('display_order');
         $service->vImage = $imagepathurl;

         //dd($service);
         $service->update();

        return redirect('delivery_services')->with('success', 'Service Delivery updated Seccesfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Deliveryservice::find($id);
         $service->delete();
         return redirect('delivery_services')->with('success', 'Service Delivery Deleted Seccesfully');
    }
}
