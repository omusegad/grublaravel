@extends('layouts.main')

@section('content')
    <div class="row pageheader">
        <div class="col-6">
            <h4>Drivers</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
                <table class="table table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Signup Date</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Wallet Balance</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                              @php ($i = 0)
                              @foreach ($drivers as $driver)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{  \Carbon\Carbon::parse($driver->tRegistrationDate)->format('d-m-y') }}</td>
                                    <td>{{ $driver->vName }} {{ $driver->vLastName }}</td>
                                    <td>{{ "254".$driver->vPhone}}</td>
                                    <td>{{ $driver->vEmail }}</td>
                                    <td>
                                    @if ($driver->eStatus == "active")
                                        <span  class="bg-success p-2 rounded-pill text-white">{{ $driver->eStatus }} </span>
                                        @elseif($driver->eStatus == "inactive")
                                         <span  class="bg-secondary p-2 rounded-pill text-white">{{ $driver->eStatus }} </span>
                                    @endif
                                    </td>
                                   <td> 
                                   <a href="" class="editbalance"> <i class="text-info fas fa-lg fa-edit"></i> </a> <strong>Ksh </strong> 
                                    <span class="text-danger font-weight-bold">{{ number_format(walletBalance($driver->iDriverId)) }} </span> 
                                   </td>
                                   <td><a class="text-dark" href="#"> <i class="fas fa-lg fa-cogs"></i> </a></td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
        </div>
      </div>
</div>
@endsection
