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

              <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>add</button>
              </div>
            </form>
        </div>
        </section>
</div>




@endsection
