@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-6">
            <h4>Add Item Type</h4>
        </div>
    </div>
      <div class="row">
        <div class="col-6">
         <form action="{{ route('itemtype.store') }}" method="POST">
             @csrf
             <div class="form-group">
                <label for="">Item Type Name</label>
             <input type="text"  class="form-control" value="{{ old('itemtype_name') }}" name='itemtype_name' class="form-control" id="" placeholder="Item Type Name" >
            </div>
                <div class="form-group">
                        <label for="">Store Name</label>
                        <select name="service_name" class="form-control form-control-lg">
                                @foreach ($services as $service)
                                  <option>{{ $service["vServiceName_EN"] }}</option>
                              @endforeach
                        </select>
                </div>
               
                <button type="submit" class="btn btn-primary">Save</button>
           </form>

        </div>
       </div>
    </div>


@endsection
