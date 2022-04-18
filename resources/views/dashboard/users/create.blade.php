@extends('layouts.dashboard.app')

@section('content')


<div>

    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Create user</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('dashboard.users.store') }}">
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label >First name</label>
                  <input type="text" class="form-control"  placeholder="Enter first name" name="first_name" required value="{{old('first_name')}}">
                </div>
                <div class="form-group">
                  <label >Last name</label>
                  <input type="text" class="form-control"  placeholder="Enter last name" name="last_name" required value="{{old('last_name')}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" required value="{{old('email')}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required name="password" autocomplete="new-password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required name="password_confirmation">
                </div>

              <!-- /.card-body -->
              @php
                  $models = ['users', 'categories', 'products']
              @endphp

              
              <div class="card card-primary card-outline card-tabs">
                <div class="card-header p-0 pt-1 border-bottom-0">
                  <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                    @foreach ($models as $index=>$model)
                    <li class="nav-item">
                        <a class="nav-link {{$index == 0 ? 'active' : ''}}" id="custom-tabs-three-home-tab" data-toggle="pill" href="#{{$model}}" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">{{$model}}</a>
                    </li>
                    @endforeach
                  </ul>
                </div>
                <div class="card-body">
                  <div class="tab-content" id="custom-tabs-three-tabContent">
                    @foreach ($models as $index=>$model)
                    <div class="tab-pane {{$index == 0 ? 'active': ''}}" id="{{$model}}">
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="Add" value="{{$model}}-create" name="permissions[]">
                        <label for="Add" class="custom-control-label">Add</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="View" value="{{$model}}-read" name="permissions[]">
                        <label for="View" class="custom-control-label">View</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="Edit" value="{{$model}}-update" name="permissions[]"> 
                        <label for="Edit" class="custom-control-label">Edit</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="Delete" value="{{$model}}-delete" name="permissions[]">
                        <label for="Delete" class="custom-control-label">Delete</label>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
                <!-- /.card -->
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>add</button>
              </div>
            </form>
        </div>
        </section>
</div>




@endsection
