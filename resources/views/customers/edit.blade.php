@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-6">
            <h5>Order Details</h5>
        </div>
         <div class="col-6 text-right">
            <h6>Customer : {{$orderbyid['vName'] }} {{$orderbyid['vLastName'] }}</h6>
        </div>
    </div> 
    <div class="container">
     <div class="row"> 
         <div class="col-12">
             
         </div>
     </div>
   </div>
@endsection
