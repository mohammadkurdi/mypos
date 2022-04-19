@extends('layouts.dashboard.app')

@section('content')


<div>

    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit user</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('dashboard.users.update',$user->id) }}">
                @csrf
                @method('PUT') 
              <div class="card-body">
                <div class="form-group">
                  <label >First name</label>
                  <input type="text" class="form-control"  placeholder="Enter first name" name="first_name" required value="{{$user->first_name}}">
                </div>
                <div class="form-group">
                  <label >Last name</label>
                  <input type="text" class="form-control"  placeholder="Enter last name" name="last_name" required value="{{$user->last_name}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" required value="{{$user->email}}">
                </div>

              <!-- /.card-body -->
              @php
                  $models = ['users', 'categories', 'products'];
                  $maps = ['create', 'read', 'update', 'delete']; 
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
                        @foreach ($maps as $map)
                        <div class="custom-control custom-checkbox">
                          <label><input  type="checkbox"  name="permissions[]" value="{{$model . '-' . $map}}" {{$user->hasPermission($model . '-' . $map)? 'checked' : ''}}>  {{$map}}</label>
                        </div>
                      @endforeach
                    </div>
                    @endforeach
                  </div>
                </div>
                <!-- /.card -->
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Update</button>
              </div>
            </form>
        </div>
        </section>
</div>




@endsection
