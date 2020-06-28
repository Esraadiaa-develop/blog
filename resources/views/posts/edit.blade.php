@extends('layouts.app');
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h3> Edit Post {{$posts->title}}</h3>
                </div> <!-- card-header -->
                <div class="card-body">
                    @if(count($errors)>0)
                    <ul>
                        @foreach($errors->all() as $error)
                        <li> {{$error}} </li>
                        @endforeach
                    </ul>
                    @endif
                    <form method="post" action="{{route('post.update',['id'=>$posts->id])}}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" class="form-control" value="{{$posts->title}}">
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select id="category_id" name="category_id" class="form-control">
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea id="content" name="content" class="form-control"
                                rows="6"> {{$posts->content}} </textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Upload Image</label>
                            <input type="file" id="image" name="image" class="form-control-file"
                                placeholder="Upload Post image">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Post</button>
                    </form>
                </div> <!-- card-body -->
            </div> <!-- card -->
        </div> <!-- col-md-8 -->
    </div> <!-- row -->
</div> <!-- container -->
@endsection