@extends('dashboard.master')
@section('title')
All Users
@endsection
@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Users Index</h1>

            <div class="card-tools">
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
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 300px;">
            <table class="table table-head-fixed text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Mobile</th>
                        <th>Is Archive</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></td>
                            <td>{{ $user->email }}</td>
                            <td>{!!($user->gender) == 1 ? "<i class='fas fa-check-square' style='color: #269310;'></i>" : "<i class='fas fa-times' style='color: #fa0000;'></i>"!!}</td>
                            <td>{{ $user->mobile }}</td>
                            <td> @if ($user->trashed()) <a href="{{route('users.restore', $user )}}">TRASHED</a> @else 'ACTIVE' @endif </td>
                            <td>
                                <a href="{{route('users.show', $user->id)}}"><span class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></span></a>
                                <a href="{{route('users.edit', $user->id)}}"><span class="btn btn-info btn-sm"><i class="fa fa-edit"></i></span></a>
                            </td>
                            <td>
                                <form method="post" action="{{ route('users.destroy', $user->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger btn-sm" value="Delete" />
                                </form>
                                
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No Users added to the site</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>


@endsection
