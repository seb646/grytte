@extends('layouts.app')

@section('content')
    <a href="/posts">View All Posts</a>
    <h1>{{$post->title}}</h1>
    Post created on {{$post->created_at}} by {{$post->user->name}}
    <img src="/storage/images/posts/{{$post->cover_image}}"/>
    {!!$post->body!!}

    @if(!Auth::guest())
        @if(@Auth::user()->id == $post->user_id)
            <hr>
            <a href="/posts/{{$post->id}}/edit">Edit</a>
            {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST']) !!}
                {{ Form::hidden('_method', 'DELETE')}}
                {{ Form::submit('Delete', ['class' => 'group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out'])}}
            {!! Form::close() !!}
        @endif
    @endif
@endsection