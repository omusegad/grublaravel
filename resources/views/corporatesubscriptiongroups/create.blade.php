@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-6">
            <h4>Add Subscription Group</h4>
        </div>
    </div>
      <div class="row">
        <div class="col-6">
         <form action="{{ route('store.store') }}" method="POST">
             @csrf
                <div class="form-group">
                    <label for="">Store Name</label>
                 <input type="text"  class="form-control" value="{{ old('store_name') }}" name='store_name' class="form-control" id="" placeholder="Store Name" >
                </div>

                <div class="form-group">
                        <label for="email">Email</label>
                     <input type="email" value="{{ old('email') }}"  name='email' class="form-control" id="" placeholder="Email" >
                </div>
                <div class="form-group">
                        <label for="password">Password</label>
                     <input type="password" value="{{ old('password') }}"  name='password' class="form-control" id="" placeholder="Password" >
                </div>

                <div class="form-group">
                        <label for="location">Store Address</label>
                     <input type="text" value="{{ old('store_address') }}"  name='store_address' class="form-control" id="" placeholder="Store Address" >
                </div>
                <div class="form-group">
                    <label for="contact_person">Phone Number</label>
                    <input type="hidden" name="phoneNumberpfx" class="type-input" value="254" />
                    <input type="text" name="phoneNumber" class="form-control" value="{{ old('phoneNumber') }}" placeholder="0755468789" />
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
           </form>

        </div>
       </div>
    </div>


@endsection
