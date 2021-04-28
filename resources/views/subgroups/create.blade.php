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
                        <label for="contact_person">Contact Person Name</label>
                     <input type="text"  value="{{ old('contact_person') }}"  name='contact_person' class="form-control" id="" placeholder="Contact Person Name" >
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
