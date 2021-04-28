@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-6">
            <h5>Corporate Users</h5>
        </div>
          <div class="col-6 text-right">
            <!-- Button trigger modal -->
            <a type="button" class="btn btn-primary text-white" data-toggle="modal" data-target="#myModal">
             Send sms
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-condensed table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>{{ '#' }}</td>
                            <th>Group Name</th>
                            <th>Customer Name</th>
                            <th>Group Code</th>
                            <th>Phone Number</th>
                        </tr>
                    </thead>
                    <tbody>
                          @php ($i = 0)
                          @foreach ($users as $user)
                            <tr>
                                <td> {{ ++$i }}</td>
                                <td> {{ $user['groupName']}} </td>
                                <td> {{ $user['fname']}}  {{ $user['lname']}}</td>
                                <td> {{ $user['reference_code']}} </td>
                                <td> {{ $user['phoneNumber']}} </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
        </div>
    </div>



<!-- Modal -->
<div id="myModal" class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Send sms to all Grub Sub users</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('/dashboard/send-text') }}" method="POST">
             @csrf
                <div class="form-group">
                    <div> Chooose Group to Text </div>
                    <select name="groupName" class="form-control">
                        <option disabled selected> Choose Group Option </option>
                        <option value="all"> All  </option>
                            @foreach ($groups as $group)
                                 <option value="{{ $group['reference_code'] }}"> {{ $group['subscription_group_name']}}  </option>
                            @endforeach
                        {{--  <option value="mediation"> Mediation </option>
                        <option value="court_enforcement"> Court Enforcement </option>  --}}

                    </select>
                </div>
                {{--  <div class="form-group">
                 <textarea  rows="4" cols="50" type="text-area"  class="form-control" name='message' class="form-control" placeholder="Message"></textarea>
                </div>  --}}
                <button type="submit" class="btn btn-primary">Send</button>
           </form>
      </div>
      <div class="modal-footer">
      {{--  <button type="submit" class="btn btn-primary">Send</button>  --}}
      </div>
    </div>
  </div>
</div>

<script>
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
@endsection
