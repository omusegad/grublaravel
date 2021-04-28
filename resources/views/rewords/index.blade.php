@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-6">
            <h5>Loyalty Rewords Options </h5>
        </div>
        <div class="col-6 text-right">
            <a href="" class="btn btn-primary">Add Reword</a>
        </div>
        <div class="col-12">
                <table class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <td>{{ '#' }}</td>
                            <th>Name </th>
                            <th>Point Equivalent</th>
                            <th>Created At</th>
                            <th>UPdated At</th>
                        </tr>
                    </thead>
                    <tbody>
                          @php ($i = 0)
                          @foreach ($rewords as $reword)
                            <tr>
                               <td> {{ ++$i }}</td>
                                <td>{{ $reword['name'] }}</td>    
                                <td>{{ $reword['points_earnings'] }}</td>
                                <td> {{ $reword['created_at'] }}</td>
                                <td> {{ $reword['updated_at'] }}</td>
                                <td>
                                    <a  href="{{ route('loyalty_rewords.edit', $reword['id'])}}" title="edit this Reword" class="btn btn-default btn-sm ">
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
