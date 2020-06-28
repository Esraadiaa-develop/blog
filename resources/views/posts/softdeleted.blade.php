@extends('layouts.app')
@section('content')
<h1 class="text-center">Display Soft Deleted Posts</h1>
@if ($posts->count()>0)
<table class="table table-striped w-50 mx-auto">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Image</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->title}}</td>
            <td> <img src="{{$post->image}}" width="100" alt=""> </td>
            <td> <a href="/posts/restore/{{$post->id}}">Restore</a> </td>
            <td> <a href="/posts/hdelete/{{$post->id}}">Delete</a> </td>
            
        </tr>
        @endforeach
    </tbody>
</table>
@else
<h1 class="text-center">NO POSTS <h1>
        @endif
@endsection