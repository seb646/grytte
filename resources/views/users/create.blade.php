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
                    Create User
                  </h1>
                </div>
            </div>
        </div>
        <div class="px-40 pt-6 bg-gray-50 pb-1">@include('layouts.messages')</div>
        <div class="hidden sm:block">
          <div class="align-middle inline-block min-w-full px-40 py-6 bg-gray-50" style="height:calc(100vh - 81px);">
            <div>
                <div class="md:grid md:grid-cols-3 md:gap-6">
                  <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                      <h3 class="text-lg font-medium leading-6 text-gray-900">User Information</h3>
                      <p class="mt-1 text-sm leading-5 text-gray-600">
                        This information will be displayed publicly so be careful what you share.
                      </p>
                    </div>
                  </div>
                  <div class="mt-5 md:mt-0 md:col-span-2">
                    {!! Form::open(['action' => ['UsersController@store'], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'mb-0']) !!}
                      <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white sm:p-6">
                          <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                {{ Form::label('profile_name', 'Name', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                                {{ Form::text('profile_name', '', ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'John Doe']) }}
                            </div>
              
                            <div class="col-span-6 sm:col-span-3">
                                {{ Form::label('profile_email', 'Email', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                                {{ Form::text('profile_email', '', ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'me@example.com']) }}
                            </div>

                            <div class="col-span-6">
                                {{ Form::label('password', 'Password', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                                {{ Form::password('password', ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5']) }}
                            </div>

                            <div class="col-span-3 sm:col-span-3">
                              {{ Form::label('profile_website', 'Personal Website', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                              <div class="mt-1 flex rounded-md shadow-sm">
                                <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                  https://
                                </span>
                                {{ Form::text('profile_website', '', ['class' => 'form-input flex-1 block w-full rounded-none rounded-r-md transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'example.com']) }}
                              </div>
                            </div>

                            <div class="col-span-3 sm:col-span-3">
                              {{ Form::label('profile_github', 'GitHub Profile', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                              {{ Form::text('profile_github', '', ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => '@username']) }}
                            </div>
                          </div>
              
                          <div class="mt-6">
                            {{ Form::label('profile_about', 'About', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                            {{ Form::textarea('profile_about', '', ['rows' => '3', 'class' => 'form-textarea mt-1 block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5']) }}
                          </div>
              
                          <div class="mt-6">
                            {{ Form::label('profile_picture', 'Profile Picture', ['class' => 'block text-sm leading-5 font-medium text-gray-700']) }}
                            <div class="mt-3 flex items-center">
                              <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                                <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                  <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                              </span>
                              <span class="ml-5 rounded-md shadow-sm">
                                {{ Form::file('profile_picture', ['class' => 'py-2 px-3 border border-gray-300 rounded-md text-sm leading-4 text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out'])}}
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                          <span class="inline-flex rounded-md shadow-sm">
                            {{ Form::submit('Create User', ['class' => 'inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-700 transition duration-150 ease-in-out'])}}
                          </span>
                        </div>
                      </div>
                    {!! Form::close() !!}
                  </div>
                </div>
              </div>
          </div>
        </div>
      </main>
    </div>
  </div>