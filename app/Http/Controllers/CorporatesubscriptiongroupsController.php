<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Corporatesubscriptiongroups;
use App\Imports\TemporaryImports;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\CorporateTempUsers;
class CorporatesubscriptiongroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Corporatesubscriptiongroups::with('corporatesubscriptions:id,subscriptions_name')->get()->toArray();
        //return $groups;
        return view('corporatesubscriptiongroups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('corporatesubscriptiongroups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cooporategroups $Cooporategroups)
    {

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

    public function importusers(Request $request)
    {
       $reference_code = $request->input('reference_code');
       $groupName = $request->input('subscription_group_name');
       $users = Excel::toArray(new TemporaryImports, $request->file('uploaded_users'));
       foreach($users[0] as $user){
        CorporateTempUsers::where('id',$user[0])->updateOrCreate([
            'reference_code' => $reference_code,
            'groupName'    => $groupName,
            'fname'        =>$user[0] ? $user[0] : '',
            'lname'        =>$user[1] ? $user[1] : '',
            'phoneNumber'  =>$user[2] ? $user[2] : '',
            'email'        =>$user[3] ? $user[3] : '',
        ]);

       }
         return redirect()->back()->with('success', ['Corporate users upload successful']);

       //return $array;
    }


}
