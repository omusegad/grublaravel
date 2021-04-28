@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-6">
            <h4>Corporate Subscriptions</h4>
        </div>
        <div class="col-6 text-right">
            <a href="{{ route('corporate_subscriptions.create') }}" class="btn btn-primary">Add Subscription</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
                <table class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Subscription Name</th>
                            <th>Email</th>
                            <th>Phonenumber</th>
                            <th>location</th>
                            <th>Created at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php ($i = 0)
                          @foreach ($subscriptions as $subscribe)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $subscribe['subscriptions_name'] }}</td>
                                <td>{{ $subscribe['email'] }}</td>
                                <td>{{ $subscribe['phoneNumber'] }}</td>
                                <td>{{ $subscribe['location'] }}</td>
                                <td>{{ $subscribe['created_at'] }}</td>
                            </tr>
                            @endforeach
                            
                    </tbody>
                </table>
           </div>
      </div>
</div>
@endsection
