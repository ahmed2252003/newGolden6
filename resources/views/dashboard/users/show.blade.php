@extends('dashboard.master')
@section('title')
Show User Details
@endsection
@section('content')


<p>Date of Birth: {{$user->profile->dob}}</p>
<p>Details: {{$user->profile->details}}</p>

<div>User Articles</div>
@forelse ($user->articles as $item)
    <p>{{$item->title}}</p>
    @empty
    <p>{{$user->name}} Have No Articles</p>
@endforelse
{{-- @dd($user->articles) --}}


@endsection