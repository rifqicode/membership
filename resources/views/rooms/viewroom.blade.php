@extends('layouts.mainapp')

@section('content')
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <div class="box box-primary">

      <div class="box-header with-border">
        <h3 class="box-title"></h3>
      </div>

        <div class="box-body">

          <input type="hidden" id="room_id" value="{{ $room_id }}">

          <h3 class="box-title"> Rooms Detail </h3><br>
          @foreach ($room as $key => $value)
            <div class="col-md-12">
              <table class="table">
                <thead>
                  <tr bgcolor="#ffcccc">
                    <td>Nama</td>
                    <td>Category</td>
                    <td>Start At</td>
                    <td>End At</td>
                    <td>Creator</td>
                  </tr>
                </thead>

                <tbody>
                  <td> <p>{{ $value->name }}</p> </td>
                  <td> <p>{{ $value->category->name }}</p> </td>
                  <td> <p>{{ $value->start_at }}</p> </td>
                  <td> <p>{{ $value->end_at }}</p> </td>
                  <td> <p>{{ $value->user->name }}</p> </td>
                </tbody>
              </table>

            </div>
          @endforeach

          <h3 class="box-title"> Items List </h3><br>
          @foreach ($item as $key => $value)
            <div class="col-md-12">
              <table class="table">
                <thead>
                  <tr bgcolor="#b3d9ff">
                    <td>Name</td>
                    @if ($value->status == 2)
                      <td>Winner</td>
                    @endif
                  </tr>
                </thead>

                <tbody>
                  <td> <p>{{ $value->name }}</p> </td>
                  @if ($value->status == 2)
                    <td> <p>{{ $value->winner }}</p> </td>
                  @endif
                </tbody>
              </table>

            </div>

            @if ($status == 1 && $roomStatus == 0)
              <a style="float:right" id="roll" class="btn btn-primary" > Roll Item Now</a>
            @elseif ($roomStatus == 1)
              <a style="float:right" id="roll" class="btn btn-danger" > Already Rolled</a>
            @endif
          @endforeach

        </div>

    </div>
      {{-- form end --}}

   </section>
   <!-- /.content -->

 </div>

@push('scripts')
    <script>

        $("#roll").click(function(){

          var room_id = $('#room_id').val();

          var url = '/rooms/roll/' + room_id + '/item/now';

          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });

          $.ajax({
            url: url,
            type: "GET",
            success: function( msg ) {
              var data = JSON.parse(msg);
              sweetAlert('Winner' , data.winner , 'success' , 'OK')
            },
            error: function ( err ){
              console.log(err);
            }
          });
        //
        });

    </script>

@endpush

@endsection
