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
                  <span class="text-sm mb-1 inline-block font-semibold uppercase text-gray-500">Edit User</span>
                  <h1 class="text-xl font-medium leading-6 text-gray-900 sm:truncate">
                    {{$user->name}}
                  </h1>
                </div>
                <div class="mt-4 flex md:mt-0 md:ml-4">
                  <span class="hidden sm:block shadow-sm rounded-md float-right mr-3">
                    <a href="/users/{{$user->id}}" type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                      <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                      </svg>
                      View
                    </a>
                  </span>
                </div>
            </div>
        </div>
        <div class="px-40 pt-6 bg-gray-50 pb-1">@include('layouts.messages')</div>
        <div class="hidden sm:block">
          <div class="align-middle inline-block min-w-full px-40 py-6 bg-gray-50">
            <div>
                <div class="md:grid md:grid-cols-3 md:gap-6">
                  <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                      <h3 class="text-lg font-medium leading-6 text-gray-900">Profile</h3>
                      <p class="mt-1 text-sm leading-5 text-gray-600">
                        This information will be displayed publicly so be careful what you share.
                      </p>
                    </div>
                  </div>
                  <div class="mt-5 md:mt-0 md:col-span-2">
                    {!! Form::open(['action' => ['UsersController@update', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'mb-0']) !!}
                      <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white sm:p-6">
                          <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                {{ Form::label('profile_name', 'Name', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                                {{ Form::text('profile_name', $user->name, ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'John Doe']) }}
                            </div>
              
                            <div class="col-span-6 sm:col-span-3">
                                {{ Form::label('profile_email', 'Email', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                                {{ Form::text('profile_email', $user->email, ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'me@example.com']) }}
                            </div>

                            <div class="col-span-3 sm:col-span-3">
                              {{ Form::label('profile_website', 'Personal Website', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                              <div class="mt-1 flex rounded-md shadow-sm">
                                <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                  https://
                                </span>
                                {{ Form::text('profile_website', $user->website, ['class' => 'form-input flex-1 block w-full rounded-none rounded-r-md transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'example.com']) }}
                              </div>
                            </div>

                            <div class="col-span-3 sm:col-span-3">
                              {{ Form::label('profile_github', 'GitHub Profile', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                              {{ Form::text('profile_github', $user->github, ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => '@username']) }}
                            </div>
                          </div>
              
                          <div class="mt-6">
                            {{ Form::label('profile_about', 'About', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                            {{ Form::textarea('profile_about', $user->about, ['rows' => '3', 'class' => 'form-textarea mt-1 block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5']) }}
                          </div>
              
                          <div class="mt-6">
                            {{ Form::label('profile_picture', 'Profile Picture', ['class' => 'block text-sm leading-5 font-medium text-gray-700']) }}
                            <div class="mt-3 flex items-center">
                              <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                                @if($user->profile_picture)
                                <img src="/storage/images/profiles/{{$user->profile_picture}}">
                                @else
                                <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                  <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                                @endif
                              </span>
                              <span class="ml-5 rounded-md shadow-sm">
                                {{ Form::file('profile_picture', ['class' => 'py-2 px-3 border border-gray-300 rounded-md text-sm leading-4 text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out'])}}
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                          <span class="inline-flex rounded-md shadow-sm">
                            {{ Form::submit('Update', ['class' => 'inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-700 transition duration-150 ease-in-out'])}}
                          </span>
                        </div>
                      </div>
                    {{ Form::hidden('_method', 'PUT')}}
                    {!! Form::close() !!}
                  </div>
                </div>
              </div>

              <div class="hidden sm:block">
                <div class="py-16">
                  <div class="border-t border-gray-200"></div>
                </div>
              </div>
              
              <div class="sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                  <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                      <h3 class="text-lg font-medium leading-6 text-gray-900">Manage Role</h3>
                      <p class="mt-1 text-sm leading-5 text-gray-600">
                        Decide which communications you'd like to receive and how.
                      </p>
                    </div>
                  </div>
                  <div class="mt-5 md:mt-0 md:col-span-2">
                    {!! Form::open(['action' => ['UsersController@update', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'mb-0']) !!}
                      <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                          <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-6">
                                {{ Form::label('new_role', 'User Role', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                                {{ Form::select('new_role', ['1' => 'Member', '2' => 'Contributor', '3' => 'Manager', '4' => 'Administrator'], $user->roles()->first()['id'], ['class' => 'mt-1 form-select block w-full pl-3 pr-10 py-2 text-base leading-6 border-gray-300 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5']) }}
                            </div>
                          </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            {{ Form::submit('Update Role', ['class' => 'inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-700 transition duration-150 ease-in-out'])}}
                        </div>
                      </div>
                    {{ Form::hidden('_method', 'PUT')}}
                    {!! Form::close() !!}
                  </div>
                </div>
              </div>
              
              <div class="hidden sm:block">
                <div class="py-16">
                  <div class="border-t border-gray-200"></div>
                </div>
              </div>
              
              <div class="sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                  <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                      <h3 class="text-lg font-medium leading-6 text-gray-900">Change Password</h3>
                      <p class="mt-1 text-sm leading-5 text-gray-600">
                        Update the password you use for your Grytte.org account.
                      </p>
                    </div>
                  </div>
                  <div class="mt-5 md:mt-0 md:col-span-2">
                    {!! Form::open(['action' => ['UsersController@update', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'mb-0']) !!}
                      <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                          <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-6">
                                {{ Form::label('password_current', 'Current Password', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                                {{ Form::password('password_current', ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5']) }}
                            </div>

                            <div class="col-span-6 sm:col-span-6">
                                {{ Form::label('password_new', 'New Password', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                                {{ Form::password('password_new', ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5']) }}
                            </div>

                            <div class="col-span-6 sm:col-span-6">
                                {{ Form::label('password_new_confirm', 'Confirm New Password', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                                {{ Form::password('password_new_confirm', ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5']) }}
                            </div>
                          </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            {{ Form::submit('Change Password', ['class' => 'inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-700 transition duration-150 ease-in-out'])}}
                        </div>
                      </div>
                    {{ Form::hidden('_method', 'PUT')}}
                    {!! Form::close() !!}
                  </div>
                </div>

                <div class="hidden sm:block">
                    <div class="py-16">
                      <div class="border-t border-gray-200"></div>
                    </div>
                  </div>

                <div class="pb-10 sm:mt-0">
                    <div class="shadow overflow-hidden sm:rounded-md bg-white px-4 py-5">
                        <div class="md:flex md:items-center md:justify-between">
                            <div class="flex min-w-0">
                              <div class="mx-auto float-left flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                              </div>
                            </div>
                            <div class="flex-1 min-w-0">
                              <div class="ml-3">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                                    Deactivate Account
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm leading-5 text-gray-500">
                                    Are you sure you want to deactivate your account? All of your data will be permanently deleted. This action cannot be undone.
                                    </p>
                                </div>
                              </div>
                            </div>
                            <div class="mt-4 flex md:mt-0 md:ml-4">
                                {!! Form::open(['action' => ['UsersController@destroy', $user->id], 'method' => 'POST', 'class' => 'mb-0']) !!}
                                <span class="hidden sm:block shadow-sm rounded-md float-right">
                                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                                    <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Deactivate
                                    </button>
                                </span>
                                {{ Form::hidden('_method', 'DELETE')}}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
                  
              </div>
          </div>
        </div>
      </main>
    </div>
  </div>