@extends('layouts.app')

@section('content')
<style>
.navbar{display:none;}
</style>
<div class="relative bg-gray-50 overflow-hidden">
  <div class="hidden sm:block sm:absolute sm:inset-y-0 sm:h-full sm:w-full">
    <div class="relative h-full max-w-screen-xl mx-auto">
      {{-- <svg class="absolute right-full transform translate-y-1/4 translate-x-1/4 lg:translate-x-1/2" width="404" height="784" fill="none" viewBox="0 0 404 784">
        <defs>
          <pattern id="f210dbf6-a58d-4871-961e-36d5016a0f49" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
          </pattern>
        </defs>
        <rect width="404" height="784" fill="url(#f210dbf6-a58d-4871-961e-36d5016a0f49)" />
      </svg> --}}
      <svg class="absolute left-full transform -translate-y-3/4 -translate-x-1/4 md:-translate-y-1/2 lg:-translate-x-1/2" width="404" height="784" fill="none" viewBox="0 0 404 784">
        <defs>
          <pattern id="5d0dd344-b041-4d26-bec4-8d33ea57ec9b" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
          </pattern>
        </defs>
        <rect width="404" height="784" fill="url(#5d0dd344-b041-4d26-bec4-8d33ea57ec9b)" />
      </svg>
    </div>
  </div>

  <div class="relative pt-6 pb-12 sm:pb-16 md:pb-20 lg:pb-28 xl:pb-32">
    <div class="max-w-screen-xl mx-auto px-4 sm:px-6">
      <nav class="relative flex items-center justify-between sm:h-10 md:justify-center">
        <div class="flex items-center flex-1 md:absolute md:inset-y-0 md:left-0">
          <div class="flex items-center justify-between w-full md:w-auto">
            <a href="/" class="flex">
              <svg class="mr-2 h-9 w-9 text-red-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd" />
              </svg>
              <span class="text-gray-500 mt-1 text-xl font-bold">Grytte.org</span>
            </a>
            <div class="-mr-2 flex items-center md:hidden">
              <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out" id="main-menu" aria-label="Main menu" aria-haspopup="true">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
              </button>
            </div>
          </div>
        </div>
        <div class="hidden md:flex md:space-x-10">
          <a href="/about" class="font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">About</a>
          <a href="/documents" class="font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">Documents</a>
          <a href="/stats" class="font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">Statistics</a>
          {{-- <a href="/contact" class="font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">Contact</a> --}}
          <a href="https://github.com/seb646/grytte.org" class="font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">GitHub</a>
        </div>
        <div class="hidden md:absolute md:flex md:items-center md:justify-end md:inset-y-0 md:right-0">
          @if(!Auth::guest())
          <span class="inline-flex rounded-md shadow">
            <a href="/dashboard" class="inline-flex items-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-red-600 bg-white hover:bg-red-600 hover:text-white focus:outline-none focus:shadow-outline-red transition duration-150 ease-in-out">
              Dashboard
            </a>
          </span>
          @else
          <span class="inline-flex rounded-md shadow">
            <a href="/login" class="inline-flex items-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-red-600 bg-white hover:bg-red-600 hover:text-white focus:outline-none focus:shadow-outline-red transition duration-150 ease-in-out">
              Log in
            </a>
          </span>
          @endif 
        </div>
      </nav>
    </div>
    
    <div id="main-menu-dropdown" class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden opacity-0 scale-95 hidden z-50">
      <div class="rounded-lg shadow-md">
        <div class="rounded-lg bg-white shadow-xs overflow-hidden" role="menu" aria-orientation="vertical">
          <div class="px-5 pt-4 flex items-center justify-between">
            <div class="mb-4">
              <a href="/" class="flex">
                <svg class="mr-2 h-9 w-9 text-red-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd" />
                </svg>
                <span class="text-gray-500 mt-1 text-xl font-bold">Grytte.org</span>
              </a>
            </div>
            <div class="-mr-2">
              <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out" id="close-main-menu" aria-label="Close menu">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
          </div>
          <div class="px-2 pt-2 pb-3">
            <a href="/about" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out" role="menuitem">About</a>
            <a href="/documents" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out" role="menuitem">Documents</a>
            <a href="/stats" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out" role="menuitem">Statistics</a>
            <a href="https://github.com/seb646/grytte.org" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out" role="menuitem">GitHub</a>
          </div>
          <div>
            @if(Auth::guest())
              <a href="/login" type="button" class="block w-full px-5 py-3 text-center font-medium text-red-600 bg-gray-50 hover:bg-gray-100 hover:text-red-700 focus:outline-none focus:bg-gray-100 focus:text-red-700 transition duration-150 ease-in-out" role="menuitem">
                Log In
              </a>  
            @else
            <a href="/dashboard" type="button" class="block w-full px-5 py-3 text-center font-medium text-red-600 bg-gray-50 hover:bg-gray-100 hover:text-red-700 focus:outline-none focus:bg-gray-100 focus:text-red-700 transition duration-150 ease-in-out" role="menuitem">
              Dashboard
            </a>
            @endif
          </div>
        </div>
      </div>
    </div>


    <main class="mt-10 mx-auto max-w-screen-xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 xl:mt-28">
      <div class="text-center">
        <h2 class="text-4xl tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">
          A project made for the
          <br class="xl:hidden">
          <span class="text-red-600">community</span>
        </h2>
        <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
          A public archive of The Browning School's financial records, dating back to 2000.<br>Built with open-source software.
        </p>
        <div class="mt-5 max-w-md mx-auto sm:flex sm:justify-center md:mt-8">
          <div class="rounded-md shadow">
            <a href="/documents" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10">
              Documents
            </a>
          </div>
          <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3">
            <a href="/stats" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-red-600 bg-white hover:text-red-500 focus:outline-none focus:border-red-300 focus:shadow-outline-red transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10">
              Statistics
            </a>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>
<div class="py-16 bg-gray-50 overflow-hidden lg:py-24">
  <div class="relative max-w-xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-screen-xl">
    <svg class="hidden lg:block absolute right-full transform translate-x-40 -translate-y-32" width="404" height="784" fill="none" viewBox="0 0 404 500">
      <defs>
        <pattern id="b1e6e422-73f8-40a6-b5d9-c8586e37e0e7" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
          <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
        </pattern>
      </defs>
      <rect width="404" height="784" fill="url(#b1e6e422-73f8-40a6-b5d9-c8586e37e0e7)" />
    </svg>

    <div class="relative">
      <h3 class="text-center text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl sm:leading-10">
        "Open to Public Inspection"
      </h3>
      <p class="mt-4 max-w-3xl mx-auto text-center text-xl leading-7 text-gray-500">
        As a 501(c)(3) non-profit organization, The Browning School's financial information is open to public inspection under <a class="text-red-600 hover:text-red-500 transition duration-150 ease-in-out" href="https://www.law.cornell.edu/uscode/text/26/6104">26 U.S. Code § 6104</a>.
      </p>
    </div>

    <div class="relative mt-12 lg:mt-24 lg:grid lg:grid-cols-2 lg:gap-8 lg:items-center">
      <div class="mt-10 px-6 relative lg:mt-0">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
          <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
              {{$documents{0}->title}}
            </h3>
            <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
              Fiscal Year: {{$documents{0}->year}}
            </p>
          </div>
          <?php $overview = unserialize($documents{0}->overview);?>
          <div class="px-4 py-5 sm:px-6">
            <dl class="grid grid-cols-1 col-gap-4 row-gap-8 sm:grid-cols-2">
              <div class="sm:col-span-1">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                  Total Revenue
                </dt>
                <dd class="text-2xl font-semibold text-gray-900">
                  ${{number_format($overview['overview_total_revenue'])}}
                </dd>
              </div>
              <div class="sm:col-span-1">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                  Total Assets
                </dt>
                <dd class="text-2xl font-semibold text-gray-900">
                  ${{number_format($overview['overview_assets'])}}
                </dd>
              </div>
              <div class="sm:col-span-1">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                  Functional Expenses
                </dt>
                <dd class="text-2xl font-semibold text-gray-900">
                  ${{number_format($overview['overview_functional_expenses'])}}
                </dd>
              </div>
              <div class="sm:col-span-1">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                  Liabilities
                </dt>
                <dd class="text-2xl font-semibold text-gray-900">
                  ${{number_format($overview['overview_liabilities'])}}
                </dd>
              </div>
              <div class="sm:col-span-1">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                  Net Income
                </dt>
                <dd class="text-2xl font-semibold text-gray-900">
                  ${{number_format($overview['overview_net_income'])}}
                </dd>
              </div>
              <div class="sm:col-span-1">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                  Net Assets
                </dt>
                <dd class="text-2xl font-semibold text-gray-900">
                  ${{number_format($overview['overview_net_assets'])}}
                </dd>
              </div>
            </dl>
            <div class="rounded-md shadow-sm mt-7">
              <a href="/documents/{{$documents{0}->id}}" class="block w-full text-center justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-gray-500 hover:bg-gray-600 focus:outline-none focus:shadow-outline-gray transition duration-150 ease-in-out">
                View Current Filing
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="relative">
        <h4 class="text-2xl leading-8 font-extrabold text-gray-900 tracking-tight sm:text-3xl sm:leading-9">
          Financial Information
        </h4>
        <p class="mt-3 text-lg leading-7 text-gray-500">
          Learn about the financial health of The Browning School. With records dating back to 2000, Grytte.org has compiled trends for important data sets, including tuition, donations, catering expenses, and more!
        </p>

        <ul class="mt-10">
          <li>
            <div class="flex">
              <div class="flex-shrink-0">
                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-red-600 text-white">
                  <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                </div>
              </div>
              <div class="ml-4">
                <h5 class="text-lg leading-6 font-medium text-gray-900">Assets, Income, and Expenses</h5>
                <p class="mt-2 text-base leading-6 text-gray-500">
                  View the key information provided by Browning's 990 forms, such as the school's assets, revenue, and expenses. Analyze graphed trends for each important data set.
                </p>
              </div>
            </div>
          </li>
          <li class="mt-10">
            <div class="flex">
              <div class="flex-shrink-0">
                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-red-600 text-white">
                  <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                  </svg>
                </div>
              </div>
              <div class="ml-4">
                <h5 class="text-lg leading-6 font-medium text-gray-900">Highest Compensated Employees</h5>
                <p class="mt-2 text-base leading-6 text-gray-500">
                  View Browning's highest compensated employees, from teachers to administrators. Analyze trends for each employee's compensation.
                </p>
              </div>
            </div>
          </li>
        </ul>
      </div>

    </div>
  </div>
</div>

@endsection