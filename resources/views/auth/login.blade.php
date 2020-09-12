@extends('layouts.app')

@section('content')
<style>
.footer{display:none}
</style>
<div class="bg-gray-50 flex flex-col justify-center sm:px-6 lg:px-8" style="height: calc( 100vh - 88px )">
  <div class="sm:mx-auto sm:w-full sm:max-w-md">
    <h2 class="mt-0 text-center text-3xl leading-9 font-extrabold text-gray-900">
      Sign in to your account
    </h2>
  </div>

  <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
    <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
      <form method="POST" action="{{ route('login') }}">
        @csrf
        @error('email')
          <div class="rounded-md bg-red-100 p-4 mb-6">
            <div class="flex">
              <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
              </div>
              <div class="ml-3">
                <h3 class="text-sm leading-5 font-medium text-red-800">
                  {{ $message }}
                </h3>
              </div>
            </div>
          </div>
        @enderror
        @error('password')
          <div class="rounded-md bg-red-100 p-4 mb-6">
            <div class="flex">
              <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
              </div>
              <div class="ml-3">
                <h3 class="text-sm leading-5 font-medium text-red-800">
                  {{ $message }}
                </h3>
              </div>
            </div>
          </div>
        @enderror
        <div>
          <label for="email" class="block text-sm font-medium leading-5 text-gray-700">
            Email address
          </label>
          <div class="mt-1 rounded-md shadow-sm">
            <input id="email" name="email" type="email" required value="{{ old('email') }}" autocomplete="email" autofocus class="@error('email') is-invalid @enderror appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
          </div>
        </div>

        <div class="mt-6">
          <label for="password" class="block text-sm font-medium leading-5 text-gray-700">
            Password
          </label>
          <div class="mt-1 rounded-md shadow-sm">
            <input id="password" name="password" type="password" required autocomplete="current-password" class="@error('password') is-invalid @enderror appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
          </div>
        </div>

        <div class="mt-6 flex items-center justify-between">
          <div class="flex items-center">
            <input id="remember" type="checkbox" class="form-checkbox h-4 w-4 text-red-600 transition duration-150 ease-in-out"  {{ old('remember') ? 'checked' : '' }}>
            <label for="remember" name="remember" class="ml-2 block text-sm leading-5 text-gray-900">
              Remember me
            </label>
          </div>
          @if (Route::has('password.request'))
          <div class="text-sm leading-5">
            <a href="{{ route('password.request') }}" class="font-medium text-red-600 hover:text-red-500 focus:outline-none focus:underline transition ease-in-out duration-150">
              Forgot your password?
            </a>
          </div>
          @endif
        </div>

        <div class="mt-6">
          <span class="block w-full rounded-md shadow-sm">
            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
              Sign in
            </button>
          </span>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
