@extends('layouts.admin')

@section('content')
<div class="h-screen flex overflow-hidden bg-white">
    @include('layouts.dashnav')
    <!-- Main column -->
    <div class="flex flex-col w-0 flex-1 overflow-hidden">
      <!-- Search header -->
      <div class="relative z-10 flex-shrink-0 flex h-16 bg-white border-b border-gray-200 lg:hidden">
        <!-- Sidebar toggle, controls the 'sidebarOpen' sidebar state. -->
        <button class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:bg-gray-100 focus:text-gray-600 lg:hidden" aria-label="Open sidebar">
          <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
            <path d="M4 6h16M4 12h8m-8 6h16" />
          </svg>
        </button>
        <div class="flex-1 flex justify-between px-4 sm:px-6 lg:px-8">
          <div class="flex items-center">
            <!-- Profile dropdown -->
            <div class="ml-3 relative">
              <div>
                <button class="max-w-xs flex items-center text-sm rounded-full focus:outline-none focus:shadow-outline" id="user-menu" aria-label="User menu" aria-haspopup="true">
                  <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                </button>
              </div>
              <!--
                Profile dropdown panel, show/hide based on dropdown state.
  
                Entering: "transition ease-out duration-100"
                  From: "transform opacity-0 scale-95"
                  To: "transform opacity-100 scale-100"
                Leaving: "transition ease-in duration-75"
                  From: "transform opacity-100 scale-100"
                  To: "transform opacity-0 scale-95"
              -->
              <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg">
                <div class="rounded-md bg-white shadow-xs" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                  <div class="py-1">
                    <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">View profile</a>
                    <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">Settings</a>
                  </div>
                  <div class="border-t border-gray-100"></div>
                  <div class="py-1">
                    <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">Logout</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none" tabindex="0">
        <!-- Page title & actions -->
        <div class="border-b border-gray-200 px-4 py-7 sm:px-6 lg:px-8">
            <div class="md:flex md:items-center md:justify-between">
                <div class="flex-1 min-w-0">
                  <h1 class="text-xl font-medium leading-6 text-gray-900 sm:truncate">
                    Create Document
                  </h1>
                </div>
            </div>
        </div>
        <div class="px-40 pt-6 bg-gray-50">@include('layouts.messages')</div>
        <div class="hidden sm:block">
          <div class="align-middle inline-block min-w-full px-40 py-6 bg-gray-50">
            {!! Form::open(['action' => 'DocumentsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
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
                          {{ Form::text('document_title', '', ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Document Name']) }}
                      </div>
            
                      <div class="col-span-6 sm:col-span-3">
                          {{ Form::label('document_year', 'Fiscal Year', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                          {{ Form::text('document_year', '', ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Fiscal Year']) }}
                      </div>
                  </div>
            
                    <div class="mt-6">
                      {{ Form::label('document_description', 'Description', ['class' => 'block text-sm leading-5 font-medium text-gray-700']) }}
                      <div class="rounded-md shadow-sm">
                          {{ Form::textarea('document_description', '', ['rows' => '3', 'class' => 'form-textarea mt-1 block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5', 'placeholder' => 'Document Description']) }}
                      </div>
                    </div>
            
                    <div class="mt-6">
                      {{ Form::label('document_file', 'Attachment') }}<br>
                      {{ Form::file('document_file', ['class' => 'py-2 px-3 border border-gray-300 rounded-md text-sm leading-4 text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out'])}}
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
                  <div class="grid grid-cols-6 gap-6">
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                          {{ Form::label('overview_total_revenue', 'Total Revenue', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                          <div class="mt-1 relative rounded-md shadow-sm">
                              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm sm:leading-5">
                                  $
                                </span>
                              </div>
                              {{ Form::text('overview_total_revenue', '', ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
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
                            {{ Form::text('overview_functional_expenses', '', ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
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
                            {{ Form::text('overview_net_income', '', ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
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
                            {{ Form::text('overview_assets', '', ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
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
                              {{ Form::text('overview_liabilities', '', ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
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
                            {{ Form::text('overview_net_assets', '', ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
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
                  <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                      {{ Form::label('revenue_tuition', 'Tuition', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                      <div class="mt-1 relative rounded-md shadow-sm">
                          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500 sm:text-sm sm:leading-5">
                              $
                            </span>
                          </div>
                          {{ Form::text('revenue_tuition', '', ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
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
                          {{ Form::text('revenue_donations', '', ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
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
                          {{ Form::text('revenue_investment_portfolio', '', ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
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
                          {{ Form::text('revenue_fundraising', '', ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
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
                          {{ Form::text('revenue_government_grants', '', ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
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
                          {{ Form::text('revenue_application_fees', '', ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
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
                          {{ Form::text('revenue_other_revenue', '', ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
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
                  <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                      {{ Form::label('expenses_employee_compensation', 'Employee Compensation', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                      <div class="mt-1 relative rounded-md shadow-sm">
                          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500 sm:text-sm sm:leading-5">
                              $
                            </span>
                          </div>
                          {{ Form::text('expenses_employee_compensation', '', ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
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
                          {{ Form::text('expenses_catering_services', '', ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
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
                          {{ Form::text('expenses_textbooks', '', ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
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
                          {{ Form::text('expenses_financial_aid', '', ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
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
                          {{ Form::text('expenses_information_technology', '', ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
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
                          {{ Form::text('expenses_office_expenses', '', ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
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
                          {{ Form::text('expenses_legal_fees', '', ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
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
                          {{ Form::text('expenses_insurance', '', ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
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
                          {{ Form::text('expenses_other_expenses', '', ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
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
                  <div class="grid grid-cols-6 gap-6">
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                          {{ Form::label('employee_1_name', 'Employee Name (1)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                          {{ Form::text('employee_1_name', '', ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Name']) }}
                      </div>
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                          {{ Form::label('employee_1_position', 'Employee Position (1)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                          {{ Form::text('employee_1_position', '', ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Position']) }}
                      </div>
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                          {{ Form::label('employee_1_salary', 'Employee Salary (1)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                          <div class="mt-1 relative rounded-md shadow-sm">
                              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm sm:leading-5">
                                  $
                                </span>
                              </div>
                              {{ Form::text('employee_1_salary', '', ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
                              <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
                                  USD
                                </span>
                              </div>
                          </div>
                      </div>
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                          {{ Form::label('employee_2_name', 'Employee Name (2)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                          {{ Form::text('employee_2_name', '', ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Name']) }}
                      </div>
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                          {{ Form::label('employee_2_position', 'Employee Position (2)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                          {{ Form::text('employee_2_position', '', ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Position']) }}
                      </div>
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                          {{ Form::label('employee_2_salary', 'Employee Salary (2)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                          <div class="mt-1 relative rounded-md shadow-sm">
                              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm sm:leading-5">
                                  $
                                </span>
                              </div>
                              {{ Form::text('employee_2_salary', '', ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
                              <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
                                  USD
                                </span>
                              </div>
                          </div>
                      </div>
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                          {{ Form::label('employee_3_name', 'Employee Name (3)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                          {{ Form::text('employee_3_name', '', ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Name']) }}
                      </div>
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                          {{ Form::label('employee_3_position', 'Employee Position (3)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                          {{ Form::text('employee_3_position', '', ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Position']) }}
                      </div>
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                          {{ Form::label('employee_3_salary', 'Employee Salary (3)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                          <div class="mt-1 relative rounded-md shadow-sm">
                              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm sm:leading-5">
                                  $
                                </span>
                              </div>
                              {{ Form::text('employee_3_salary', '', ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
                              <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
                                  USD
                                </span>
                              </div>
                          </div>
                      </div>
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                          {{ Form::label('employee_4_name', 'Employee Name (4)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                          {{ Form::text('employee_4_name', '', ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Name']) }}
                      </div>
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                          {{ Form::label('employee_4_position', 'Employee Position (4)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                          {{ Form::text('employee_4_position', '', ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Position']) }}
                      </div>
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                          {{ Form::label('employee_4_salary', 'Employee Salary (4)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                          <div class="mt-1 relative rounded-md shadow-sm">
                              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm sm:leading-5">
                                  $
                                </span>
                              </div>
                              {{ Form::text('employee_4_salary', '', ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
                              <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
                                  USD
                                </span>
                              </div>
                          </div>
                      </div>
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                          {{ Form::label('employee_5_name', 'Employee Name (5)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                          {{ Form::text('employee_5_name', '', ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Name']) }}
                      </div>
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                          {{ Form::label('employee_5_position', 'Employee Position (5)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                          {{ Form::text('employee_5_position', '', ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Position']) }}
                      </div>
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                          {{ Form::label('employee_5_salary', 'Employee Salary (5)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                          <div class="mt-1 relative rounded-md shadow-sm">
                              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm sm:leading-5">
                                  $
                                </span>
                              </div>
                              {{ Form::text('employee_5_salary', '', ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
                              <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
                                  USD
                                </span>
                              </div>
                          </div>
                      </div>
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                          {{ Form::label('employee_6_name', 'Employee Name (6)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                          {{ Form::text('employee_6_name', '', ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Name']) }}
                      </div>
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                          {{ Form::label('employee_6_position', 'Employee Position (6)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                          {{ Form::text('employee_6_position', '', ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Position']) }}
                      </div>
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                          {{ Form::label('employee_6_salary', 'Employee Salary (6)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                          <div class="mt-1 relative rounded-md shadow-sm">
                              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm sm:leading-5">
                                  $
                                </span>
                              </div>
                              {{ Form::text('employee_6_salary', '', ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
                              <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
                                  USD
                                </span>
                              </div>
                          </div>
                      </div>
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                          {{ Form::label('employee_7_name', 'Employee Name (7)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                          {{ Form::text('employee_7_name', '', ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Name']) }}
                      </div>
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                          {{ Form::label('employee_7_position', 'Employee Position (7)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                          {{ Form::text('employee_7_position', '', ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Position']) }}
                      </div>
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                          {{ Form::label('employee_7_salary', 'Employee Salary (7)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                          <div class="mt-1 relative rounded-md shadow-sm">
                              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm sm:leading-5">
                                  $
                                </span>
                              </div>
                              {{ Form::text('employee_7_salary', '', ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
                              <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
                                  USD
                                </span>
                              </div>
                          </div>
                      </div>
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                          {{ Form::label('employee_8_name', 'Employee Name (8)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                          {{ Form::text('employee_8_name', '', ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Name']) }}
                      </div>
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                          {{ Form::label('employee_8_position', 'Employee Position (8)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                          {{ Form::text('employee_8_position', '', ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Position']) }}
                      </div>
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                          {{ Form::label('employee_8_salary', 'Employee Salary (8)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                          <div class="mt-1 relative rounded-md shadow-sm">
                              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm sm:leading-5">
                                  $
                                </span>
                              </div>
                              {{ Form::text('employee_8_salary', '', ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
                              <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
                                  USD
                                </span>
                              </div>
                          </div>
                      </div>
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                          {{ Form::label('employee_9_name', 'Employee Name (9)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                          {{ Form::text('employee_9_name', '', ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Name']) }}
                      </div>
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                          {{ Form::label('employee_9_position', 'Employee Position (9)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                          {{ Form::text('employee_9_position', '', ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Position']) }}
                      </div>
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                          {{ Form::label('employee_9_salary', 'Employee Salary (9)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                          <div class="mt-1 relative rounded-md shadow-sm">
                              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm sm:leading-5">
                                  $
                                </span>
                              </div>
                              {{ Form::text('employee_9_salary', '', ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
                              <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
                                  USD
                                </span>
                              </div>
                          </div>
                      </div>
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                          {{ Form::label('employee_10_name', 'Employee Name (10)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                          {{ Form::text('employee_10_name', '', ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Name']) }}
                      </div>
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                          {{ Form::label('employee_10_position', 'Employee Position (10)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                          {{ Form::text('employee_10_position', '', ['class' => 'mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5','placeholder' => 'Position']) }}
                      </div>
                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                          {{ Form::label('employee_10_salary', 'Employee Salary (10)', ['class' => 'block text-sm font-medium leading-5 text-gray-700']) }}
                          <div class="mt-1 relative rounded-md shadow-sm">
                              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm sm:leading-5">
                                  $
                                </span>
                              </div>
                              {{ Form::text('employee_10_salary', '', ['class' => 'form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5','placeholder' => '0.00']) }}
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
                        {{ Form::submit('Create Document', ['class' => 'inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out'])}}
                    </span>
                </div>
              </div>
            {!! Form::close() !!}
          </div>
        </div>
      </main>
    </div>
  </div>