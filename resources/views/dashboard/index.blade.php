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
                  Dashboard
                </h1>
              </div>
              <div class="mt-4 flex md:mt-0 md:ml-4">
                  <span class="hidden sm:block shadow-sm rounded-md float-right">
                      <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                        <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500 group-focus:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        Log Out
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                      </form>
                  </span>
              </div>
          </div>
      </div>
        <!-- Pinned projects -->
        <div class="px-4 py-10 sm:px-6 lg:px-8">
          <h2 class="text-gray-500 text-xs font-medium uppercase tracking-wide">Overview</h2>
          <ul class="grid grid-cols-1 gap-4 sm:gap-6 sm:grid-cols-2 xl:grid-cols-4 mt-3">
            <li class="relative col-span-1 flex shadow-sm rounded-md">
              <div class="flex-shrink-0 flex items-center justify-center w-16 bg-orange-500 text-white text-sm leading-5 font-medium rounded-l-md">
                <svg class="h-5 w-5 text-white group-hover:text-gray-500 group-focus:text-gray-600 transition ease-in-out duration-150" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
              </div>
              <div class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">
                <div class="flex-1 px-4 py-2 text-sm leading-5 truncate">
                  <a href="#" class="text-gray-900 font-medium hover:text-gray-600 transition ease-in-out duration-150">
                    Documents
                  </a>
                  <p class="text-gray-500">{{count($documents)}} document(s)</p>
                </div>
                <div class="flex-shrink-0 pr-2">
                  <button id="pinned-project-options-menu-0" aria-has-popup="true" class="w-8 h-8 inline-flex items-center justify-center text-gray-400 rounded-full bg-transparent hover:text-gray-500 focus:outline-none focus:text-gray-500 focus:bg-gray-100 transition ease-in-out duration-150">
                    <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                      <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                    </svg>
                  </button>
                </div>
              </div>
            </li>
            <li class="relative col-span-1 flex shadow-sm rounded-md">
              <div class="flex-shrink-0 flex items-center justify-center w-16 bg-indigo-500 text-white text-sm leading-5 font-medium rounded-l-md">
                <svg class="h-5 w-5 text-white group-hover:text-gray-500 group-focus:text-gray-600 transition ease-in-out duration-150" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                </svg>
              </div>
              <div class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">
                <div class="flex-1 px-4 py-2 text-sm leading-5 truncate">
                  <a href="#" class="text-gray-900 font-medium hover:text-gray-600 transition ease-in-out duration-150">
                    Blog Posts
                  </a>
                  <p class="text-gray-500">{{count($posts)}} post(s)</p>
                </div>
                <div class="flex-shrink-0 pr-2">
                  <button id="pinned-project-options-menu-0" aria-has-popup="true" class="w-8 h-8 inline-flex items-center justify-center text-gray-400 rounded-full bg-transparent hover:text-gray-500 focus:outline-none focus:text-gray-500 focus:bg-gray-100 transition ease-in-out duration-150">
                    <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                      <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                    </svg>
                  </button>
                </div>
              </div>
            </li>
            @if(Auth::user()->hasAnyRole(['administrator', 'manager']))
            <li class="relative col-span-1 flex shadow-sm rounded-md">
              <div class="flex-shrink-0 flex items-center justify-center w-16 bg-pink-600 text-white text-sm leading-5 font-medium rounded-l-md">
                <svg class="h-5 w-5 text-white group-hover:text-gray-500 group-focus:text-gray-600 transition ease-in-out duration-150" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
              </div>
              <div class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">
                <div class="flex-1 px-4 py-2 text-sm leading-5 truncate">
                  <a href="#" class="text-gray-900 font-medium hover:text-gray-600 transition ease-in-out duration-150">
                    Users
                  </a>
                  <p class="text-gray-500">{{count($users)}} user(s)</p>
                </div>
                <div class="flex-shrink-0 pr-2">
                  <button id="pinned-project-options-menu-0" aria-has-popup="true" class="w-8 h-8 inline-flex items-center justify-center text-gray-400 rounded-full bg-transparent hover:text-gray-500 focus:outline-none focus:text-gray-500 focus:bg-gray-100 transition ease-in-out duration-150">
                    <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                      <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                    </svg>
                  </button>
                </div>
              </div>
            </li>
            @endif
          </ul>
        </div>
        <!-- Projects table (small breakpoint and up) -->
        <div class="hidden mt-8 sm:block">
          <div class="align-middle inline-block min-w-full border-b border-gray-200">
            <table class="min-w-full">
              <thead>
                <tr class="border-t border-gray-200">
                  <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    <span class="lg:pl-2">Activity</span>
                  </th>
                  <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Posted on
                  </th>
                  <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Last updated
                  </th>
                  <th class="pr-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"></th>
                  <th class="pr-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"></th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-100">
                @if(count($activities) > 0)
                @foreach($activities as $date => $activity)
                @if(isset($activity['year']))
                    <tr>
                        <td class="px-6 py-3 max-w-0 w-2/5 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                        <div class="flex items-center space-x-3 lg:pl-2">
                            <div class="flex-shrink-0 w-2.5 h-2.5 rounded-full bg-orange-500"></div>
                            <a href="/documents/{{$activity['id']}}" class="truncate hover:text-gray-600">
                            <span>{{$activity['title']}} <span class="text-gray-500 font-normal">in Documents</span> </span>
                            </a>
                        </div>
                        </td>
                        <td class="hidden md:table-cell px-6 py-3 whitespace-no-wrap text-sm leading-5 text-gray-500">
                          <?php
                          $date_unformatted = strtotime($activity['created_at']);
                          $date = date("F j, Y", $date_unformatted);
                          echo $date;
                          ?>  
                        </td>
                        <td class="hidden md:table-cell px-6 py-3 whitespace-no-wrap text-sm leading-5 text-gray-500">
                          <?php
                          $date_unformatted = strtotime($activity['updated_at']);
                          $date = date("F j, Y", $date_unformatted);
                          echo $date;
                          ?>  
                        </td>
                        <td class="pr-6 w-5">
                          <a href="/documents/{{$activity['id']}}/edit" class="group flex items-center px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">
                              <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500 group-focus:text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                              <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                              <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                              </svg>
                              Edit
                          </a>
                      </td>
                      <td class="pr-6 w-5">
                          <a href="/documents/{{$activity['id']}}" class="group flex items-center px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">
                              <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                              View
                          </a>
                      </td>
                    </tr>
                @else
                    <tr>
                        <td class="px-6 py-3 max-w-0 w-2/5 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                        <div class="flex items-center space-x-3 lg:pl-2">
                            <div class="flex-shrink-0 w-2.5 h-2.5 rounded-full bg-indigo-500"></div>
                            <a href="/posts/{{$activity['id']}}" class="truncate hover:text-gray-600">
                            <span>{{$activity['title']}} <span class="text-gray-500 font-normal">in Blog Posts</span> </span>
                            </a>
                        </div>
                        </td>
                        <td class="hidden md:table-cell px-6 py-3 whitespace-no-wrap text-sm leading-5 text-gray-500">
                          <?php
                          $date_unformatted = strtotime($activity['created_at']);
                          $date = date("F j, Y", $date_unformatted);
                          echo $date;
                          ?>  
                        </td>
                        <td class="hidden md:table-cell px-6 py-3 whitespace-no-wrap text-sm leading-5 text-gray-500">
                          <?php
                          $date_unformatted = strtotime($activity['updated_at']);
                          $date = date("F j, Y", $date_unformatted);
                          echo $date;
                          ?>  
                        </td>
                        <td class="pr-6 w-5">
                          <a href="/posts/{{$activity['id']}}/edit" class="group flex items-center px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">
                              <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500 group-focus:text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                              <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                              <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                              </svg>
                              Edit
                          </a>
                        </td>
                        <td class="pr-6 w-5">
                            <a href="/posts/{{$activity['id']}}" class="group flex items-center px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">
                                <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                  </svg>
                                View
                            </a>
                        </td>
                    </tr>
                @endif

                @endforeach
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </main>
    </div>
  </div>
@endsection
