@extends('layouts.main')

@section('content')
    <div class="row pageheader">
        <div class="col-6">
            <h5>Vehicles</h5>
        </div>
        <div class="col-6 text-right">
            <a href="{{ route('vehicles.create') }}" class="btn bg-warning ">Add Vehicle</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
                <table class="table table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Driver</th>
                                <th>Driver Status</th>
                                <th>Vehicle Make</th>
                                <th>Make Status</th>
                                <th>Vehicle Plate</th>
                                <th>Vehicle Status</th>
                                <th>Vehicle Model</th>
                                <th>Model Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                          @php ($i = 1)
                              @foreach ($vehicles as $vehicle)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $vehicle->driver['vName'] }} {{ $vehicle->driver['vLastName'] }}</td>
                                    <td><span  class="bg-warning p-2 rounded-pill">{{ $vehicle->driver['eStatus'] }}</span></td>
                                    <td>{{ $vehicle->vehiclemake['vMake'] }} </td>
                                    <td><span  class="bg-success p-2 text-light rounded-pill"> {{ $vehicle->vehiclemake['eStatus'] }} </span> </td>
                                    <td>{{ $vehicle->vLicencePlate }}</td>
                                    <td><span  class="bg-info p-2 text-light rounded-pill">{{ $vehicle->eStatus }}</span></td>
                                    <td>{{ $vehicle->vehiclemodel['vTitle'] }}</td>
                                    <td><span  class="bg-danger p-2 text-light rounded-pill">{{ $vehicle->vehiclemodel['eStatus'] }}</span></td>
                                    <td><a class="text-dark" href="#"> <i class="fas fa-lg fa-cogs"></i> </a> </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
        </div>
      </div>
</div>
@endsection
