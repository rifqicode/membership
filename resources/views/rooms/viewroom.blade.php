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
                  </tr>
                </thead>

                <tbody>
                  <td> <p>{{ $value->name }}</p> </td>
                </tbody>
              </table>

            </div>

            @if ($status == 1)
              <a style="float:right" class="btn btn-primary" href="{{ route('rollItem' , ['id_room' => $value->room_id])}}"> Roll Item Now</a>
            @endif
          @endforeach

        </div>

    </div>
      {{-- form end --}}

   </section>
   <!-- /.content -->

 </div>

@endsection
