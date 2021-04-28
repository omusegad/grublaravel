@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-6">
            <h4>Corporate Orders</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive text-nowrap">
                <table class="table table-fixed table-hover">
                    <thead>
                        <tr>
                            <th  scope="col">ID</th>
                            <th  scope="col">Group Name </th>
                            <th  scope="col">Name</th>
                            <th  scope="col">Email</th>
                            <th  scope="col">Phonenumber</th>
                            <th  scope="col">Joined Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php ($i = 0)
                          @foreach ($subscribers as $user)
                            <tr>
                                <td>{{ ++$i }}</td>
                                @foreach( $user['group'] as $oderby)
                                  <td> {{  $oderby['subscription_group_name'] }} </td>
                                @endforeach
                                @foreach( $user['customer'] as $oderby)
                                  <td> {{  $oderby['vName'] }}  {{  $oderby['vLastName'] }} </td>
                                @endforeach
                                @foreach( $user['customer'] as $oderby)
                                  <td> {{  $oderby['vEmail'] }} </td></td>
                                @endforeach
                                 @foreach( $user['customer'] as $oderby)
                                  <td>{{ $oderby['vPhone'] }}</td>
                                @endforeach
                                <td>{{ $user['created_at'] }}</td>
                            </tr>
                            @endforeach
                            
                    </tbody>
                </table>
             </div>
           </div>
      </div>
</div>
@endsection
