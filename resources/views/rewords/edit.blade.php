@extends('layouts.main')

@section('content')
       <div class="row">
        <div class="col-12">
            <h5>Loyalty Points Setting</h5>
        </div>
        </div>
        <div class="row">
            <div class="col-6">
             <form action="{{ route('loyalty_rewords.update',  $loyalty['id']) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <input type="text" class="form-control" name="{{ $loyalty['name'] }}" placeholder="{{ $loyalty['name'] }}" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="points_earnings" placeholder="{{ $loyalty['points_earnings'] }}" required>
                </div>

                <button type="submit" class="btn btn-primary text-right"> SUBMIT</button>
            </div>
        </form>
         </div>
@endsection
