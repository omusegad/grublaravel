<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Corporatemealsweekly;
use App\Corporatesubscriptiongroups;
use App\Customer;
use Carbon\Carbon;
use App\Corporatemeals;
class CorporateordersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $orders = Corporatemealsweekly::with('group:reference_code,subscription_group_name,location','customer:iUserId,vName,vLastName,vPhone','meals:id,meal_name')->orderBy('created_at', 'ASC')->get()->toArray();
       //dd($orders);

       $today = Carbon::now()->format('Y-m-d');
       $tommorrow =Carbon::tomorrow()->format('Y-m-d');
       $tommorrowAddOne   = Carbon::tomorrow()->addDay(1)->format('Y-m-d');
       $tommorrowAddTwo   = Carbon::tomorrow()->addDay(2)->format('Y-m-d');
       $tommorrowAddThree = Carbon::tomorrow()->addDay(3)->format('Y-m-d');
       $tommorrowAddFour  = Carbon::tomorrow()->addDay(4)->format('Y-m-d');
       $tommorrowAddFive  = Carbon::tomorrow()->addDay(5)->format('Y-m-d');
       return view('corporateorders.index', compact('orders','today','tommorrow','tommorrowAddOne','tommorrowAddTwo','tommorrowAddThree','tommorrowAddFour','tommorrowAddFive'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
