@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-6">
            <h5>Add Meal</h5>
        </div>
    </div>
      <div class="row">
        <div class="col-6">
            @if(Session::has('message'))
                <p class="alert alert-success">{{ Session::get('message') }}</p>
            @endif
            <div class="clearfix"></div>
         <form action="{{ route('meals.store') }}" method="POST"  enctype="multipart/form-data">
             @csrf
               <div class="form-group">
                    <select name="subscriptions_id" class="form-control" name="" required>
                       <option> Choose Subscription </option>
                        @foreach ($subscriptions as $sub)
                          <option  value="{{ $sub->id }}">{{ $sub->subscriptions_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="instock">In Stock</label>
                    <label  class="switch">
                        <input id="instock" type="checkbox">
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="form-group">
                 <input type="text"  class="form-control" value="{{ old('meal_name') }}" name='meal_name' class="form-control" id="" placeholder="Meal Name">
                  @if ($errors->has('meal_name')) <div class="alert alert-danger">{{ $errors->first('meal_name') }} </div> @endif
                </div>
                <div class="form-group">
                    <textarea class="form-control rounded-0"  name='description'  value="{{ old('description') }}"  placeholder="Description"  rows="3"></textarea>
                    @if ($errors->has('description')) <div class="alert alert-danger">{{ $errors->first('description') }} </div> @endif
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" name="meal_image_ur" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose Image</label>
                    </div>
                     @if ($errors->has('meal_image_ur')) <div class="alert alert-danger">{{ $errors->first('meal_image_ur') }} </div> @endif
                </div>
                <div class="form-group">
                    <input id="pac-input" class="form-control" name="price" type="text" placeholder="price">
                     @if ($errors->has('price')) <div class="alert alert-danger">{{ $errors->first('price') }} </div> @endif
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
           </form>

        </div>
       </div>
    </div>
@endsection

<script>
  $(function() {
    $('#instock').prop('YES', true);
  })
</script>
