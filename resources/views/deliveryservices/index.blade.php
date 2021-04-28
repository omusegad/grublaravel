@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-8">
          <h5> Services Types</h5>
           </div>
          <div class="col-lg-4">
          <a  href="{{ route('delivery_services.create') }}" class="btn bg-warning ">Add Service Type</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div><br />
            @endif
        </div>
        <div class="col-12">
                <table class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Service Type</th>
                            <th>Image</th>
                            <th>Display Order</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                    @php ($count = 1)
                          @foreach ($services as $service)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $service->vService }}</td>
                                <td>
                                <img src="{{ asset('storage/photo/'.$service->vImage) }}"/>
                                </td>
                                <td>{{ $service->iDisplayOrder }}</td>
                                <td>
                                  <span  class="bg-success p-2 rounded-pill text-white">{{ $service['eStatus'] }} </span>
                                </td>
                                <td>
                                    <a  href="" title="view this service" class="btn btn-default btn-sm ">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a  href="{{ route('delivery_services.edit', $service->iServiceId)}}" title="edit this service" class="btn btn-default btn-sm ">
                                            <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('delivery_services.destroy',$service->iServiceId) }}" method="POST" enctype="multipart/form-data">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-default btn-sm"> <i class="far fa-trash-alt"></i></button>
                                    </form>
                                </td>

                            </tr>
                            @endforeach
                    </tbody>
                </table>
           </div>
      </div>
</div>
@endsection
