@extends('layouts.app')

@section('content')
<div class="bg-white pt-16 pb-16 px-4 sm:px-6 lg:pt-24 lg:px-8">
    <div class="relative max-w-lg mx-auto lg:max-w-7xl">
      <div>
        <h2 class="text-3xl leading-9 tracking-tight font-extrabold text-gray-900 sm:text-4xl sm:leading-10">
          Blog
        </h2>
        <div class="mt-3 sm:mt-4 lg:grid lg:grid-cols-2 lg:gap-5 lg:items-center">
          <p class="text-xl leading-7 text-gray-500">
            Get weekly articles in your inbox on how to grow your business.
          </p>
        </div>
      </div>
      <div class="mt-6 grid gap-16 border-t-2 border-gray-300 pt-10 lg:grid-cols-2 lg:col-gap-5 lg:row-gap-12">
        @if(count($posts) > 0)
        @foreach($posts as $post)
        <div>
          <p class="text-sm leading-5 text-gray-500">
            <time>{{$post->created_at}}</time>
          </p>
          <a href="/posts/{{$post->id}}" class="block">
            <h3 class="mt-2 text-xl leading-7 font-semibold text-gray-900">
                {{$post->title}}
            </h3>
            <p class="mt-3 text-base leading-6 text-gray-500">
              Illo sint voluptas. Error voluptates culpa eligendi. Hic vel totam vitae illo. Non aliquid explicabo necessitatibus unde. Sed exercitationem placeat consectetur nulla deserunt vel. Iusto corrupti dicta.
            </p>
          </a>
          <div class="mt-3">
            <a href="/posts/{{$post->id}}" class="text-base leading-6 font-semibold text-red-600 hover:text-red-500 transition ease-in-out duration-150">
              Read full story
            </a>
          </div>
        </div>
        @endforeach
        @else
        <p>No posts found.</p>
        @endif
      </div>
      <div class="mt-12">
        {{$posts->links()}}
      </div>
    </div>
  </div>
@endsection