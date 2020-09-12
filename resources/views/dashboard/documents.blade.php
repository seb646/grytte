@extends('layouts.admin')

@section('content')
<div class="h-screen flex overflow-hidden bg-white">
    @include('layouts.dashnav')
    @include('layouts.adminmsg')
      <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none" tabindex="0">
        <!-- Page title & actions -->
        <div class="border-b border-gray-200 px-4 py-7 sm:px-6 lg:px-8">
            <div class="md:flex md:items-center md:justify-between">
                <div class="flex-1 min-w-0">
                  <h1 class="text-xl font-medium leading-6 text-gray-900 sm:truncate">
                    Documents
                  </h1>
                </div>
                <div class="mt-4 flex md:mt-0 md:ml-4">
                    <span class="hidden sm:block shadow-sm rounded-md float-right">
                        <a href="/documents/create" type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                          <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500 group-focus:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                          </svg>
                          Create Document
                        </a>
                    </span>
                </div>
            </div>
        </div>
        <!-- Projects table (small breakpoint and up) -->
        <div class="hidden sm:block">
          <div class="align-middle inline-block min-w-full border-b border-gray-200">
            <table class="min-w-full">
              <thead>
                <tr class="border-t border-gray-200">
                  <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    <span class="lg:pl-2">Document Name</span>
                  </th>
                  <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Fiscal year
                  </th>
                  <th class="hidden md:table-cell px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Last updated
                  </th>
                  <th class="pr-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"></th>
                  <th class="pr-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"></th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-100">
                @foreach($documents as $document)
                    <tr>
                        <td class="px-6 py-3 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                        <div class="flex items-center space-x-3 lg:pl-2">
                            <div class="flex-shrink-0 w-2.5 h-2.5 rounded-full bg-orange-500"></div>
                            <a href="/documents/{{$document->id}}/edit" class="truncate hover:text-gray-600">
                            <span>{{$document->title}}</span>
                            </a>
                        </div>
                        </td>
                        <td class="px-6 py-3 text-sm leading-5 text-gray-500 font-medium">
                        <div class="flex items-center space-x-2">
                            {{$document->year}}
                        </div>
                        </td>
                        <td class="hidden md:table-cell px-6 py-3 whitespace-no-wrap text-sm leading-5 text-gray-500">
                            <?php 
                              $date_unformatted = strtotime($document->updated_at);
                              $date = date("F j, Y", $date_unformatted);
                              echo $date;
                            ?>
                        </td>
                        <td class="pr-6 w-5">
                            <a href="/documents/{{$document['id']}}/edit" class="group flex items-center px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">
                                <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500 group-focus:text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                </svg>
                                Edit
                            </a>
                        </td>
                        <td class="pr-6 w-5">
                            <a href="/documents/{{$document['id']}}" class="group flex items-center px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">
                                <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                  </svg>
                                View
                            </a>
                        </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </main>
    </div>
  </div>
@endsection
