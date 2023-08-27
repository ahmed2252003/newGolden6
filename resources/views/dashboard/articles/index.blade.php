@extends('dashboard.master')



@section('title')
    Articles
@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Articles Index</h1>

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
                            <th>Title</th>
                            <th>Status</th>
                            <th>Auther</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($articles as $article)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a></td>
                                <td>{!! $article->status
                                    ? "<i class='fas fa-check-square' style='color: #269310;'></i>"
                                    : "<i class='fas fa-times' style='color: #fa0000;'></i>" !!}</td>
                                <td><span class="tag tag-success"></span>{{ $article->user->name }}</td>
                                <td>{{ $article->created_at }}</td>
                                <td>
                                    <a href="{{ route('articles.show', $article->id) }}"><span
                                            class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></span></a>
                                    <a href="{{ route('articles.edit', $article->id) }}"><span
                                            class="btn btn-info btn-sm"><i class="fa fa-edit"></i></span></a>
                                    <a href="{{ route('articles.destroy', $article->id) }}"><span
                                            class="btn btn-danger btn-sm"><i class="fa fa-eye-dropper"></i></span></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">No Articles added to the site</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <div class="justify-center">
            {{ $articles->links() }}
        </div>
        <!-- /.card -->
    </div>
@endsection
