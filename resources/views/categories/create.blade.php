@extends('layouts.app')
@section('content')
<h1 class="text-center">Create New Category</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Create New Category</h3>
                </div>
                <!--card-header-->
                <div class="card-body">
                    <!-- /resources/views/post/create.blade.php -->

                    <h1>Create Post</h1>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Create Post Form -->
                    <form method="post" action="{{route('category.store')}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control"
                                placeholder="Enter Category Name">
                        </div>
                        <button type="submit" class="btn btn-primary">Add Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection