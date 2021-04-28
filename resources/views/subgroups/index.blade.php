@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-6">
            <h4>Cooporate Groups</h4>
        </div>
        <div class="col-6 text-right">
            <a href="{{ route('groups.create') }}" class="btn btn-primary">Add Group</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
                <table class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Group Name</th>
                            <th>Contact Person</th>
                            <th>Phonenumber</th>
                            <th>Total Members</th>
                            <th>Created at</th>
                            <th> View Members </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php ($i = 0)
                          @foreach ($groups as $group)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td><a href="{{  route('groups.show', $group['id']) }}">{{ $group['name'] }}</a></td>
                                <td>{{ $group['contact_person'] }}</td>
                                <td>{{ $group['contact_person'] }}</td>
                                <td>{{ $group['phoneNumber'] }}</td>
                                <td>{{ $group['membersNo'] }}</td>
                                <td>{{ $group['created_at'] }}</td>
                                <td><a href="{{  route('groups.show', $group['id']) }}">View Members</a></td>
                            </tr>
                            @endforeach
                            
                    </tbody>
                </table>
           </div>
      </div>
</div>
@endsection
