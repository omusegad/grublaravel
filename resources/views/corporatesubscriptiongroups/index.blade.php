@extends('layouts.main')

@section('content')
   <div class="row">
        <div class="col-6">
            <h4>Corporate Groups</h4>
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
                            <th>Corporate Name</th>
                            <th>Group Name</th>
                            <th>Group Location</th>
                            <th>Group Code</th>
                            <th>Contact Person</th>
                            <th>Phonenumber</th>
                            <th>Created at</th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php ($i = 0)
                          @foreach ($groups as $group)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $group['corporatesubscriptions']['subscriptions_name']}}</td>
                                <td>{{ $group['subscription_group_name']}}</td>
                                <td>{{ $group['location']}}</td>
                                <td>{{ $group['reference_code']}}</td>
                                <td>{{ $group['contact_person'] }}</td>
                                <td>{{ $group['phoneNumber'] }}</td>
                                <td>{{ $group['created_at'] }}</td>
                                <td>
                                 <form action="{{url('corporate_subscription/temp/users ')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="subscription_group_name" value="{{$group['subscription_group_name']}}"/>
                                    <input type="hidden" name="reference_code" value="{{$group['reference_code']}}"/>
                                    <div class="default-file-upload">
                                    <p> Default File Upload </p>
                                    <input name="uploaded_users" id="file-upload1" type="file"/>
                                    </div><br>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                 </form>
                                 </td>
                            </tr>
                           @endforeach
                    </tbody>
                </table>
           </div>
      </div>
@endsection
