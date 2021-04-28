@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-6">
            <h3>Items </h3>
        </div>
        <div class="col-6 text-right">
            <a href="{{ route('items.create') }}" class="btn btn-primary">Add Item</a>
        </div>
        <div class="col-12">
                <table class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <td>{{ '#' }}</td>
                            <th>Item </th>
                            <th>Category Name </th>
                            <th>iDisplayOrder</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                          @php ($i = 0)
                          @foreach ($items as $item)
                            <tr>
                               <td> {{ ++$i }}</td>
                                <td>{{ $item['vItemType_EN'] }}</td>
                                @foreach ($item['itemcategories'] as $itemcat)
                                   <td>{{ $itemcat['vMenu_EN'] }}</td>
                                @endforeach
                                <td>{{ $item['iDisplayOrder'] }}</td>
                                <td>{{ $item['eStatus'] == "Active" ? 'Active' : ''}} {{ $item['eStatus'] == "Deleted" ? 'Deleted' : ''}}</td>
                                <td>
                                <td>
                                    <a  href="" title="view this service" class="btn btn-default btn-sm ">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a  href="{{ route('items.edit', $item['iMenuItemId'])}}" title="edit this service" class="btn btn-default btn-sm ">
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
