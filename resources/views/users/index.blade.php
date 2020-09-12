@extends('layouts.app')

@section('content')
<div class="bg-white">
    <div class="max-w-screen-xl py-12 px-4 sm:px-6 lg:px-8 lg:py-24 mx-auto">
      <div class="space-y-12 sm:px-40 m-auto">
        <div class="space-y-5 sm:mx-auto sm:max-w-xl sm:space-y-4 lg:max-w-5xl text-center">
          <h2 class="text-3xl leading-9 font-extrabold tracking-tight sm:text-4xl">Our Contributors</h2>
          <p class="text-xl leading-7 text-gray-500">Ornare sagittis, suspendisse in hendrerit quis. Sed dui aliquet lectus sit pretium egestas vel mattis neque.</p>
        </div>
        <div class="bg-white shadow overflow-hidden sm:rounded-md">
            <ul>
              <?php $border = false;?>
              @foreach($users as $user)
              @if(!$border)
              <li>
              <?php $border = true;?>
              @else
              <li class="border-t border-gray-200">
              @endif
                <a href="/users/{{$user->id}}" class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                  <div class="flex items-center px-4 py-4 sm:px-6">
                    <div class="min-w-0 flex-1 flex items-center">
                      <div class="flex-shrink-0">
                        <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                            @if($user->profile_picture)
                            <img class="h-12 w-12 rounded-full" src="/storage/images/profiles/{{$user->profile_picture}}">
                            @else
                            <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                              <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            @endif
                        </span>
                      </div>
                      <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-3 md:gap-4">
                        <div>
                          <div class="text-sm leading-5 font-medium text-gray-700 truncate">{{$user->name}}</div>
                          <div class="mt-1 flex items-center text-sm leading-5 text-gray-500">
                            <span class="truncate">{{$user->roles()->first()['name']}}</span>
                          </div>
                        </div>
                        <div class="hidden md:block my-auto">
                          <div>
                            <div class="flex items-center text-sm leading-5 text-gray-500">
                              <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                              </svg>
                              <?php 
                              $num = count($user->documents);
                              if($num == 1){
                                  echo $num.' document';
                              }else{
                                  echo $num.' documents';
                              }
                              ?>
                            </div>
                          </div>
                        </div>
                        <div class="hidden md:block my-auto">
                            <div>
                              <div class="flex items-center text-sm leading-5 text-gray-500">
                                <svg class="flex-shrink-0 mr-1.5 h-4 w-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 24 24">
                                    <path fill="#6b7280" d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/>
                                </svg>
                                {{$user->github}}
                              </div>
                            </div>
                          </div>
                      </div>
                    </div>
                    <div>
                      <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                      </svg>
                    </div>
                  </div>
                </a>
              </li>
              @endforeach
            </ul>
        </div>
      </div>
    </div>
  </div>
@endsection