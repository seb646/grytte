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
                  <h1 class="text-xl font-medium leading-6 text-gray-900 sm:truncate">
                    Create Blog Post
                  </h1>
                </div>
            </div>
        </div>
        <div class="px-40 pt-6 bg-gray-50 pb-1">@include('layouts.messages')</div>
        <div class="hidden sm:block">
          <div class="align-middle inline-block min-w-full px-40 py-6 bg-gray-50" style="min-height: calc(100vh - 119px)">
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
                    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                      <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white sm:p-6">
                          <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-6">
                                {{ Form::label('title', 'Title', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                                {{ Form::text('title', '', ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'John Doe']) }}
                            </div>

                            <div class="col-span-6 sm:col-span-6">
                                {{ Form::label('body', 'Post Content', ['class' => 'block text-sm font-medium leading-5 text-gray-700 mb-1']) }}
                                {{ Form::textarea('body', '', ['rows' => '3', 'class' => 'ckeditor form-textarea mt-1 block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5']) }}
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
                            {{ Form::submit('Create Post', ['class' => 'inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-700 transition duration-150 ease-in-out'])}}
                          </span>
                        </div>
                      </div>
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