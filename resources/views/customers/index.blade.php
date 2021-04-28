@extends('layouts.main')

@section('content')
       <div class="row">
        <div class="col-12">
            <h5>Customers</h5>
        </div>
        </div>
        <div class="row">
        <div class="table-responsive col-12">
                <table id="allorders" class="table table-condensed table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Total Points</th>
                            <th>Wallet Balance</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                          @php ($i = 0)
                          @foreach ($customers as $customer)
                            <tr>
                                <td> {{ ++$i }}</td>
                                <td><a href="{{ route('customers.show', $customer['iUserId'])}} "> {{ $customer['vName']}} {{ $customer['vLastName']}}</a> </td>
                                <td>{{ $customer['vEmail']}} </td>
                                <td>{{ '254'.$customer['vPhone']}} </td>
                                <td> <span class="text-danger font-weight-bold">{{ number_format(pointBalance($customer['iUserId'])) }}</span></td>
                                <td>
                                    <a href="" class="editbalance"> <i class="text-info fas fa-lg fa-edit"></i> </a> <strong>Ksh </strong>
                                    <span class="text-danger font-weight-bold">{{ number_format(walletBalance($customer->iUserId)) }} </span>
                                </td>
                                <td>
                                  <span  class="bg-success p-2 rounded-pill text-white">{{ $customer['eStatus'] }} </span>
                                </td>
                                <td>
                                 <a class="text-dark" href="#"> <i class="fas fa-lg fa-cogs"></i> </a>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
        </div>
    </div>
@endsection
