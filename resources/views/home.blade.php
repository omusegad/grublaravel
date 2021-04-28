@extends('layouts.main')

@section('content')

<div class="row text-white">
    <div class="col-12">
        <div class="row">
            <div class="col-6">
                <div class="panel panel-default">
                    <div class="panel-heading bg-light text-dark  p-2">
                        <strong> Site Statistics</strong>
                    </div>
                    <div class="panel-body p-3 border">
                    <div class="row">
                        <div class="col-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2 bg-success">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold  text-capitalize mb-1">Customers</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <a class="text-white" href="#">  {{ $customers ?? ''}} </a>
                                                </div>
                                        </div>
                                        <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-gray-300" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2 bg-danger">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold  text-Capitalize mb-1">Drivers</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <a class="text-white" href="#">  {{ $drivers ?? ''}} </a>
                                                </div>
                                        </div>
                                        <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-gray-300" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2 bg-dark">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold  text-Capitalize mb-1">Stores</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <a class="text-white" href="#">  {{ $stores ?? ' ' }} </a>
                                                </div>
                                        </div>
                                        <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-gray-300" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2 bg-info">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold  text-Capitalize mb-1"> </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <a class="text-white" href="#">  </a>
                                                </div>
                                        </div>
                                        <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-gray-300" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="panel panel-default pad">
                    <div class="panel-heading bg-light text-dark  p-2">
                        <strong> Orders Statistics</strong>
                    </div>
                    <div class="panel-body p-3 border">
                    <div class="row">
                        <div class="col-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2 bg-success">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold  text-Capitalize mb-1">Total Orders </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <a class="text-white" href="#">  {{ $orders ?? '' }} </a>
                                                </div>
                                        </div>
                                        <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-gray-300" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2 bg-warning">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold  text-Capitalize mb-1">Delivered Orders</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <a class="text-white" href="#">  {{ $deliveredOrders ?? '' }} </a>
                                                </div>
                                        </div>
                                        <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-gray-300" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2 bg-info">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold  text-Capitalize mb-1"> Declined By Store</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <a class="text-white" href="#">  {{ $declinedByStore ?? ' ' }} </a>
                                                </div>
                                        </div>
                                        <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-gray-300" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2 bg-danger">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold  text-Capitalize mb-1"> Cancelled Orders</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <a class="text-white" href="#">  {{ $cancelledOrders ?? ' ' }} </a>
                                                </div>
                                        </div>
                                        <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-gray-300" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2 bg-dark">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold  text-Capitalize mb-1"> Refunded Orders</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <a class="text-white" href="#">  {{ $refundedOrders ?? ' ' }} </a>
                                                </div>
                                        </div>
                                        <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-gray-300" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
    </div>
</div>

<div class="container">
<div class="row">
    <div class="col-6">
        <div class="box box-info">
            <div class="box-header with-border bg-dark p-2">
              <h5 class="box-title">Latest Orders</h5>
            </div>
            <div class="box-body">
              <div class="table table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Order ID</th>
                    <th>Item</th>
                    <th>Status</th>
                    <th>Requested Date</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
                    <td>Call of Duty IV</td>
                    <td><span class="label bg-success p-1 text-white">Shipped</span></td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR1848</a></td>
                    <td>Samsung Smart TV</td>
                    <td><span class="label bg-warning p-1 text-white">Pending</span></td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                    <td>iPhone 6 Plus</td>
                    <td><span class="label bg-danger p-1 text-white">Delivered</span></td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                    <td>Samsung Smart TV</td>
                    <td><span class="label bg-info p-1 text-white">Processing</span></td>
                   
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR1848</a></td>
                    <td>Samsung Smart TV</td>
                    <td><span class="label bg-warning p-1 text-white">Pending</span></td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                    <td>iPhone 6 Plus</td>
                    <td><span class="label bg-danger p-1 text-white">Delivered</span></td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
                    <td>Call of Duty IV</td>
                    <td><span class="label bg-success p-1 text-white">Shipped</span></td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
        </div>
       <div class="col-6">
    </div>
  </div>
</div>
  {{-- <livewire:total.total-stats/> --}}
@endsection
