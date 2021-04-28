@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-6">
            <h4>Stores</h4>
        </div>
        <div class="col-6 text-right">
            <a href="{{ route('store.create') }}" class="btn btn-primary">Add Store</a>
        </div>
    </div>
    <div class="row">
                <table class="table-responsive table table-condensed table-hover col-12">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Store</th>
                            <th>Service</th>
                            <th>Registered Date</th>
                            <th>Contacts</th>
                            <th>Location</th>
                            <th>Online Status</th>
                            <th>Item Category</th>
                            <th>Documents</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                            @php ($i = 0)
                          @foreach ($stores as $store)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $store['vCompany'] }}</td>
                                <td>{{ $store->deliveryservice['vService'] }}</td>
                                <td>{{  \Carbon\Carbon::parse($store->tRegistrationDate)->format('d-m-y') }}</td>
                                <td>
                                  <ul>
                                    <li>Email: {{ $store['vEmail'] }}</li>
                                    <li>Person: {{ $store['vContactName'] }}</li>
                                    <li>Phone: {{ $store['vPhone'] }}</li>
                                </ul>
                                </td>
                                <td>{{ $store['vRestuarantLocation'] }}</td>
                                <td>{{ $store['tLastOnline'] }}</td>
                                <td>{{ $store['vPhone'] }}</td>
                                <td> <a class="text-info" href="#">
                                  <i class="far fa-2x fa-file-alt"></i> </a>
                                </td>
                                <td>
                                 @if($store->eStatus == 'Active')
                                    <span  class="bg-success p-2 rounded-pill text-white">
                                      {{ $store['eStatus']  }}
                                    </span>
                                    @else
                                     <span  class="bg-secondary p-2 rounded-pill text-white">
                                      {{ $store['eStatus']  }}
                                     </span>
                                @endif()
                                </td>
                                <td>  <a class="text-dark" href="#"> <i class="fas fa-lg fa-cogs"></i> </a></td>

                            </tr>
                            @endforeach
                    </tbody>
                </table>
      </div>
</div>
@endsection

