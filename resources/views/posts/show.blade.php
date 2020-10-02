<style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans);

    #circle-shape-example {
        font-family: Open Sans, sans-serif;
        margin: 2rem;
    }

    #circle-shape-example p {
        line-height: 1.8;
    }

    #circle-shape-example .curve {
        width: 33%;
        height: auto;
        min-width: 150px;
        float: left;
        margin-right: 2rem;
        border-radius: 50%;
        -webkit-shape-outside: circle();
        shape-outside: circle();
    }

    .orange-btn {
        background: #e27025;
        font-size: 18px;
        text-transform: uppercase;
        align-content: center;
        color: white;
        padding: 15px;
        transition: 0.3s;
        width: fit-content;
    }

    .red {
        background: red;
    }

    .orange-btn:hover {
        background: transparent;
        cursor: pointer;
        color: #e27025;
        border: 1px solid #e27025;
        transition: 0.3s;
    }
</style>

@extends('layouts.app')

@section('content')

<div id="circle-shape-example">
    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/4273/kiwifruit-on-a-plate.jpg"
        alt="A photograph of sliced kiwifruit on a while plate" class="curve">
    <h1>{{$post->title}}</h1>
    <h4>{{\Carbon\Carbon::parse($post->created_at)->format('Y-m-d')}}</h4>
    <p>{{$post->body}}</p>
</div>

<hr />

<h4>Display Comments</h4>

@foreach($comments as $comment)
<div class="display-comment">
    <p>{{ $comment->name }} // {{ $comment->email }} says:</p>
    <p>{{ $comment->body }}</p>
</div>
@endforeach

<hr />

<h4>Add comment</h4>
<form method="POST" action="/posts/{{$post->id}}/comment">
    @csrf
    <div class=" form-group">
        <input type="text" name="body" placeholder="Comment" class="form-control" />
        <input type="text" name="name" placeholder="Username" class="form-control" />
        <input type="text" name="email" placeholder="Email" class="form-control" />
        <input type="hidden" name="post_id" value="{{ $post->id }}" />
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-warning" value="Add Comment" />
    </div>
</form>

@can ('edit-post', $post)
<a href="/posts/{{$post->id}}/edit" class="orange-btn">Edit Post</a>
<a href="/posts/{{$post->id}}/delete" class="orange-btn red">Delete Post</a>
@endcan
@stop