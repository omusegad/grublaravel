@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-6">
            <h3>Users</h3>
        </div>
        <div class="col-6 text-right">
            <a href="{{ route('users.create') }}" class="btn btn-primary">Add User</a>
        </div>
        <div class="col-12">
                <table class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>Name </th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                          @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td></td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
        </div>
    </div>
@endsection
