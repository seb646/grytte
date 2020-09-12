@if(count($errors) > 0)
    @foreach($errors->all as $error)
        {{ $error }}
    @endforeach
@endif

@if(session('success'))
<div class="fixed inset-0 flex items-end justify-center px-4 py-6 pointer-events-none sm:p-6 sm:items-start sm:justify-end">
  <div class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto absolute bottom-6 ">
    <div class="rounded-lg shadow-xs overflow-hidden">
      <div class="p-4">
        <div class="flex items-start">
          <div class="flex-shrink-0">
            <svg class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
          <div class="ml-3 w-0 flex-1">
            <p class="text-sm leading-5 font-medium text-green-800">
              {{session('success')}}
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endif

@if(session('error'))
<div class="fixed inset-0 flex items-end justify-center px-4 py-6 pointer-events-none sm:p-6 sm:items-start sm:justify-end">
    <div class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto absolute bottom-6 ">
      <div class="rounded-lg shadow-xs overflow-hidden">
        <div class="p-4">
          <div class="flex items-start">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                  </svg>
            </div>
            <div class="ml-3 w-0 flex-1">
              <p class="text-sm leading-5 font-medium text-red-800">
                {{session('error')}}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endif