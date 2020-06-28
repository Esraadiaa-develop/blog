@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h3> Edit Category</h3>
                </div> <!-- card-header -->
                <div class="card-body">
                    <form method="post" action="{{route('category.update',['id'=>$category->id])}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{$category->name}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Category</button>
                    </form>
                </div> <!-- card-body -->
            </div> <!-- card -->
        </div> <!-- col-md-8 -->
    </div> <!-- row -->
</div> <!-- container -->
@endsection