@extends('layouts.myapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2>Create a post</h2>
                <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data"> {{ csrf_field() }}
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input name="name" type="text" class="form-control" placeholder="name">
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">Image</label>
                        <input name="image" class="form-control" type="file">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Upload</button>
                    </div>
                </form>
                
                {{-- <h3>all posts</h3>
                @foreach ($posts as $post)
                <div class="card" style="width: 18rem; margin: 10px;">
                    <img src="{{asset('/storage/postimage/'.$post->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">{{$post->name}}</h5>
                    <h5 class="card-title">{{$post->users->name}}</h5>
                    <a href="{{ route('post.show', ['id'=>$post->id]) }}" class="btn btn-primary">View post</a>
                    @guest
                    @else
                    @if(auth()->user()->id==$post->user_id)
                    <a href="{{ route('post.edit', ['id'=>$post->id,'name'=>0]) }}" class="btn btn-primary">Edit post</a>
                    @endif
                    @endguest
                    </div>
                </div>
                @endforeach    --}}
            </div>
        </div>
    </div>
</div>
@endsection
