@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-12">
            <h5>Orders</h5>
        </div>
        <div class="table-responsive col-12">
                <table id="allorders" class="table table-condensed table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Order ID </th>
                            <th>Request Date </th>
                            <th>Ordered By</th>
                            <th>Service Type </th>
                            <th>Store</th>
                            <th>Driver</th>
                            <th>Cost</th>
                            <th>Order Status</th>
                            <th>By</th>
                            <th>Payment Mode</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                          @php ($i = 0)
                          @php ($count = 1)
                          @foreach ($orders as $order)
                            <tr>
                                <td><a href="{{ route('orders.show', $order['iOrderId'])}} "> {{ $order['vOrderNo']}}</a> </td>
                                <td>{{ $order->tOrderRequestDate }} </td>
                                <td>
                                     {{ $order->customer['vName'] }}  {{ $order->customer['vLastName'] }}
                                     {{ '254'.$order->customer['vPhone'] }}
                                </td>
                                <td> {{ $order->deliveryservice['vServiceName_EN'] }} </td>
                                <td>{{ $order['vCompany']}} </td>

                                 <td>
                                     {{ $order->driver['vName'] }}  {{ $order->driver['vLastName'] }}
                                     {{ '254'.$order->driver['vPhone'] }}
                                </td>
                                <td>{{ !empty($order['fSubTotal']) ? $order['fSubTotal'] : $order['fOffersDiscount'] }}</td>
                                <td class="text-danger"> <strong>{{ $order->orderstatus['vStatus'] }} </strong></td>
                                 <td> {{ $order->eCancelledBy }}</td>
                                <td>{{ $order['ePaymentOption'] == 'Card' ? 'Mpesa' : 'Cash' }} </td>
                                <td>
                                    @if($order->orderstatus['vStatus'] == 'Delivered' OR $order->orderstatus['vStatus'] == 'Cancelled')
                                        <strong>
                                        <a  type="button"  href="{{ route('orders.show', $order['iOrderId'])}}" class="btn text--black btn-success btn-sm round-">
                                            Invoice
                                        </a>
                                        </strong>
                                    @else
                                      <strong>
                                        <a  type="button"  href="" class="btn text--black btn-success btn-sm round-">
                                          Cancel
                                      </a>
                                    @endif()
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
        </div>
    </div>
@endsection
