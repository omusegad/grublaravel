<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Corporatemeals;
use App\Corporatesubscriptions;

class CorporatesubscriptionsmealsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $meals = Corporatemeals::all();
       return view('corporatesubscriptionmeals.index', compact('meals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subscriptions = Corporatesubscriptions::all();
        return view('corporatesubscriptionmeals.create', compact('subscriptions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'meal_image_ur'  =>  'required|image|mimes:jpeg,png,jpg,gif,svg',
        //     'meal_name'   => 'required',
        //     'description' => 'required',
        //     'description' => 'required',
        //     'inStock'     => 'required',
        //     'price'       => 'required'
        // ]);
   
         $file = $request->file('meal_image_ur');
         if($request->hasFile('meal_image_ur')){
              $filename = time() .'_'.$file.'_' . $file->getClientOriginalExtension();  // generate a new filename. getClientOriginalExtension() for the file extension
              $imagename = strtolower(str_replace(' ', '_',  $filename)); //remove spaces
              $paths =$file->storeAs('uploads', $imagename);

              dd($paths);
              
         }
        

        //store details to DB
         $data = Corporatemeals::create([
            'corporate_subscriptions_id' => $request['subscriptions_id'],
            'meal_name'        => $request['meal_name'],
            'meal_image_ur'    => $imagename,
            'description'      => $request['description'],
            'inStock'          => 'YES',
            'price'            => $request['price']
        ]);

        if($data){
            return redirect()->route( 'meals.create' )->with( [ 'message' => 'Meal Menu added succesfully']);
        }

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
