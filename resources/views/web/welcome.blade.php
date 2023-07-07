@extends('web.layouts.master')

@section('title')
    Dashboard || Home Page
@endsection {{-- or @stop --}}

@section('css')

@endsection

@section('root')
Dashboard
@endsection

@section('son1')

@endsection

@section('son2')
Dashboard
@endsection

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3 class="text-white" >150</h3>

                <p class="text-white">
                    Lectures & Plays
                </p>
                </div>
                <div class="icon">
                    <i class="fa fa-tasks" aria-hidden="true"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3 class="text-white">53</h3>

                  <p class="text-white">Books</p>
                </div>
                <div class="icon">
                  {{-- <i class="ion ion-stats-bars"></i> --}}
                  <i class="fa fa-book" aria-hidden="true"></i>
                  {{-- <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 512 512"><path fill="silver" d="M202.24 74C166.11 56.75 115.61 48.3 48 48a31.36 31.36 0 0 0-17.92 5.33A32 32 0 0 0 16 79.9V366c0 19.34 13.76 33.93 32 33.93c71.07 0 142.36 6.64 185.06 47a4.11 4.11 0 0 0 6.94-3V106.82a15.89 15.89 0 0 0-5.46-12A143 143 0 0 0 202.24 74Zm279.68-20.7A31.33 31.33 0 0 0 464 48c-67.61.3-118.11 8.71-154.24 26a143.31 143.31 0 0 0-32.31 20.78a15.93 15.93 0 0 0-5.45 12v337.13a3.93 3.93 0 0 0 6.68 2.81c25.67-25.5 70.72-46.82 185.36-46.81a32 32 0 0 0 32-32v-288a32 32 0 0 0-14.12-26.61Z"/></svg> --}}
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3 class="text-white">44</h3>

                  <p class="text-white">Users</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3 class="text-white">97<sup style="font-size: 20px">%</sup></h3>

                  <p class="text-white">Rating</p>
                </div>
                <div class="icon">
                  <i class="fa fa-star"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->

          <div class="row">


              <!-- ./col -->
              <div class="col-lg-6 col-6">
                  <!-- small card -->
                  <div class="small-box bg-yellow">
                      <div class="inner">
                      <h3 class="text-white">Plans Management</h3>

                      <p class="text-white">Plans Management</p>
                      </div>
                      <div class="icon">
                      <i class="fas fa-th"></i>
                      </div>
                      <a href="{{ url('./web/plans', []) }}" target="_blank"  class="small-box-footer ">
                      <h6 class="text-white">Show Plans <i class="fas fa-arrow-circle-right"></i></h6>
                      </a>
                  </div>
                  </div>
                  <!-- ./col -->

                  <!-- ./col -->
                  <div class="col-lg-6 col-6">
                      <!-- small card -->
                      <div class="small-box bg-yellow">
                      <div class="inner">
                          <h3 class="text-white">Employees Management</h3>

                          <p class="text-white">Employees Management</p>
                      </div>
                      <div class="icon">
                          <i class="fas fa fa-male"></i>
                      </div>
                      <a href="#" class="small-box-footer">
                        <h6 class="text-white">Show Employees <i class="fas fa-arrow-circle-right"></i></h6>
                      </a>
                      </div>
                  </div>
                  <!-- ./col -->
          </div>

        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->

@endsection

@section('javascript')

@endsection
