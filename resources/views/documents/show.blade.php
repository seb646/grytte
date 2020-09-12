@extends('layouts.app')

@section('content')
    <div class="bg-gray-50 pt-15">
    <div class="container mx-auto px-5 sm:px-40 py-2">
        <div class="bg-white shadow overflow-hidden rounded-lg">
            <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-no-wrap">
                    <div class="ml-4 mt-4">
                      <h2 class="text-2xl leading-6 font-medium text-gray-900">
                        {{$document->title}}
                      </h2>
                      <p class="mt-3 max-w-xl text-sm leading-5 text-gray-500">
                        The IRS Form 990 serves as a record of financial information that organizations claiming federal tax-exempt status must file after every fiscal year.
                      </p>
                    </div>
                    <div class="ml-4 mt-4 flex-shrink-0 justify-end">
                      @if(!Auth::guest())
                        @if(@Auth::user()->id == $document->user_id)
                          <span class="hidden sm:block shadow-sm rounded-md float-right">
                              <a href="/documents/{{$document->id}}/edit" type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                                <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                  <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                                Edit
                              </a>
                          </span>
                        @elseif(Auth::user()->hasAnyRole(['administrator', 'manager']))
                        <span class="hidden sm:block shadow-sm rounded-md float-right">
                          <a href="/documents/{{$document->id}}/edit" type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                            <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                              <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                            Edit
                          </a>
                        </span>
                        @endif
                      @endif
                    </div>
                </div>
            </div>
            <div class="px-4 py-5 sm:px-6">
              <dl class="grid grid-cols-1 col-gap-4 row-gap-8 sm:grid-cols-2">
                <div class="sm:col-span-1">
                  <dt class="text-sm leading-5 font-medium text-gray-500">
                    Fiscal Year
                  </dt>
                  <dd class="mt-1 text-lg leading-5 text-gray-900">
                    {{$document->year}}
                  </dd>
                </div>
                <div class="sm:col-span-1">
                  <dt class="text-sm leading-5 font-medium text-gray-500">
                    Employer Identification Number
                  </dt>
                  <dd class="mt-1 text-lg leading-5 text-gray-900">
                    13-1623918
                  </dd>
                </div>
                <div class="sm:col-span-2">
                  <dt class="text-sm leading-5 font-medium text-gray-500">
                    Attachments
                  </dt>
                  <dd class="mt-1 text-sm leading-5 text-gray-900">
                    <ul class="border border-gray-200 rounded-md">
                      <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm leading-5">
                        <div class="w-0 flex-1 flex items-center">
                          <svg class="flex-shrink-0 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                          </svg>
                          <a href="/storage/files/{{$document->file}}" class="ml-2 flex-1 w-0 truncate text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">
                            {{$document->file}}
                          </a>
                        </div>
                        <div class="ml-4 flex-shrink-0">
                          <a href="/storage/files/{{$document->file}}" download class="font-medium text-red-600 hover:text-red-500 transition duration-150 ease-in-out">
                            Download ({{number_format(filesize(Storage::path('public/files/'.$document->file)) / 1048576, 2) . ' MB'}})
                          </a>
                        </div>
                      </li>
                    </ul>
                  </dd>
                </div>
              </dl>
            </div>
          </div>
        </div>
</div>
<div class="bg-gray-50">
    <div class="container mx-auto px-10 sm:px-40">
        <?php $overview = unserialize($document->overview);?>
        <div class="pt-10 grid grid-cols-1 gap-5 sm:grid-cols-3">
            @foreach($overview as $key => $value)
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                <dl>
                    <dt class="text-sm leading-5 font-medium text-gray-500 truncate">
                    <?php 
                    $title = str_replace('overview_', '', $key);
                    $title = str_replace('_', ' ', $title);
                    $title = ucwords($title);
                    echo $title;
                    ?>
                    </dt>
                    <dd class="mt-1 text-3xl leading-9 font-semibold text-gray-900">
                    ${{number_format($value)}}
                    </dd>
                </dl>
                </div>
            </div>
            @endforeach
        </div>

        <div class="bg-white shadow overflow-hidden rounded-lg mt-12">
          <div class="px-4 py-5 border-b border-gray-200 sm:px-6 bg-gray-600">
              <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-no-wrap">
                  <div class="ml-4 mt-4">
                    <a href="/stats/revenue" class="text-lg leading-6 font-medium text-white">
                      Revenue
                    </a>
                  </div>
              </div>
          </div>
          <div class="px-4 py-5 sm:px-6">
            <dl class="grid grid-cols-1 col-gap-4 row-gap-8 sm:grid-cols-3">
              <?php $revenue = unserialize($document->revenue);?>
              @foreach($revenue as $key => $value)
              @if($value != NULL)
              <div class="sm:col-span-1">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                  <?php 
                    $title = str_replace('revenue_', '', $key);
                    $title = str_replace('_', ' ', $title);
                    $title = ucwords($title);
                    echo $title;
                    ?>
                </dt>
                <dd class="text-2xl font-semibold text-gray-900">
                  ${{number_format($value)}}
                </dd>
              </div>
              @endif
              @endforeach
            </dl>
          </div>
        </div>

        <div class="bg-white shadow overflow-hidden rounded-lg mt-12">
          <div class="px-4 py-5 border-b border-gray-200 sm:px-6 bg-gray-600">
              <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-no-wrap">
                  <div class="ml-4 mt-4">
                    <a href="/stats/expenses" class="text-lg leading-6 font-medium text-white">
                      Expenses
                    </a>
                  </div>
              </div>
          </div>
          <div class="px-4 py-5 sm:px-6">
            <dl class="grid grid-cols-1 col-gap-4 row-gap-8 sm:grid-cols-3">
              <?php $expenses = unserialize($document->expenses);?>
              @foreach($expenses as $key => $value)
              @if($value != NULL)
              <div class="sm:col-span-1">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                  <?php 
                    $title = str_replace('expenses_', '', $key);
                    $title = str_replace('_', ' ', $title);
                    $title = ucwords($title);
                    echo $title;
                    ?>
                </dt>
                <dd class="text-2xl font-semibold text-gray-900">
                  ${{number_format($value)}}
                </dd>
              </div>
              @endif
              @endforeach
            </dl>
          </div>
        </div>

        <div class="pb-16">
        <div class="bg-white shadow overflow-hidden rounded-lg mt-12">
          <div class="px-4 py-5 border-b border-gray-200 sm:px-6 bg-gray-600">
              <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-no-wrap">
                  <div class="ml-4 mt-4">
                    <a href="/stats/employees" class="text-lg leading-6 font-medium text-white">
                      Highest Compensated Employees
                    </a>
                  </div>
              </div>
          </div>
          <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <table class="min-w-full divide-y divide-gray-200 responsive overflow-x-auto">
                  <thead>
                    <tr>
                      <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Name
                      </th>
                      <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Position
                      </th>
                      <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Compensation
                      </th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200">
                      @foreach($employees as $employee)
                      @if($employee['name'])
                      <tr class="bg-white">
                          <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                          <a href="/stats/employees#{{str_replace('\'', '', str_replace(' ', '_', str_replace('.', '', strtolower($employee['name']))))}}">{{$employee['name']}}</a>
                          </td>
                          <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                          {{$employee['position']}}
                          </td>
                          <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                          @if($employee['salary'])
                              ${{number_format($employee['salary'])}}
                          @endif
                          </td>
                      </tr>
                      @endif
                      @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      
</div>
@endsection