@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-6">
            <h4>Corporate Orders</h4>
        </div>
    </div>

    <div class="row">
                    <div class="col-md-12">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><strong> Today </strong> </a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> <strong> Tomorrow </strong> </a>
                                <a class="nav-item nav-link" id="nav-tommorrowOne-tab" data-toggle="tab" href="#nav-tommorrowOne" role="tab" aria-controls="nav-tommorrowOne" aria-selected="false">  {{ date('D', strtotime($tommorrowAddOne)) }}</a>
                                <a class="nav-item nav-link" id="nav-tommorrowTwo-tab" data-toggle="tab" href="#nav-tommorrowTwo" role="tab" aria-controls="nav-tommorrowTwo" aria-selected="false">  {{ date('D', strtotime($tommorrowAddTwo)) }} </a>
                                <a class="nav-item nav-link" id="nav-tommorrowThree-tab" data-toggle="tab" href="#nav-tommorrowThree" role="tab" aria-controls="nav-tommorrowThree" aria-selected="false"> {{ date('D', strtotime($tommorrowAddThree)) }}</a>
                                <a class="nav-item nav-link" id="nav-tommorrowFour-tab" data-toggle="tab" href="#nav-tommorrowFour" role="tab" aria-controls="nav-tommorrowFour" aria-selected="false"> {{ date('D', strtotime($tommorrowAddFour)) }}</a>
                                <a class="nav-item nav-link" id="nav-tommorrowFive-tab" data-toggle="tab" href="#nav-tommorrowFive" role="tab" aria-controls="nav-tommorrowFive" aria-selected="false"> {{ date('D', strtotime($tommorrowAddFive)) }}</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"> All Orders </a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active table-responsive text-nowrap" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <table class="table table-fixed table-hover" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th  scope="col">ID</th>
                                            <th  scope="col">Ordered By</th>
                                            <th  scope="col">Phone Number</th>
                                            <th  scope="col">Location</th>
                                            <th  scope="col">Group Name</th>
                                            <th  scope="col">OrderId</th>
                                            <th  scope="col">Quantity</th>
                                            <th  scope="col">Meal Name</th>
                                            <th  scope="col">Price</th>
                                            <th  scope="col">Delivery Fee</th>
                                            <th  scope="col">Total Amount</th>
                                            <th  scope="col">Payment Time</th>
                                            <th  scope="col">Payment Status</th>
                                            <th  scope="col">Delivery Status</th>
                                            <th  scope="col">Order Status</th>
                                            <th  scope="col">Placed Date</th>
                                            <th  scope="col">Delivery Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @php ($i = 0)
                                        @foreach ($orders as $order)
                                         @if ($order['deliveryDate'] == $today)
                                            <tr>
                                            <td scope="row">{{ ++$i }}</td>
                                            <td>
                                              @foreach( $order['customer'] as $odername)
                                                {{  $odername['vName'] }}  {{  $odername['vLastName'] }}
                                              @endforeach
                                              </td>
                                            <td>
                                              @foreach( $order['customer'] as $odername)
                                                {{  '254'.$odername['vPhone'] }} 
                                              @endforeach
                                              </td>
                                            <td>
                                              @foreach( $order['group'] as $orderItem)
                                                  {{  $orderItem['location'] }}
                                              @endforeach 
                                            </td>
                                            <td>
                                                @foreach( $order['group'] as $orderItem)
                                                  {{  $orderItem['subscription_group_name'] }}
                                                @endforeach
                                              </td>
                                              <td>{{ $order['orderID'] }}</td>
                                              <td>{{ $order['quantity'] }}</td>
                                              <td>
                                                @foreach( $order['meals'] as $mealItem)
                                                  {{  $mealItem['meal_name'] }}
                                                @endforeach
                                              </td>
                                              <td>{{ $order['price'] }}</td>
                                              <td>{{ $order['deliveryFee'] }}</td>
                                              <td> {{ $order['totalPay'] }}</td>
                                              <td>{{ $order['payTime'] }}</td>
                                              <td>{{ $order['ePaymentOption'] }}</td>
                                              <td>{{ $order['paymentStatus'] }}</td>
                                              <td>{{ $order['deliveryStatus'] }}</td>
                                             <td>{{ $order['created_at'] }}</td>
                                              <td>{{ $order['deliveryDate'] }}</td>
                                          </tr>
                                          @endif
                                          @endforeach
                                          @if (!$order)
                                              <div class="alert alert-info"> No orders available </div>
                                          @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade table-responsive text-nowrap" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile">
                                <table id="corporateID" class="table  table-fixed table-hover" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th  scope="col">ID</th>
                                            <th  scope="col">Ordered By</th>
                                            <th  scope="col">Group Name</th>
                                            <th  scope="col">OrderId</th>
                                            <th  scope="col">Quantity</th>
                                            <th  scope="col">Meal Name</th>
                                            <th  scope="col">Price</th>
                                            <th  scope="col">Delivery Fee</th>
                                            <th  scope="col">Total Amount</th>
                                            <th  scope="col">Payment Time</th>
                                            <th  scope="col">Payment Status</th>
                                            <th  scope="col">Delivery Status</th>
                                            <th  scope="col">Order Status</th>
                                            <th  scope="col">Delivery Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @php ($i = 0)
                                        @foreach ($orders as $order)
                                         @if ($order['deliveryDate'] == $tommorrow)
                                            <tr>
                                            <td scope="row">{{ ++$i }}</td>
                                            <td>
                                              @foreach( $order['customer'] as $odername)
                                                {{  $odername['vName'] }}  {{  $odername['vLastName'] }}
                                              @endforeach
                                              </td>
                                            <td>
                                                @foreach( $order['group'] as $orderItem)
                                                  {{  $orderItem['subscription_group_name'] }}
                                                @endforeach
                                              </td>
                                              <td>{{ $order['orderID'] }}</td>
                                              <td>{{ $order['quantity'] }}</td>
                                              <td>
                                                @foreach( $order['meals'] as $mealItem)
                                                  {{  $mealItem['meal_name'] }}
                                                @endforeach
                                              </td>
                                              <td>{{ $order['price'] }}</td>
                                              <td>{{ $order['deliveryFee'] }}</td>
                                              <td> {{ $order['totalPay'] }}</td>
                                              <td>{{ $order['payTime'] }}</td>
                                              <td>{{ $order['ePaymentOption'] }}</td>
                                              <td>{{ $order['paymentStatus'] }}</td>
                                              <td>{{ $order['deliveryStatus'] }}</td>
                                              <td>{{ $order['deliveryDate'] }}</td>
                                          </tr>
                                          @endif
                                          @endforeach
                                          @if (!$order)
                                              <div class="alert alert-info"> No orders available </div>
                                          @endif
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane fade table-responsive text-nowrap" id="nav-tommorrowOne" role="tabpanel" aria-labelledby="nav-tommorrowOne-tab">
                                <table class="table table table-fixed table-hover" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th  scope="col">ID</th>
                                            <th  scope="col">Ordered By</th>
                                            <th  scope="col">Group Name</th>
                                            <th  scope="col">OrderId</th>
                                            <th  scope="col">Quantity</th>
                                            <th  scope="col">Meal Name</th>
                                            <th  scope="col">Price</th>
                                            <th  scope="col">Delivery Fee</th>
                                            <th  scope="col">Total Amount</th>
                                            <th  scope="col">Payment Time</th>
                                            <th  scope="col">Payment Status</th>
                                            <th  scope="col">Delivery Status</th>
                                            <th  scope="col">Order Status</th>
                                            <th  scope="col">Delivery Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php ($i = 0)
                                        @foreach ($orders as $order)
                                         @if ($order['deliveryDate'] == $tommorrowAddOne)
                                            <tr>
                                            <td scope="row">{{ ++$i }}</td>
                                            <td>
                                              @foreach( $order['customer'] as $odername)
                                                {{  $odername['vName'] }}  {{  $odername['vLastName'] }}
                                              @endforeach
                                              </td>
                                            <td>
                                                @foreach( $order['group'] as $orderItem)
                                                  {{  $orderItem['subscription_group_name'] }}
                                                @endforeach
                                              </td>
                                              <td>{{ $order['orderID'] }}</td>
                                              <td>{{ $order['quantity'] }}</td>
                                              <td>
                                                @foreach( $order['meals'] as $mealItem)
                                                  {{  $mealItem['meal_name'] }}
                                                @endforeach
                                              </td>
                                              <td>{{ $order['price'] }}</td>
                                              <td>{{ $order['deliveryFee'] }}</td>
                                              <td> {{ $order['totalPay'] }}</td>
                                              <td>{{ $order['payTime'] }}</td>
                                              <td>{{ $order['ePaymentOption'] }}</td>
                                              <td>{{ $order['paymentStatus'] }}</td>
                                              <td>{{ $order['deliveryStatus'] }}</td>
                                              <td>{{ $order['deliveryDate'] }}</td>
                                          </tr>
                                          @endif
                                          @endforeach
                                          @if (!$order)
                                              <div class="alert alert-info"> No orders available </div>
                                          @endif
                                    </tbody>
                                </table>
                            </div>


                            <div class="tab-pane fade table-responsive text-nowrap" id="nav-tommorrowTwo" role="tabpanel" aria-labelledby="nav-tommorrowTwo-tab">
                                <table class="table table table-fixed table-hover" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th  scope="col">ID</th>
                                            <th  scope="col">Ordered By</th>
                                            <th  scope="col">Group Name</th>
                                            <th  scope="col">OrderId</th>
                                            <th  scope="col">Quantity</th>
                                            <th  scope="col">Meal Name</th>
                                            <th  scope="col">Price</th>
                                            <th  scope="col">Delivery Fee</th>
                                            <th  scope="col">Total Amount</th>
                                            <th  scope="col">Payment Time</th>
                                            <th  scope="col">Payment Status</th>
                                            <th  scope="col">Delivery Status</th>
                                            <th  scope="col">Order Status</th>
                                            <th  scope="col">Delivery Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php ($i = 0)
                                        @foreach ($orders as $order)
                                         @if ($order['deliveryDate'] == $tommorrowAddTwo)
                                            <tr>
                                            <td scope="row">{{ ++$i }}</td>
                                            <td>
                                              @foreach( $order['customer'] as $odername)
                                                {{  $odername['vName'] }}  {{  $odername['vLastName'] }}
                                              @endforeach
                                              </td>
                                            <td>
                                                @foreach( $order['group'] as $orderItem)
                                                  {{  $orderItem['subscription_group_name'] }}
                                                @endforeach
                                              </td>
                                              <td>{{ $order['orderID'] }}</td>
                                              <td>{{ $order['quantity'] }}</td>
                                              <td>
                                                @foreach( $order['meals'] as $mealItem)
                                                  {{  $mealItem['meal_name'] }}
                                                @endforeach
                                              </td>
                                              <td>{{ $order['price'] }}</td>
                                              <td>{{ $order['deliveryFee'] }}</td>
                                              <td> {{ $order['totalPay'] }}</td>
                                              <td>{{ $order['payTime'] }}</td>
                                              <td>{{ $order['ePaymentOption'] }}</td>
                                              <td>{{ $order['paymentStatus'] }}</td>
                                              <td>{{ $order['deliveryStatus'] }}</td>
                                              <td>{{ $order['deliveryDate'] }}</td>
                                          </tr>
                                          @endif
                                          @endforeach
                                          @if (!$order)
                                              <div class="alert alert-info"> No orders available </div>
                                          @endif
                                    </tbody>
                                </table>
                            </div>


                            <div class="tab-pane fade table-responsive text-nowrap" id="nav-tommorrowThree" role="tabpanel" aria-labelledby="nav-tommorrowThree-tab">
                                <table class="table table table-fixed table-hover" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th  scope="col">ID</th>
                                            <th  scope="col">Ordered By</th>
                                            <th  scope="col">Group Name</th>
                                            <th  scope="col">OrderId</th>
                                            <th  scope="col">Quantity</th>
                                            <th  scope="col">Meal Name</th>
                                            <th  scope="col">Price</th>
                                            <th  scope="col">Delivery Fee</th>
                                            <th  scope="col">Total Amount</th>
                                            <th  scope="col">Payment Time</th>
                                            <th  scope="col">Payment Status</th>
                                            <th  scope="col">Delivery Status</th>
                                            <th  scope="col">Order Status</th>
                                            <th  scope="col">Delivery Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php ($i = 0)
                                        @foreach ($orders as $order)
                                         @if ($order['deliveryDate'] == $tommorrowAddThree)
                                            <tr>
                                            <td scope="row">{{ ++$i }}</td>
                                            <td>
                                              @foreach( $order['customer'] as $odername)
                                                {{  $odername['vName'] }}  {{  $odername['vLastName'] }}
                                              @endforeach
                                              </td>
                                            <td>
                                                @foreach( $order['group'] as $orderItem)
                                                  {{  $orderItem['subscription_group_name'] }}
                                                @endforeach
                                              </td>
                                              <td>{{ $order['orderID'] }}</td>
                                              <td>{{ $order['quantity'] }}</td>
                                              <td>
                                                @foreach( $order['meals'] as $mealItem)
                                                  {{  $mealItem['meal_name'] }}
                                                @endforeach
                                              </td>
                                              <td>{{ $order['price'] }}</td>
                                              <td>{{ $order['deliveryFee'] }}</td>
                                              <td> {{ $order['totalPay'] }}</td>
                                              <td>{{ $order['payTime'] }}</td>
                                              <td>{{ $order['ePaymentOption'] }}</td>
                                              <td>{{ $order['paymentStatus'] }}</td>
                                              <td>{{ $order['deliveryStatus'] }}</td>
                                              <td>{{ $order['deliveryDate'] }}</td>
                                          </tr>
                                          @endif
                                          @endforeach
                                          @if (!$order)
                                              <div class="alert alert-info"> No orders available </div>
                                          @endif
                                    </tbody>
                                </table>
                            </div>


                            <div class="tab-pane fade table-responsive text-nowrap" id="nav-tommorrowFour" role="tabpanel" aria-labelledby="nav-tommorrowFour-tab">
                                <table class="table table table-fixed table-hover" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th  scope="col">ID</th>
                                            <th  scope="col">Ordered By</th>
                                            <th  scope="col">Group Name</th>
                                            <th  scope="col">OrderId</th>
                                            <th  scope="col">Quantity</th>
                                            <th  scope="col">Meal Name</th>
                                            <th  scope="col">Price</th>
                                            <th  scope="col">Delivery Fee</th>
                                            <th  scope="col">Total Amount</th>
                                            <th  scope="col">Payment Time</th>
                                            <th  scope="col">Payment Status</th>
                                            <th  scope="col">Delivery Status</th>
                                            <th  scope="col">Order Status</th>
                                            <th  scope="col">Delivery Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php ($i = 0)
                                        @foreach ($orders as $order)
                                         @if ($order['deliveryDate'] == $tommorrowAddFour)
                                            <tr>
                                            <td scope="row">{{ ++$i }}</td>
                                            <td>
                                              @foreach( $order['customer'] as $odername)
                                                {{  $odername['vName'] }}  {{  $odername['vLastName'] }}
                                              @endforeach
                                              </td>
                                            <td>
                                                @foreach( $order['group'] as $orderItem)
                                                  {{  $orderItem['subscription_group_name'] }}
                                                @endforeach
                                              </td>
                                              <td>{{ $order['orderID'] }}</td>
                                              <td>{{ $order['quantity'] }}</td>
                                              <td>
                                                @foreach( $order['meals'] as $mealItem)
                                                  {{  $mealItem['meal_name'] }}
                                                @endforeach
                                              </td>
                                              <td>{{ $order['price'] }}</td>
                                              <td>{{ $order['deliveryFee'] }}</td>
                                              <td> {{ $order['totalPay'] }}</td>
                                              <td>{{ $order['payTime'] }}</td>
                                              <td>{{ $order['ePaymentOption'] }}</td>
                                              <td>{{ $order['paymentStatus'] }}</td>
                                              <td>{{ $order['deliveryStatus'] }}</td>
                                              <td>{{ $order['deliveryDate'] }}</td>
                                          </tr>
                                          @endif
                                          @endforeach
                                          @if (!$order)
                                              <div class="alert alert-info"> No orders available </div>
                                          @endif
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane fade table-responsive text-nowrap" id="nav-tommorrowFive" role="tabpanel" aria-labelledby="nav-tommorrowFive-tab">
                                <table class="table table table-fixed table-hover" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th  scope="col">ID</th>
                                            <th  scope="col">Ordered By</th>
                                            <th  scope="col">Group Name</th>
                                            <th  scope="col">OrderId</th>
                                            <th  scope="col">Quantity</th>
                                            <th  scope="col">Meal Name</th>
                                            <th  scope="col">Price</th>
                                            <th  scope="col">Delivery Fee</th>
                                            <th  scope="col">Total Amount</th>
                                            <th  scope="col">Payment Time</th>
                                            <th  scope="col">Payment Status</th>
                                            <th  scope="col">Delivery Status</th>
                                            <th  scope="col">Order Status</th>
                                            <th  scope="col">Delivery Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php ($i = 0)
                                        @foreach ($orders as $order)
                                         @if ($order['deliveryDate'] == $tommorrowAddFive)
                                            <tr>
                                            <td scope="row">{{ ++$i }}</td>
                                            <td>
                                              @foreach( $order['customer'] as $odername)
                                                {{  $odername['vName'] }}  {{  $odername['vLastName'] }}
                                              @endforeach
                                              </td>
                                            <td>
                                                @foreach( $order['group'] as $orderItem)
                                                  {{  $orderItem['subscription_group_name'] }}
                                                @endforeach
                                              </td>
                                              <td>{{ $order['orderID'] }}</td>
                                              <td>{{ $order['quantity'] }}</td>
                                              <td>
                                                @foreach( $order['meals'] as $mealItem)
                                                  {{  $mealItem['meal_name'] }}
                                                @endforeach
                                              </td>
                                              <td>{{ $order['price'] }}</td>
                                              <td>{{ $order['deliveryFee'] }}</td>
                                              <td> {{ $order['totalPay'] }}</td>
                                              <td>{{ $order['payTime'] }}</td>
                                              <td>{{ $order['ePaymentOption'] }}</td>
                                              <td>{{ $order['paymentStatus'] }}</td>
                                              <td>{{ $order['deliveryStatus'] }}</td>
                                              <td>{{ $order['deliveryDate'] }}</td>
                                          </tr>
                                          @endif
                                          @endforeach
                                          @if (!$order)
                                              <div class="alert alert-info"> No orders available </div>
                                          @endif
                                    </tbody>
                                </table>
                            </div>


                            <div class="tab-pane fade table-responsive text-nowrap" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <table class="table table table-fixed table-hover" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th  scope="col">ID</th>
                                            <th  scope="col">Ordered By</th>
                                            <th  scope="col">Group Name</th>
                                            <th  scope="col">OrderId</th>
                                            <th  scope="col">Quantity</th>
                                            <th  scope="col">Meal Name</th>
                                            <th  scope="col">Price</th>
                                            <th  scope="col">Delivery Fee</th>
                                            <th  scope="col">Total Amount</th>
                                            <th  scope="col">Payment Time</th>
                                            <th  scope="col">Payment Status</th>
                                            <th  scope="col">Delivery Status</th>
                                            <th  scope="col">Order Status</th>
                                            <th  scope="col">Delivery Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php ($i = 0)
                                        @foreach ($orders as $order)
                                          <tr>
                                            <td scope="row">{{ ++$i }}</td>
                                            <td>
                                              @foreach( $order['customer'] as $odername)
                                                {{  $odername['vName'] }}  {{  $odername['vLastName'] }}
                                              @endforeach
                                              </td>
                                            <td>
                                                @foreach( $order['group'] as $orderItem)
                                                  {{  $orderItem['subscription_group_name'] }}
                                                @endforeach
                                              </td>
                                              <td>{{ $order['orderID'] }}</td>
                                              <td>{{ $order['quantity'] }}</td>
                                              <td>
                                                @foreach( $order['meals'] as $mealItem)
                                                  {{  $mealItem['meal_name'] }}
                                                @endforeach
                                              </td>
                                              <td>{{ $order['price'] }}</td>
                                              <td>{{ $order['deliveryFee'] }}</td>
                                              <td> {{ $order['totalPay'] }}</td>
                                              <td>{{ $order['payTime'] }}</td>
                                              <td>{{ $order['ePaymentOption'] }}</td>
                                              <td>{{ $order['paymentStatus'] }}</td>
                                              <td>{{ $order['deliveryStatus'] }}</td>
                                              <td>{{ $order['deliveryDate'] }}</td>
                                          </tr>
                                          @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
</div>
@endsection
