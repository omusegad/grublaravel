<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Corporatesubscriptions;

class CorporatesubscriptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriptions = Corporatesubscriptions::with('corporatemeals')->get()->toArray();
        return view('corporatesubscriptions.index', compact('subscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('corporatesubscriptions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'subscription_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

         // get custom upload image name $ remove spaces iin image name 
         $custom_file_name = $request['subscription_name'].'-'.time().'-'.$request->file('subscription_image')->getClientOriginalName();
         $completeImageName = strtolower(str_replace(' ', '-',  $custom_file_name));
         $path = strtolower($request->file('subscription_image')->storeAs('uploads',$completeImageName));

        //store details to DB
        Corporatesubscriptions::create([
            'subscriptions_name'      => $request['subscription_name'],
            'subscriptions_image_url' => $path,
            'email'                   => $request['email'],
            'phoneNumber'             => $request['phoneNumber'],
            'location'                => $request['subscription_location'],
            'locationLat'             => '',
            'locationLong'            => ''
        ]);

        // if ($data) {
        //     return redirect()->route('corporatesubscriptions.create')->with(['message' => 'Subscription created Successfully']);
        // }
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Cooporategrub::find($id);
        return $data;
        return view('corporate.edit');
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
