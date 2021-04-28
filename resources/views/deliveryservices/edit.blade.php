@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-6">
            <h4>Update Delivery Service</h4>
        </div>
        <div class="col-6 text-right">
                <a href="{{ route('delivery_services.index') }}" class="btn  bg-warning ">All Delivery Services</a>
        </div>
    </div>
      <div class="row">
        <div class="col-6">
         <form action="{{ route('delivery_services.update', $service->iServiceId) }}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
                <div class="form-group">
                    <label for="">Service Name</label>
                 <input type="text"  class="form-control" value="{{ $service->vService }}" name='service_name' class="form-control" id="" placeholder="Store Name" >
                </div>
                <div class="form-group">
                    <label for="display_order">Display Order</label>
                    <select value="{{ old('display_order') }}" name="display_order" class="form-control form-control-lg">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="store_logo">Service Image</label>
                    <div class="custom-file">
                            <input type="file" name="service_image" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose Image</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
           </form>
        </div>
       </div>
    </div>
@endsection
