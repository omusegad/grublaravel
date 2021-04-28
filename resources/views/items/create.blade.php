@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-6">
            <h4>Add Item </h4>
        </div>
    </div>
         <form action="{{ route('items.store') }}" method="POST">
             @csrf
             <div class="row">
             <div class="col-lg-6 form-group">
                <label for="">Item Name</label>
                <input type="text"  class="form-control" value="{{ old('item_name') }}" name='item_name' class="form-control" id="" placeholder="Item Name" >
            </div>
            <div class="col-lg-6 form-group">
                <label for="">Store Name</label>
                <select name="service_name" class="form-control form-control-lg">
                        @foreach ($services as $service)
                            <option>{{ $service["vServiceName_EN"] }}</option>
                        @endforeach
                </select>
            </div>
            <div class="col-lg-6 form-group">
                <label for="exampleFormControlTextarea2">Item Description </label>
                <textarea  name="item_description" class="form-control rounded-0" rows="2"></textarea>
            </div>
            <div class="col-lg-6 form-group">
                <label for="">Display Order</label>
                <select name="service_name" class="form-control form-control-lg">
                        @foreach ($items as $item)
                            <option>{{ $item["iDisplayOrder"] }}</option>
                        @endforeach
                </select>
            </div>
            <div class="col-lg-6 form-group">
                <label for="item_image">Item Image</label>
                <div class="custom-file">
                        <input type="file" name="item_image" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose Logo</label>
                </div>
            </div>
                <div class="col-lg-6 form-group">
                    <label for="price">Price</label>
                        <input type="text"  class="form-control" value="{{ old('price') }}" name='price' class="form-control" id="" placeholder="Price" >
                    [Note : This will be base, starting, regular price if you are going to add different combos or paid options.]
                </div>
                <div class="col-lg-6 form-group">
                    <label for="price"> Offer Amount(%) </label>
                        <input type="text"  class="form-control" value="{{ old('offer') }}" name='price' class="form-control" id="" placeholder="offer" >
                        Note : The % discount will be applied on Item price which includes (Base + options + toppings) prices.
                        Topping price is applied to Food orders only. The item discount will only apply if the Global Offer Offer Applies On is set NONE from the store/restaurant setting. If your current offer type is All order/ First Order then, this discount wont apply.]
                </div>
                <div class="col-lg-6 form-group">
                    <label for="">item Tag Name</label>
                    <select name="tag_name" class="form-control form-control-lg">
                        <option>BestSaller</option>
                        <option>Newly Added</option>
                        <option>Promotted</option>
                    </select>
                </div>
                <div class="col-lg-6 form-group">
                    <label for="">  </label>
                    <label class="switch" for="checkbox">Is Item In Stock?
                        <input type="checkbox" name="eAvailable" id="checkbox" />
                        <div class="slider round"></div>
                    </label>
                </div>
                <div class="col-lg-6 form-group">
                        <label for="">  </label>
                        <label class="switch" for="recommended">Is Item Recommended?
                            <input type="checkbox" name="recommended" id="recommended" />
                            <div class="slider round"></div>
                        </label>
                    </div>

                <div class="col-12 text-right">
                 <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>

           </form>
    </div>


@endsection
