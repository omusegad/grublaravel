@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-6">
            <h5>Corporate Meals</h5>
        </div>
        <div class="col-6 text-right">
            <a href="{{ route('meals.create') }}" class="btn btn-primary">Add Meal</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
                <table class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Subscriptions Type</th>
                            <th>Meal</th>
                            <th>Description</th>
                            <th>In Stock</th>
                            <th>Price</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php ($i = 0)
                          @foreach ($meals as $meal)
                            <tr>
                                <td>{{ ++$i }}</td>
                                 <td>{{ $meal['corporatesubscriptions']['subscriptions_name']}}</td>
                                <td>{{ $meal['meal_name']}}</td>
                                <td>{{ $meal['description']}}</td>
                                <td>{{ $meal['inStock'] }}</td>
                                <td>{{ $meal['price'] }}</td>
                                <td>{{ $meal['created_at'] }}</td>
                                {{--  <td><a href="{{  route('meals.show', ['subscription_id' => $meal['corporatesubscriptions']['id']]) }}">View Members</a></td>  --}}
                            </tr>
                            @endforeach
                    </tbody>
                </table>
           </div>
      </div>
</div>
@endsection
