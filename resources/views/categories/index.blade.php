@extends('layouts.app')
@section('content')
<h1 class="text-center">Display Categories</h1>
<table class="table table-striped w-50 mx-auto">
 <thead class="thead-dark">
    <tr>
    <th scope="col">ID</th>
    <th scope="col">Name</th>
    <th scope="col">Edit</th>
    <th scope="col">Delete</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
         <th scope="row">{{$category->id}}</th>
         <td>{{$category->name}}</td>
         <td><a href="{{route('category.edit',$category->id)}}">Edit</a></td>
         <td><a href="{{route('category.delete',$category->id)}}">Delete</a></td>   
        </tr>   
        @endforeach
    </tbody>
 </thead>     
@endsection