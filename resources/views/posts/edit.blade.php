@extends('layouts.admin')

@section('content')
<div class="h-screen flex overflow-hidden bg-white">
    @include('layouts.dashnav')
    <!-- Main column -->
    <div class="flex flex-col w-0 flex-1 overflow-hidden">
      <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none" tabindex="0">
        <!-- Page title & actions -->
        <div class="border-b border-gray-200 px-4 py-7 sm:px-6 lg:px-8">
            <div class="md:flex md:items-center md:justify-between">
                <div class="flex-1 min-w-0">
                  <span class="text-sm mb-1 inline-block font-semibold uppercase text-gray-500">Edit Blog Post</span>
                  <h1 class="text-xl font-medium leading-6 text-gray-900 sm:truncate">
                    {{$post->title}}
                  </h1>
                </div>
                <div class="mt-4 flex md:mt-0 md:ml-4">
                  <span class="hidden sm:block shadow-sm rounded-md float-right mr-3">
                    <a href="/posts/{{$post->id}}" type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                      <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                      </svg>
                      View
                    </a>
                  </span>
                  @if(Auth::user()->hasAnyRole(['administrator', 'manager']))
                  {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST']) !!}
                  {{ Form::hidden('_method', 'DELETE')}}
                  <span class="hidden sm:block shadow-sm rounded-md float-right">
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                      <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                      </svg>
                      Delete
                    </a>
                  </button>
                  {!! Form::close() !!}
                  @endif
                </div>
            </div>
        </div>
        <div class="px-40 pt-6 bg-gray-50 pb-1">@include('layouts.messages')</div>
        <div class="hidden sm:block">
          <div class="align-middle inline-block min-w-full px-40 py-6 bg-gray-50" style="min-height: calc(100vh - 135px)">
            <div>
                <div class="md:grid md:grid-cols-3 md:gap-6">
                  <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                      <h3 class="text-lg font-medium leading-6 text-gray-900">Blog Post</h3>
                      <p class="mt-1 text-sm leading-5 text-gray-600">
                        This information will be displayed publicly so be careful what you share.
                      </p>
                    </div>
                  </div>
                  <div class="mt-5 md:mt-0 md:col-span-2">
                    {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                      <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white sm:p-6">
                          <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-6">
                                {{ Form::label('title', 'Title', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                                {{ Form::text('title', $post->title, ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'John Doe']) }}
                            </div>

                            <div class="col-span-6 sm:col-span-6">
                                {{ Form::label('body', 'Post Content', ['class' => 'block text-sm font-medium leading-5 text-gray-700 mb-1']) }}
                                {{ Form::textarea('body', $post->body, ['rows' => '3', 'class' => 'ckeditor form-textarea mt-1 block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5']) }}
                            </div>
                          </div>
                          <div class="mt-6">
                            {{ Form::label('cover_image', 'Cover Image', ['class' => 'block text-sm leading-5 font-medium text-gray-700 mb-1']) }}
                            <span class="rounded-md shadow-sm">
                                {{ Form::file('cover_image', ['class' => 'py-2 px-3 border border-gray-300 rounded-md text-sm leading-4 text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out'])}}
                            </span>
                          </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                          <span class="inline-flex rounded-md shadow-sm">
                            {{ Form::submit('Update Post', ['class' => 'inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-700 transition duration-150 ease-in-out'])}}
                          </span>
                        </div>
                      </div>
                    {{ Form::hidden('_method', 'PUT')}}
                    {!! Form::close() !!}
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
@endsection