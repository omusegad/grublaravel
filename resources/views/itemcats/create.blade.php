@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-6">
            <h4>Add Category</h4>
        </div>
    </div>
      <div class="row">
        <div class="col-6">
         <form action="{{ route('itemcategories.store') }}" method="POST">
             @csrf
                <div class="form-group">
                    <label for="">Service Type</label>
                    <select class="form-control form-control-lg">
                        @foreach ($services as $service)
                          <option>{{ $service["vServiceName_EN"] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                        <label for="">Store Name</label>
                        <select class="form-control form-control-lg">
                                @foreach ($services as $service)
                                  <option>{{ $service["vServiceName_EN"] }}</option>
                              @endforeach
                        </select>
                    </div>
                <div class="form-group">
                    <label for="">Category Name</label>
                 <input type="text"  class="form-control" value="{{ old('category_name') }}" name='category_name' class="form-control" id="" placeholder="Category Name" >
                </div>
                <div class="form-group">
                    <label for="">Store Name</label>
                    <select class="form-control form-control-lg">
                            @foreach ($orderNo as $order)
                                <option>{{ $order["iDisplayOrder"] }}</option>
                            @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
           </form>

        </div>
       </div>
    </div>


@endsection
