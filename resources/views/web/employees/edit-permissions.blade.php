@extends('web.layouts.master')

@section('title')
    Employees || Edit Permissions
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
    Edit Permissions
@endsection


@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    {{-- <div class="row mb-2">
                    <div class="col-sm-6">
                      <h1>Buttons</h1>
                    </div>
                </div>  --}}
                    <div class="card">
                        <div class="card-header bg-blue">
                            <h1 class="card-title  text-white">These are all Users in this Center
                            </h1>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 1%"><b>#</b></th>
                                        <th class='text-center'style="width: 10%">Name </th>
                                        {{-- <th style="width: 10%" >Edit Employee </th> --}}
                                        <th class='text-center'style="width: 10%">E-mail</th>
                                        {{-- <th class='middle' style="width: 10%">Type</th> --}}
                                        <th class='text-center' style="width: 10%">Type</th>
                                        {{-- <th class='text-center' style="width: 10%">Min Plays </th>
                                        <th class='text-center' style="width: 10%">Min Activities</th>
                                        <th class='text-center' style="width: 10%">Max Activities</th>
                                        <th class='text-center' style="width: 10%">Min Lectures</th>
                                        <th class='text-center' style="width: 10%">Max Lectures</th> --}}
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td><b>1</b></td>

                                        <td class='text-center' style="font-size: 20px;"><i> Majd
                                            </i></td>
                                        {{-- <td class='text-center' style="font-size: 18px;">
                        <button type="button" class="btn btn-primary btn-block"> Edit</button>
                        </td> --}}
                                        <td class='text-center' style="font-size: 18px;">majd@gmail.com</td>

                                        <td class='text-center' style="font-size: 20px;">
                                            <span class="badge bg-teal disabled color-palette">5</span>
                                        </td>

                                        {{-- <td class='text-center' style="font-size: 20px;"><span
                                                class="badge bg-warning disabled color-palette">23</span></td>
                                        <td class='text-center' style="font-size: 20px;"><span
                                                class="badge bg-teal disabled color-palette">7</span></td>
                                        <td class='text-center' style="font-size: 20px;"><span
                                                class="badge bg-warning disabled color-palette">29</span></td>
                                        <td class='text-center' style="font-size: 20px;"><span
                                                class="badge bg-teal disabled color-palette">6</span></td>
                                        <td class='text-center' style="font-size: 20px;"><span
                                                class="badge bg-warning disabled color-palette">19</span></td> --}}
                                    </tr>
                                    <tr>
                                        <td><b>2</b></td>
                                        <td class='text-center' style="font-size: 20px;"><i> Raghad </i></td>
                                        {{-- <td class='text-center' style="font-size: 18px;">
                            <button type="button" class="btn btn-primary btn-block"> Edit</button>
                            </td> --}}
                                        <td class='text-center' style="font-size: 18px;">raghad@gmail.com</td>

                                        <td class='text-center' style="font-size: 20px;"><span
                                                class="badge bg-teal disabled color-palette">30</span></td>
                                        {{-- <td class='text-center' style="font-size: 20px;"><span
                                                class="badge bg-warning disabled color-palette">67</span></td>
                                        <td class='text-center' style="font-size: 20px;"><span
                                                class="badge bg-teal disabled color-palette">70</span></td>
                                        <td class='text-center' style="font-size: 20px;"><span
                                                class="badge bg-warning disabled color-palette">90</span></td>
                                        <td class='text-center' style="font-size: 20px;"><span
                                                class="badge bg-teal disabled color-palette">43</span></td>
                                        <td class='text-center' style="font-size: 20px;"><span
                                                class="badge bg-warning disabled color-palette">100</span></td> --}}
                                    </tr>
                                    <tr>
                                        <td><b>3</b></td>
                                        <td class='text-center' style="font-size: 20px;"><i> Ruba </i></td>
                                        {{-- <td class='text-center' style="font-size: 18px;">
                            <button type="button" class="btn btn-primary btn-block"> Edit</button>
                            </td> --}}
                                        <td class='text-center' style="font-size: 18px;">ruba@gmail.com</td>

                                        <td class='text-center' style="font-size: 20px;"><span
                                                class="badge bg-teal disabled color-palette">32</span></td>
                                        {{-- <td class='text-center' style="font-size: 20px;"><span
                                                class="badge bg-warning disabled color-palette">46</span></td>
                                        <td class='text-center' style="font-size: 20px;"><span
                                                class="badge bg-teal disabled color-palette">12</span></td>
                                        <td class='text-center' style="font-size: 20px;"><span
                                                class="badge bg-warning disabled color-palette">23</span></td>
                                        <td class='text-center' style="font-size: 20px;"><span
                                                class="badge bg-teal disabled color-palette">29</span></td>
                                        <td class='text-center' style="font-size: 20px;"><span
                                                class="badge bg-warning disabled color-palette">44</span></td> --}}
                                    </tr>

                                    <tr>
                                        <td><b>4</b></td>
                                        <td class='text-center' style="font-size: 20px;"><i> Jaafar </i></td>
                                        {{-- <td class='text-center' style="font-size: 18px;">
                            <button type="button" class="btn btn-primary btn-block"> Edit</button>
                            </td> --}}
                                        <td class='text-center' style="font-size: 18px;">jaafar@gmail.com</td>

                                        <td class='text-center' style="font-size: 20px;"><span
                                                class="badge bg-teal disabled color-palette">16</span></td>
                                        {{-- <td class='text-center' style="font-size: 20px;"><span
                                                class="badge bg-warning disabled color-palette">23</span></td>
                                        <td class='text-center' style="font-size: 20px;"><span
                                                class="badge bg-teal disabled color-palette">53</span></td>
                                        <td class='text-center' style="font-size: 20px;"><span
                                                class="badge bg-warning disabled color-palette">73</span></td>
                                        <td class='text-center' style="font-size: 20px;"><span
                                                class="badge bg-teal disabled color-palette">63</span></td>
                                        <td class='text-center' style="font-size: 20px;"><span
                                                class="badge bg-warning disabled color-palette">67</span></td> --}}
                                    </tr>

                                </tbody>
                                {{-- <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <!-- Add more table cells with user data if needed -->
                        </tr>
                        @endforeach
                    </tbody> --}}
                                <tfoot>
                                    {{-- <tr>
                            <th style="width: 1%"><b> #</b></th>
                            <th style="width: 19%" >Start Date </th>
                            <th style="width: 10%" >Opens at</th>
                            <th style="width: 10%" >Closes at</th>
                            <th class='text-center' style="width: 10%">Min Plays </th>
                            <th class='text-center' style="width: 10%">MaxPlays </th>
                            <th class='text-center' style="width: 10%" >Min Activities</th>
                            <th class='text-center' style="width: 10%" >Max Activities</th>
                            <th class='text-center' style="width: 10%" >Min Lectures</th>
                            <th class='text-center' style="width: 10%" >Max Lectures</th>
                          </tr> --}}
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
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
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
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
    </script>
@endsection
