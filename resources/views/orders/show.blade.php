@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-6">
            <h5><strong>By</strong> : {{$orderbyid['vName'] }} {{$orderbyid['vLastName'] }} </h5>
        </div>
    </div> 
    <div class="container">
    <div class="row"> 
        <div class="col-6">
            <table class="table" class="table table-condensed table-striped table-bordered">
            <thead>
               
            </thead>
            <tbody>
            <tr>
                <td> <strong> Store : </strong> </td>
                <td>  {{ $orderbyid['vCompany'] }} <br> {{ $orderbyid['vCaddress']}}</td>
                </tr>
                <tr>
                <td> <strong> Email : <strong></td>
                <td> {{$orderbyid['vUserEmail'] }}</td>
                </tr>
                <tr>
                <td> <strong> Phone : </strong> </td>
                <td>  {{ $orderbyid->customer['vPhone'] }} </td>
                </tr>
                <tr>
                <td> <strong> Order ID : <strong></td>
                <td>  {{$orderbyid['vOrderNo'] }} </td>
                </tr>
                <tr>
                <td> <strong>  Payment : </strong> </td>
                <td> {{$orderbyid['ePaymentOption'] == 'Cash' ? 'Cash' : 'Mpesa' }} </td>
                </tr>
                <tr>
                <td><strong>Status</strong></td>
                <td>
                 <span  class="bg-warning  p-2 rounded-pill text-black"> 
                    <strong> {{ $orderbyid->orderstatus['vStatus'] }} </strong>
                </span>
                  
                </td>
                </tr>
                
            </tbody>
            </table>
        </div>
        <div class="col-6 card">
            <div class="timehead card-header bg-warning">
                <h5>Delivery Timeline</h5>
            </div>
			<ul class="timeline">
				<li>
					{{-- <h6>Placed On: {{ $orderbyid->orderlogs['iStatusCode'] }}</h6> --}}
				
				</li>
				<li>
					<a href="#">21 000 Job Seekers</a>
					<a href="#" class="float-right">4 March, 2014</a>
					<p>Curabitur purus sem, malesuada eu luctus eget, suscipit sed turpis. Nam pellentesque felis vitae justo accumsan, sed semper nisi sollicitudin...</p>
				</li>
				<li>
					<a href="#">Awesome Employers</a>
					<a href="#" class="float-right">1 April, 2014</a>
					<p>Fusce ullamcorper ligula sit amet quam accumsan aliquet. Sed nulla odio, tincidunt vitae nunc vitae, mollis pharetra velit. Sed nec tempor nibh...</p>
				</li>
			</ul>
        </div>
    </div>
   </div>
@endsection
