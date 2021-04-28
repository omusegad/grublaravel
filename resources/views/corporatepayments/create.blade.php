@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-6">
            <h5>Add Subscriptions</h5>
        </div>
    </div>
      <div class="row">
        <div class="col-6">
            @if(Session::has('message'))
                <p class="alert alert-success">{{ Session::get('message') }}</p>
            @endif
            <div class="clearfix"></div>
         <form action="{{ route('corporate_subscriptions.store') }}" method="POST" enctype="multipart/form-data">
             @csrf
                <div class="form-group">
                 <input type="text"  class="form-control" value="{{ old('subscription_name') }}" name='subscription_name' class="form-control" id="" placeholder="Subscription Name" required>
                </div>
                <div class="form-group">
                     <input type="email" value="{{ old('email') }}"  name='email' class="form-control" id="" placeholder="Email" required>
                </div>
                <div class="form-group">
                     <input type="text" value="{{ old('phoneNumber') }}"  name='phoneNumber' class="form-control" id="" placeholder="Phonenumber" required>
                </div>
                <div class="form-group">
                
                    <div class="custom-file">
                        <input type="file" name="subscription_image" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Subscription Image</label>
                    </div>
                </div>
                <div class="form-group">
                     <input type="text" value="{{ old('subscription_location') }}"  name='subscription_location' class="form-control" id="" placeholder="subscription_location" required>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
           </form>
        </div>
       </div>
    </div>


@endsection
