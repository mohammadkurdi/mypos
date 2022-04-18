@extends('layouts.dashboard.app')

@section('content')

  @php
  $i = 0;   
  @endphp

              <div class="card-header">
                <h3 class="card-title">Administraters</h3>

                <div class="card-tools">
                  <div class="row">
                    <div class="col-md-4">
                      <a href="{{route('dashboard.users.create')}}"><button type="button" class="btn btn-block btn-success btn-sm">Create</button></a>
                    </div>

                    <div class="col-md-4">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>

                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" >
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Take an action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$user->first_name}}</td>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                          <div class="btn-group">
                            <button type="button" class="btn btn-default">Action</button>
                            <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu">
                              <a class="dropdown-item" href="#">edit</a>
                              <a class="dropdown-item" href="#">Delete</a>
                            </div>
                          </div>
                        </td>
                    </tr>
                @endforeach
                  </tbody>

                </table>

              </div>
              <!-- /.card-body -->
              
            </div>
            <!-- /.card -->

@endsection