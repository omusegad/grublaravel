@extends('layouts.main')

@section('content')
<div class="row">
   <div class="col-6">
        <h5>Item Type </h5>
    </div>
    <div class="col-6">
        <a href="{{ route('itemtype.create') }}" class="btn text-right btn-primary">Add Category</a>
    </div>
</div>

<div class="row">
        <div class="col-12">
                <table class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <th>Item Type </th>
                            <th>Service Name </th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                          @php ($i = 0)
                          @foreach ($itemstype as $itemtype)
                            <tr>
                               <td> {{ ++$i }}</td>
                                <td>{{ $itemtype['cuisineName'] }}</td>
                                @foreach ($itemtype['deliveryservice'] as $service)
                                   <td>{{ $service['vServiceName_EN'] }}</td>
                                @endforeach
                                <td>
                                @if($itemtype['eStatus'] == "Active")
                                  <span  class="bg-success p-2 rounded-pill text-white">{{ $itemtype['eStatus'] }} </span>
                                @else
                                  <span  class="bg-secondary p-2 rounded-pill text-white">{{ $itemtype['eStatus'] }} </span>
                                @endif()
                                </td>
                                <td>
                                <td>
                                    <a  href="" title="view this service" class="btn btn-default btn-sm ">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a  href="{{ route('itemcategories.edit', $itemtype['cuisineId'])}}" title="edit this service" class="btn btn-default btn-sm ">
                                            <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
        </div>
</div>
@endsection
