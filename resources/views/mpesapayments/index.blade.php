@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-12">
            <h3>All Payments</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
                <div class="table-responsive col-12">
                <table id="allorders" class="table table-condensed table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Order ID </th>
                            <th>Payments Date </th>
                            <th>Phone Number </th>
                            <th>MpesaReceiptNumber </th>
                            <th>Amount</th>
                            <th>Payment Status</th>
                            <th>Payment Method </th>
                            <th>Item Paid For</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                          @php ($i = 0)
                          @foreach ($data as $item)
                            <tr>
                                <td> {{ $item['iOrderId'] }}</td>
                                <td>{{ $item['created_at']}} </td>
                                <td>{{ $item['phoneNumber']}} </td>
                                <td>{{ $item['MpesaReceiptNumber']}} </td>
                                <td>{{ $item['Amount'] }}</td>
                                <td> {{ $item['vPaymentMethod'] }}</td>
                                <td> {{ $item['paymentStatus'] }}</td>
                                <td> {{ $item['payType'] }}</td>
                                <td>
                                    <a  href="" title="view" class="btn btn-default btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a  href="" title="edit" class="btn btn-default btn-sm ">
                                            <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
        </div>
           </div>
      </div>
</div>
@endsection
