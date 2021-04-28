@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-6">
            <h3>Item Categories</h3>
        </div>
        <div class="col-6 text-right">
            <a href="{{ route('itemcategories.create') }}" class="btn btn-primary">Add Category</a>
        </div>
        <div class="col-12">
                <table class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <td>{{ '#' }}</td>
                            <th>Cat Name </th>
                            <th>Store </th>
                            <th>Display Order</th>
                            <td>Items</td>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                          @php ($i = 1)
                          @foreach ($itemcats as $item)
                            <tr>
                               <td> {{ ++$i }}</td>
                                <td>{{ $item['vMenu_EN'] }}</td>
                                @foreach ($item['store'] as $storeName)
                                   <td>{{ $storeName['vCompany'] }}</td>
                                @endforeach
                                <td>{{ $item['iDisplayOrder'] }}</td>
                                <td> </td>
                                <td>{{ $item['eStatus'] == "Active" ? 'Active' : ''}} {{ $item['eStatus'] == "Deleted" ? 'Deleted' : ''}}</td>
                                <td>
                                <td>
                                    <a  href="" title="view this service" class="btn btn-default btn-sm ">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a  href="{{ route('itemcategories.edit', $item['iFoodMenuId'])}}" title="edit this service" class="btn btn-default btn-sm ">
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
