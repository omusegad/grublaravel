@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-6">
            <h4>Stores</h4>
        </div>
        <div class="col-6 text-right">
            <a href="{{ route('store.create') }}" class="btn btn-primary">Add Store</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
               
           </div>
      </div>
</div>
@endsection
