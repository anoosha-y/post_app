@extends('layouts.myapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h3>View single post</h3>
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
                        <a href="{{ route('post.delete', ['id'=>$post->id,'name'=>0,'image'=>$post->image]) }}" class="btn btn-danger">Delete post</a>
                        @endif

                    @endguest
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
