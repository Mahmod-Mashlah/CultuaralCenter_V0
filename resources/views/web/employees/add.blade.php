
@extends('web.layouts.master')

@section('title')
Employees || Add New Employee
@endsection {{-- or @stop --}}

@section('css')
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">

  <!-- DataTables -->
  <link rel="stylesheet" href=" {{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

  <!-- Theme style -->
  <link rel="stylesheet" href=" {{ asset('assets/css/adminlte.min.css') }}">

@endsection

@section('root')
     Dashboard
@endsection

@section('son1')
    Employees
@endsection

@section('son2')
    Add New Employee
@endsection


@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">

            <div class="col d-flex justify-content-center">


            <div class="col-md-6">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Add a New Employee</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ url('web/employees', []) }}" method="POST">
                    @csrf
                  <div class="card-body">



                    <div class="row d-flex">


                      </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Name</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputFile">E-mail :</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                    </div>

                    <div class="row d-flex">
                    <div class="col"><hr color="orange"></div>
                    <div class="col"><hr color="orange"></div>
                    </div>
                    {{--  --}}

                   <div class="form-group">
                       <label for="exampleSelectBorder">Type  :
                       </label>

                       <select class="selectpicker col-md-12" placeholder="">

                            <option>Theatre </option>
                            <option>Library </option>
                            <option>Activity </option>

                         </select>
                     </div>




                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary col d-flex justify-content-center">create</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
            </div>



          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->

@endsection


@section('javascript')
<!-- jQuery -->
<script src="{{ URL::asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ URL::asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>

<script src="{{ URL::asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::asset('assets/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ URL::asset('assets/js/demo.js') }}"></script>
<!-- Page specific script -->
{{-- <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
  });
</script> --}}

@endsection
