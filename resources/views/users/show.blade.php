@extends('layouts.app')

@section('content')
<div class="py-15">
    <div class="container mx-auto px-5 sm:px-40">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="py-10 px-6 bg-white shadow text-center rounded-lg xl:px-10 border border-gray-200 mb-6">
                    <div class="space-y-6">
                        @if($user->profile_picture)
                        <img class="mx-auto h-40 w-40 rounded-full xl:w-56 xl:h-56" src="/storage/images/profiles/{{$user->profile_picture}}" alt="">
                        @else
                        <span class="mx-auto h-40 w-40 rounded-full block bg-gray-100  xl:w-56 xl:h-56">
                            <svg class="h-full w-full text-gray-300 rounded-full" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </span>
                        @endif
                        <div class="leading-6 space-y-1 text-center">
                            <h4 class="text-gray-900 font-medium text-xl">{{$user->name}}</h4>
                            <p class="text-gray-500">{{$user->roles()->first()['name']}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="md:col-span-2">
                <div class="bg-white shadow overflow-hidden rounded-lg border border-gray-200">
                    <div class="px-4 py-4 border-b border-gray-200 sm:px-6 bg-white">
                      <h3 class="text-lg leading-6 font-medium text-gray-800">
                        Contact Information
                      </h3>
                    </div>
                    <div>
                      <dl>
                        @if(!Auth::guest())
                        <div class="bg-white px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:border-t sm:border-gray-200">
                          <dt class="text-sm leading-5 font-medium text-gray-500">
                            Email Address
                          </dt>
                          <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{$user->email}}
                          </dd>
                        </div>
                        @endif
                        <div class="bg-white px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:border-t sm:border-gray-200">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                              Personal Website
                            </dt>
                            <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                              <a href="https://{{$user->website}}">{{$user->website}}</a>
                            </dd>
                          </div>
                          <div class="bg-white px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:border-t sm:border-gray-200">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                              GitHub Profile
                            </dt>
                            <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                              <a href="https://github.com/{{$user->github}}">github.com/{{$user->github}}</a>
                            </dd>
                          </div>
                      </dl>
                    </div>
                </div>
                <div class="bg-white shadow overflow-hidden rounded-lg mt-6 border border-gray-200">
                    <div class="px-4 py-4 border-b border-gray-200 sm:px-6 bg-white">
                      <h3 class="text-lg leading-6 font-medium text-gray-800">
                        About
                      </h3>
                    </div>
                    <div class="text-sm px-8 py-6 sm:border-t sm:border-gray-200">
                        {{$user->about}}
                    </div>
                </div>
                  
            </div>
        </div>
    </div>
</div>
          

@endsection