@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-6">
            <h4>Corporate Orders</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive text-nowrap">
                <table class="table table-fixed table-hover">
                    <thead>
                        <tr>
                            <th  scope="col">ID</th>
                            <th  scope="col">Name </th>
                            <th  scope="col">Mpesa Code</th>
                            <th  scope="col">Pay TyPe </th>
                            <th  scope="col">Phonenumber</th>
                            <th  scope="col">Amount</th>
                             <th  scope="col">Payment Method</th>
                            <th  scope="col">Satus</th>
                            <th  scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php ($i = 0)
                          @foreach ($payments as $pay)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td> {{  $pay['iUserId'] }} </td>
                                <td> {{  $pay['MpesaReceiptNumber'] }} </td>
                                <td> {{  $pay['GeneralUserType'] }} </td>
                                <td> {{  $pay['phoneNumber'] }} </td>
                                <td> {{  $pay['Amount'] }} </td>
                                <td> {{  $pay['vPaymentMethod'] }} </td>
                                <td> {{  $pay['paymentStatus'] }} </td>
                                <td> {{  $pay['updated_at'] }} </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
             </div>
           </div>
      </div>
</div>
@endsection
