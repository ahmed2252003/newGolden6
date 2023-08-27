@extends('dashboard.master')
@section('title')
    Create User
@endsection
@section('content')
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create User</h3>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="{{ route('users.change-password') }}">
                @csrf

                    <div class="form-group">
                        <label for="exampleInputPassword1">Old Password</label>
                        <input name="old_password" type="password" class="form-control" id="exampleInputPassword1"
                            placeholder="Password">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1"
                            placeholder="Password">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password Confirmation</label>
                        <input name="password_confirmation" type="password" class="form-control" id="exampleInputPassword1"
                            placeholder="Password">
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update Password</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    @endsection
