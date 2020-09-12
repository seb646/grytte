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
                  <span class="text-sm mb-1 inline-block font-semibold uppercase text-gray-500">Edit Document</span>
                  <h1 class="text-xl font-medium leading-6 text-gray-900 sm:truncate">
                    {{$document->title}}
                  </h1>
                </div>
                <div class="mt-4 flex md:mt-0 md:ml-4">
                  <span class="hidden sm:block shadow-sm rounded-md float-right mr-3">
                    <a href="/documents/{{$document->id}}" type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                      <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                      </svg>
                      View
                    </a>
                  </span>
                  {!! Form::open(['action' => ['DocumentsController@destroy', $document->id], 'method' => 'POST', 'class' => 'mb-0']) !!}
                  <span class="hidden sm:block shadow-sm rounded-md float-right">
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                      <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                      </svg>
                      Delete
                    </a>
                  </button>
                  {{ Form::hidden('_method', 'DELETE')}}
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="px-40 pt-6 bg-gray-50 pb-1">@include('layouts.messages')</div>
        <div class="hidden sm:block">
          <div class="align-middle inline-block min-w-full px-40 py-6 bg-gray-50">
            {!! Form::open(['action' => ['DocumentsController@update', $document->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                  <div class="md:col-span-1 pr-10">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Document Information</h3>
                    <p class="mt-1 text-sm leading-5 text-gray-500">
                      This information will be displayed publicly so be careful what you share.
                    </p>
                  </div>
                  <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            {{ Form::label('document_title', 'Document Name', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                            {{ Form::text('document_title', $document->title, ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Document Name']) }}
                        </div>
              
                        <div class="col-span-6 sm:col-span-3">
                            {{ Form::label('document_year', 'Fiscal Year', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                            {{ Form::text('document_year', $document->year, ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Fiscal Year']) }}
                        </div>
                    </div>
              
                      <div class="mt-6">
                        {{ Form::label('document_description', 'Description', ['class' => 'block text-sm leading-5 font-medium text-gray-700']) }}
                        <div class="rounded-md shadow-sm">
                            {{ Form::textarea('document_description', $document->description, ['rows' => '3', 'class' => 'form-textarea mt-1 block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5', 'placeholder' => 'Document Description']) }}
                        </div>
                      </div>
              
                      <div class="mt-6">
                        <p class="block text-sm leading-5 font-medium text-gray-700">Current Attachment</p>
                        @if($document->file)
                        <ul class="border border-gray-300 shadow-sm rounded-md mt-1">
                          <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm leading-5">
                            <div class="w-0 flex-1 flex items-center">
                              <svg class="flex-shrink-0 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                              </svg>
                              <span class="ml-2 flex-1 w-0 truncate">
                                {{$document->file}}
                              </span>
                            </div>
                            <div class="ml-4 flex-shrink-0">
                              <a href="/storage/files/{{$document->file}}" class="font-medium text-red-600 hover:text-red-500 transition duration-150 ease-in-out">
                                View Attachment
                              </a>
                            </div>
                          </li>
                        </ul>
                        @endif
                      </div>

                      <div class="mt-6">
                        {{ Form::label('document_new_file', 'Upload Attachment', ['class' => 'block text-sm leading-5 font-medium text-gray-700 mb-1']) }}
                        {{ Form::file('document_new_file', ['class' => 'py-2 px-3 border border-gray-300 rounded-md text-sm leading-4 text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out'])}}
                      </div>
                  </div>
                </div>
              </div>
              
              <div class="mt-6 bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                  <div class="md:col-span-1">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Financial Overview</h3>
                    <p class="mt-1 text-sm leading-5 text-gray-500">
                      Use a permanent address where you can receive mail.
                    </p>
                  </div>
                  <div class="mt-5 md:mt-0 md:col-span-2">
                    <?php $overview = unserialize($document->overview);?>
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            {{ Form::label('overview_total_revenue', 'Total Revenue', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                  <span class="text-gray-500 sm:text-sm sm:leading-5">
                                    $
                                  </span>
                                </div>
                                {{ Form::text('overview_total_revenue', $overview['overview_total_revenue'], ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                  <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
                                    USD
                                  </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                          {{ Form::label('overview_functional_expenses', 'Functional Expenses', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                          <div class="mt-1 relative rounded-md shadow-sm">
                              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm sm:leading-5">
                                  $
                                </span>
                              </div>
                              {{ Form::text('overview_functional_expenses', $overview['overview_functional_expenses'], ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
                              <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
                                  USD
                                </span>
                              </div>
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                          {{ Form::label('overview_net_income', 'Net Income', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                          <div class="mt-1 relative rounded-md shadow-sm">
                              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm sm:leading-5">
                                  $
                                </span>
                              </div>
                              {{ Form::text('overview_net_income', $overview['overview_net_income'], ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
                              <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
                                  USD
                                </span>
                              </div>
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                          {{ Form::label('overview_assets', 'Assets', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                          <div class="mt-1 relative rounded-md shadow-sm">
                              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm sm:leading-5">
                                  $
                                </span>
                              </div>
                              {{ Form::text('overview_assets', $overview['overview_assets'], ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
                              <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
                                  USD
                                </span>
                              </div>
                          </div>
                        </div>
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            {{ Form::label('overview_liabilities', 'Liabilities', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                  <span class="text-gray-500 sm:text-sm sm:leading-5">
                                    $
                                  </span>
                                </div>
                                {{ Form::text('overview_liabilities', $overview['overview_liabilities'], ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                  <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
                                    USD
                                  </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                          {{ Form::label('overview_net_assets', 'Net Assets', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                          <div class="mt-1 relative rounded-md shadow-sm">
                              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm sm:leading-5">
                                  $
                                </span>
                              </div>
                              {{ Form::text('overview_net_assets', $overview['overview_net_assets'], ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
                              <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
                                  USD
                                </span>
                              </div>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="mt-6 bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                  <div class="md:col-span-1">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Revenue</h3>
                    <p class="mt-1 text-sm leading-5 text-gray-500">
                      Use a permanent address where you can receive mail.
                    </p>
                  </div>
                  <div class="mt-5 md:mt-0 md:col-span-2">
                    <?php $revenue = unserialize($document->revenue);?>
                    <div class="grid grid-cols-6 gap-6">
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                        {{ Form::label('revenue_tuition', 'Tuition', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                              <span class="text-gray-500 sm:text-sm sm:leading-5">
                                $
                              </span>
                            </div>
                            {{ Form::text('revenue_tuition', $revenue['revenue_tuition'], ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                              <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
                                USD
                              </span>
                            </div>
                        </div>
                      </div>
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                        {{ Form::label('revenue_donations', 'Donations', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                              <span class="text-gray-500 sm:text-sm sm:leading-5">
                                $
                              </span>
                            </div>
                            {{ Form::text('revenue_donations', $revenue['revenue_donations'], ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                              <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
                                USD
                              </span>
                            </div>
                        </div>
                      </div>
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                        {{ Form::label('revenue_investment_portfolio', 'Investment Portfolio', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                              <span class="text-gray-500 sm:text-sm sm:leading-5">
                                $
                              </span>
                            </div>
                            {{ Form::text('revenue_investment_portfolio', $revenue['revenue_investment_portfolio'], ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                              <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
                                USD
                              </span>
                            </div>
                        </div>
                      </div>
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                        {{ Form::label('revenue_fundraising', 'Fundraising', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                              <span class="text-gray-500 sm:text-sm sm:leading-5">
                                $
                              </span>
                            </div>
                            {{ Form::text('revenue_fundraising', $revenue['revenue_fundraising'], ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                              <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
                                USD
                              </span>
                            </div>
                        </div>
                      </div>
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                        {{ Form::label('revenue_government_grants', 'Government Grants', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                              <span class="text-gray-500 sm:text-sm sm:leading-5">
                                $
                              </span>
                            </div>
                            {{ Form::text('revenue_government_grants', $revenue['revenue_government_grants'], ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                              <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
                                USD
                              </span>
                            </div>
                        </div>
                      </div> 
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                        {{ Form::label('revenue_application_fees', 'Application Fees', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                              <span class="text-gray-500 sm:text-sm sm:leading-5">
                                $
                              </span>
                            </div>
                            {{ Form::text('revenue_application_fees', $revenue['revenue_application_fees'], ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                              <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
                                USD
                              </span>
                            </div>
                        </div>
                      </div>  
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                        {{ Form::label('revenue_other_revenue', 'Other Revenue', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                              <span class="text-gray-500 sm:text-sm sm:leading-5">
                                $
                              </span>
                            </div>
                            {{ Form::text('revenue_other_revenue', $revenue['revenue_other_revenue'], ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                              <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
                                USD
                              </span>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="mt-6 bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                  <div class="md:col-span-1">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Expenses</h3>
                    <p class="mt-1 text-sm leading-5 text-gray-500">
                      Use a permanent address where you can receive mail.
                    </p>
                  </div>
                  <div class="mt-5 md:mt-0 md:col-span-2">
                    <?php $expenses = unserialize($document->expenses);?>
                    <div class="grid grid-cols-6 gap-6">
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                        {{ Form::label('expenses_employee_compensation', 'Employee Compensation', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                              <span class="text-gray-500 sm:text-sm sm:leading-5">
                                $
                              </span>
                            </div>
                            {{ Form::text('expenses_employee_compensation', $expenses['expenses_employee_compensation'], ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                              <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
                                USD
                              </span>
                            </div>
                        </div>
                      </div>
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                        {{ Form::label('expenses_catering_services', 'Catering Services', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                              <span class="text-gray-500 sm:text-sm sm:leading-5">
                                $
                              </span>
                            </div>
                            {{ Form::text('expenses_catering_services', $expenses['expenses_catering_services'], ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                              <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
                                USD
                              </span>
                            </div>
                        </div>
                      </div>
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                        {{ Form::label('expenses_textbooks', 'Textbooks', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                              <span class="text-gray-500 sm:text-sm sm:leading-5">
                                $
                              </span>
                            </div>
                            {{ Form::text('expenses_textbooks', $expenses['expenses_textbooks'], ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                              <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
                                USD
                              </span>
                            </div>
                        </div>
                      </div>
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                        {{ Form::label('expenses_financial_aid', 'Financial Aid', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                              <span class="text-gray-500 sm:text-sm sm:leading-5">
                                $
                              </span>
                            </div>
                            {{ Form::text('expenses_financial_aid', $expenses['expenses_financial_aid'], ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                              <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
                                USD
                              </span>
                            </div>
                        </div>
                      </div>
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                        {{ Form::label('expenses_information_technology', 'Information Technology', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                              <span class="text-gray-500 sm:text-sm sm:leading-5">
                                $
                              </span>
                            </div>
                            {{ Form::text('expenses_information_technology', $expenses['expenses_information_technology'], ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                              <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
                                USD
                              </span>
                            </div>
                        </div>
                      </div>
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                        {{ Form::label('expenses_office_expenses', 'Office Expenses', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                              <span class="text-gray-500 sm:text-sm sm:leading-5">
                                $
                              </span>
                            </div>
                            {{ Form::text('expenses_office_expenses', $expenses['expenses_office_expenses'], ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                              <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
                                USD
                              </span>
                            </div>
                        </div>
                      </div>
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                        {{ Form::label('expenses_legal_fees', 'Legal Fees', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                              <span class="text-gray-500 sm:text-sm sm:leading-5">
                                $
                              </span>
                            </div>
                            {{ Form::text('expenses_legal_fees', $expenses['expenses_legal_fees'], ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                              <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
                                USD
                              </span>
                            </div>
                        </div>
                      </div>  
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                        {{ Form::label('expenses_insurance', 'Insurance', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                              <span class="text-gray-500 sm:text-sm sm:leading-5">
                                $
                              </span>
                            </div>
                            {{ Form::text('expenses_insurance', $expenses['expenses_insurance'], ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                              <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
                                USD
                              </span>
                            </div>
                        </div>
                      </div>  
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                        {{ Form::label('expenses_other_expenses', 'Other Expenses', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                              <span class="text-gray-500 sm:text-sm sm:leading-5">
                                $
                              </span>
                            </div>
                            {{ Form::text('expenses_other_expenses', $expenses['expenses_other_expenses'], ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                              <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
                                USD
                              </span>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="mt-6 bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                  <div class="md:col-span-1">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Employees</h3>
                    <p class="mt-1 text-sm leading-5 text-gray-500">
                      Use a permanent address where you can receive mail.
                    </p>
                  </div>
                  <div class="mt-5 md:mt-0 md:col-span-2">
                    <?php $employees = unserialize($document->employees);?>
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            {{ Form::label('employee_1_name', 'Employee Name (1)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                            {{ Form::text('employee_1_name', $employees[0]['name'], ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Name']) }}
                        </div>
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            {{ Form::label('employee_1_position', 'Employee Position (1)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                            {{ Form::text('employee_1_position', $employees[0]['position'], ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Position']) }}
                        </div>
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            {{ Form::label('employee_1_salary', 'Employee Salary (1)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                  <span class="text-gray-500 sm:text-sm sm:leading-5">
                                    $
                                  </span>
                                </div>
                                {{ Form::text('employee_1_salary', $employees[0]['salary'], ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                  <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
                                    USD
                                  </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            {{ Form::label('employee_2_name', 'Employee Name (2)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                            {{ Form::text('employee_2_name', $employees[1]['name'], ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Name']) }}
                        </div>
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            {{ Form::label('employee_2_position', 'Employee Position (2)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                            {{ Form::text('employee_2_position', $employees[1]['position'], ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Position']) }}
                        </div>
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            {{ Form::label('employee_2_salary', 'Employee Salary (2)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                  <span class="text-gray-500 sm:text-sm sm:leading-5">
                                    $
                                  </span>
                                </div>
                                {{ Form::text('employee_2_salary', $employees[1]['salary'], ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                  <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
                                    USD
                                  </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            {{ Form::label('employee_3_name', 'Employee Name (3)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                            {{ Form::text('employee_3_name', $employees[2]['name'], ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Name']) }}
                        </div>
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            {{ Form::label('employee_3_position', 'Employee Position (3)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                            {{ Form::text('employee_3_position', $employees[2]['position'], ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Position']) }}
                        </div>
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            {{ Form::label('employee_3_salary', 'Employee Salary (3)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                  <span class="text-gray-500 sm:text-sm sm:leading-5">
                                    $
                                  </span>
                                </div>
                                {{ Form::text('employee_3_salary', $employees[2]['salary'], ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                  <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
                                    USD
                                  </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            {{ Form::label('employee_4_name', 'Employee Name (4)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                            {{ Form::text('employee_4_name', $employees[3]['name'], ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Name']) }}
                        </div>
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            {{ Form::label('employee_4_position', 'Employee Position (4)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                            {{ Form::text('employee_4_position', $employees[3]['position'], ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Position']) }}
                        </div>
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            {{ Form::label('employee_4_salary', 'Employee Salary (4)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                  <span class="text-gray-500 sm:text-sm sm:leading-5">
                                    $
                                  </span>
                                </div>
                                {{ Form::text('employee_4_salary', $employees[3]['salary'], ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                  <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
                                    USD
                                  </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            {{ Form::label('employee_5_name', 'Employee Name (5)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                            {{ Form::text('employee_5_name', $employees[4]['name'], ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Name']) }}
                        </div>
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            {{ Form::label('employee_5_position', 'Employee Position (5)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                            {{ Form::text('employee_5_position', $employees[4]['position'], ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Position']) }}
                        </div>
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            {{ Form::label('employee_5_salary', 'Employee Salary (5)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                  <span class="text-gray-500 sm:text-sm sm:leading-5">
                                    $
                                  </span>
                                </div>
                                {{ Form::text('employee_5_salary', $employees[4]['salary'], ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                  <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
                                    USD
                                  </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            {{ Form::label('employee_6_name', 'Employee Name (6)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                            {{ Form::text('employee_6_name', $employees[5]['name'], ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Name']) }}
                        </div>
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            {{ Form::label('employee_6_position', 'Employee Position (6)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                            {{ Form::text('employee_6_position', $employees[5]['position'], ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Position']) }}
                        </div>
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            {{ Form::label('employee_6_salary', 'Employee Salary (6)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                  <span class="text-gray-500 sm:text-sm sm:leading-5">
                                    $
                                  </span>
                                </div>
                                {{ Form::text('employee_6_salary', $employees[5]['salary'], ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                  <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
                                    USD
                                  </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            {{ Form::label('employee_7_name', 'Employee Name (7)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                            {{ Form::text('employee_7_name', $employees[6]['name'], ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Name']) }}
                        </div>
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            {{ Form::label('employee_7_position', 'Employee Position (7)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                            {{ Form::text('employee_7_position', $employees[6]['position'], ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Position']) }}
                        </div>
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            {{ Form::label('employee_7_salary', 'Employee Salary (7)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                  <span class="text-gray-500 sm:text-sm sm:leading-5">
                                    $
                                  </span>
                                </div>
                                {{ Form::text('employee_7_salary', $employees[6]['salary'], ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                  <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
                                    USD
                                  </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            {{ Form::label('employee_8_name', 'Employee Name (8)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                            {{ Form::text('employee_8_name', $employees[7]['name'], ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Name']) }}
                        </div>
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            {{ Form::label('employee_8_position', 'Employee Position (8)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                            {{ Form::text('employee_8_position', $employees[7]['position'], ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Position']) }}
                        </div>
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            {{ Form::label('employee_8_salary', 'Employee Salary (8)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                  <span class="text-gray-500 sm:text-sm sm:leading-5">
                                    $
                                  </span>
                                </div>
                                {{ Form::text('employee_8_salary', $employees[7]['salary'], ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                  <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
                                    USD
                                  </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            {{ Form::label('employee_9_name', 'Employee Name (9)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                            {{ Form::text('employee_9_name', $employees[8]['name'], ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Name']) }}
                        </div>
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            {{ Form::label('employee_9_position', 'Employee Position (9)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                            {{ Form::text('employee_9_position', $employees[8]['position'], ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Position']) }}
                        </div>
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            {{ Form::label('employee_9_salary', 'Employee Salary (9)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                  <span class="text-gray-500 sm:text-sm sm:leading-5">
                                    $
                                  </span>
                                </div>
                                {{ Form::text('employee_9_salary', $employees[8]['salary'], ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                  <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
                                    USD
                                  </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            {{ Form::label('employee_10_name', 'Employee Name (10)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                            {{ Form::text('employee_10_name', $employees[9]['name'], ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Name']) }}
                        </div>
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            {{ Form::label('employee_10_position', 'Employee Position (10)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                            {{ Form::text('employee_10_position', $employees[9]['position'], ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Position']) }}
                        </div>
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            {{ Form::label('employee_10_salary', 'Employee Salary (10)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                  <span class="text-gray-500 sm:text-sm sm:leading-5">
                                    $
                                  </span>
                                </div>
                                {{ Form::text('employee_10_salary', $employees[9]['salary'], ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                  <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
                                    USD
                                  </span>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mt-6 bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
                <div class="flex justify-end">
                    <span class="ml-3 inline-flex rounded-md shadow-sm float-right">
                        {{ Form::submit('Update Document', ['class' => 'inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-700 transition duration-150 ease-in-out'])}}
                    </span>
                </div>
                {{ Form::hidden('_method', 'PUT')}}
              </div>
            {!! Form::close() !!}
          </div>
        </div>
      </main>
    </div>
  </div>