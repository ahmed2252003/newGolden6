@extends('dashboard.master')

@section('title')
Create Article
@endsection
@section('content')

<div class="col-md-8">
  <!-- general form elements -->
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit Article</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('articles.store') }}" method="post">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="title">Title</label>
          <input value="{{ old('title', $article->title) }}" type="text" class="form-control" id="title" placeholder="Enter Title" name="title">
        </div>

        <!-- textarea -->
        <div class="form-group">
          <label>Content</label>
          <textarea name="content" class="form-control" rows="5" placeholder="Enter ...">{{old('content', $article->content)}}</textarea>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">SAve</button>
        </div>
    </form>
  </div>
  <!-- /.card -->

  @endsection
