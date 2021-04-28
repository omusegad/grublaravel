@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-6">
            <h4>Add Stores</h4>
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
                    <label for="">Service Type</label>
                    <select class="form-control form-control-lg">
                         @for ( $i = 0;  $i< count($services); $i++)
                         <option>{{ $services[$i] }}</option>
                         @endfor
                    </select>
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
                    <label for="store_logo">Store Logo</label>
                    <div class="custom-file">
                            <input type="file" name="store_logo" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose Logo</label>
                    </div>
                </div>

                <div class="mapsec">
                    <div class="form-group">
                        <label for="">Store Location</label>
                        <input id="pac-input" class="form-control" type="text" placeholder="Enter a location">
                    </div>
                    <div class="themap">
                        <div id="map"></div>
                        <div id="infowindow-content">
                            <img src="" width="300" height="600" id="place-icon">
                            <span id="place-name"  class="title"></span><br>
                            <span id="place-address"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                        <label for="location">Store Address</label>
                     <input type="text" value="{{ old('store_address') }}"  name='store_address' class="form-control" id="" placeholder="Store Address" >
                </div>
                <div class="form-group">
                        <label for="">County</label>
                        <select name="county" class="form-control form-control-lg">
                            <option>Mombasa </option>
                            <option> Isiolo </option>
                            <option>Muranga </option>
                            <option>Laikipia </option>
                            <option>SiayaKwale </option>
                            <option>Meru </option>
                            <option>Kiambu </option>
                            <option>Nakuru </option>
                            <option>Kisumu </option>
                            <option>Kilifi </option>
                            <option>Tharaka-Nithi </option>
                            <option>Turkana </option>
                            <option>Narok </option>
                            <option>Homa Bay </option>
                            <option>Tana River </option>
                            <option> Embu </option>
                            <option>West Pokot </option>
                            <option>Kajiado </option>
                            <option>Migori </option>
                            <option> Lamu </option>
                            <option>Kitui </option>
                            <option>Samburu </option>
                            <option>Kericho </option>
                            <option>Kisii </option>
                            <option>Taita-Taveta </option>
                            <option>Machakos </option>
                            <option>Trans Nzoia </option>
                            <option>Bomet </option>
                            <option>Nyamira </option>
                            <option>Garissa </option>
                            <option>Makueni </option>
                            <option>Uasin Gishu </option>
                            <option>Kakamega </option>
                            <option>Nairobi </option>
                            <option> Wajir </option>
                            <option> Nyandarua </option>
                            <option>Elgeyo-Marakwet </option>
                            <option> Vihiga </option>
                            <option> Mandera </option>
                            <option> Nyeri </option>
                            <option>Nandi </option>
                            <option> Bungoma </option>
                            <option> Marsabit </option>
                            <option> Kirinyaga </option>
                            <option> Baringo </option>
                            <option> Busia </option>
                        </select>
                    </div>
                <div class="form-group">
                        <label for="contact_person">Contact Person </label>
                     <input type="text"  value="{{ old('contact_person') }}"  name='contact_person' class="form-control" id="" placeholder="Contact Person Name" >
                </div>
                <div class="form-group">
                    <label for="contact_person">Phone Number</label>
                    <input type="hidden" name="phoneNumberpfx" class="type-input" value="254" />
                    <input type="text" name="phoneNumber" class="form-control" value="{{ old('phoneNumber') }}" placeholder="0755468789" />
                </div>
            </div>

            <div class="col-6" >
             <div class="row">
              <div class="form-group col-6">
              <label>From : Monday to Friday</label>
                <div class='input-group date' id='datetimepicker3'>
                    <input type='text' name="vFromMonFriTimeSlot1" class="form-control" />
                    <span class="input-group-addon">
                       <i class="far fa-2x fa-clock"></i>
                    </span>
                </div>
              </div>

            <div class="form-group col-6">
              <label>To: Monday to Friday</label>
                <div class='input-group date' id='datetimepicker3'>
                    <input type='text' name="vToMonFriTimeSlot1" class="form-control" />
                    <span class="input-group-addon">
                        <i class="far fa-2x fa-clock"></i>
                    </span>
                </div>
              </div>
            </div>
                <div class="row">
              <div class="form-group col-6">
              <label>From : Saturday & Sunday </label>
                <div class='input-group date' id='datetimepicker3'>
                    <input type='text' name="vFromMonFriTimeSlot2" class="form-control" />
                    <span class="input-group-addon">
                        <i class="far fa-2x fa-clock"></i>
                    </span>
                </div>
              </div>

            <div class="form-group col-6">
              <labelond>To: Saturday & Sunday </labelond>
                <div class='input-group date' id='datetimepicker3'>
                    <input type='text' name="vToMonFriTimeSlot2" class="form-control" />
                    <span class="input-group-addon">
                       <i class="far fa-lg fa-clock"></i>
                    </span>
                </div>
              </div>
            </div>
           <div class="form-group">
                <label >Minimum Amount Per Order (In KES) </label>
                <input type="text"  value=""  name='minAmountPerOrder' class="form-control" id="" placeholder="Min Amount" >
            </div>
            <div class="form-group">
                <label >Additional Packing Charges (In KES) </label>
                <input type="text"  value=""  name='packaginCharges' class="form-control" id="" placeholder="Packaging Amount" >
            </div>

             <div class="form-group">
                <label > Max order qunatity placed by customer  </label>
                <input type="text"  value=""  name='maxOrderQuantity' class="form-control" id="" placeholder="Max Quantity Placed by customer" >
            </div>

            <div class="form-group">
                <label > Estimated Order Time including Approx Delivery time (in minutes) *  </label>
                <input type="text"  value=""  name='DeliveryTime' class="form-control" id="" placeholder="Estimated Delivery Time" >
            </div>
            <div class="form-group">
                <label>Offer Applies On </label>
                <select name="discoutOnOrders" class="form-control form-control-lg">
                    <option>None </option>
                    <option>First Order </option>
                    <option> All Orders </option>
                </select>
                Note: The discount will be applied on Base price including options and others.
            </div>
             <div class="form-group">
                <label > Cost Per Person (In KES) </label>
                <input type="text"  value=""  name='costPerPerson' class="form-control" id="" placeholder="Amount" >
            </div>

                <button type="submit" class="btn btn-primary">Submit</button>
           </div>

              </form>

       </div>
    </div>


@endsection
