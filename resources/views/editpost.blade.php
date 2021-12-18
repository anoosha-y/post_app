@extends('layouts.myapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h3>Edit single post</h3>
                <form action="{{route('post.update')}}" method="POST" enctype="multipart/form-data"> {{ csrf_field() }}
                    <div class="mb-3">
                        <h5 class="card-title">{{$post->users->name}}</h5>
                        <label for="name" class="form-label">Name</label>
                        <input name="id" type="hidden" value="{{$post->id}}">
                        <input name="name" type="text" class="form-control" value="{{$post->name}}" placeholder="name">
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">Image</label>
                        <img src="{{asset('/storage/postimage/'.$post->image)}}" class="card-img-top" style="width: 18rem; margin: 10px;">
                        <input name="oldimage" type="hidden" value="{{$post->image}}">
                        <input name="image" class="form-control" type="file">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Update</button>
                        <button class="btn mb-3"><a class="nav-link" href={{ route('post.create')}}>Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
