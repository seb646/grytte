@extends('layouts.app')

@section('content')
<div class="bg-gray-50 py-15">
    <div class="container mx-auto px-5 sm:px-40">
        <div class="bg-white shadow rounded-lg mb-5">
            <div class="px-4 py-5 sm:p-6">
              <h2 class="text-2xl leading-6 font-medium text-gray-900">
                Documents
              </h2>
              <div class="mt-3 max-w-xl text-sm leading-5 text-gray-500">
                <p>
                  As a 501(c)(3) non-profit organization, The Browning School is legally obligated to file Form 990 with the Internal Revenue Service after each fiscal year. These forms provide the public with financial information about the institution.
                </p>
              </div>
              <div class="mt-4 text-sm leading-5">
                <a href="/about#faq" class="font-medium text-red-600 hover:text-red-500 transition ease-in-out duration-150">
                  Frequently Asked Questions &rarr;
                </a>
              </div>
            </div>
          </div>
                   
        <div class="bg-white shadow overflow-hidden rounded-md mb-5">
            <ul>
                @if(count($documents) > 0)
                <?php $border = false;?>
                @foreach($documents as $document)
                <?php $overview = unserialize($document->overview);?>
                @if(!$border)
                <li>
                <?php $border = true;?>
                @else
                <li class="border-t border-gray-200">
                @endif
                    <a href="/documents/{{$document->id}}" class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                    <div class="flex items-center px-4 py-4 sm:px-6">
                        <div class="min-w-0 flex-1 flex items-center">
                            <div class="min-w-0 flex-1 md:grid md:grid-cols-5 md:gap-4">
                                <div class="col-span-2">
                                    <div class="text-sm leading-5 font-medium text-gray-900 truncate">{{$document->title}}</div>
                                    <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                        </svg>
                                        <span>{{$document->year}}</span>
                                    </div>
                                </div>
                                <div class="hidden md:block">
                                    <div>
                                        <div class="text-sm leading-5 text-gray-900">Total Revenue</div>
                                        <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                                        ${{number_format($overview['overview_total_revenue'])}}
                                        </div>
                                    </div>
                                </div>
                                <div class="hidden md:block">
                                    <div>
                                        <div class="text-sm leading-5 text-gray-900">Total Assets</div>
                                        <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                                        ${{number_format($overview['overview_assets'])}}
                                        </div>
                                    </div>
                                </div>
                                <div class="hidden md:block">
                                    <div>
                                        <div class="text-sm leading-5 text-gray-900">Net Income</div>
                                        <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                                        ${{number_format($overview['overview_net_income'])}}
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
                @else
                <p>No documents found.</p>
                @endif
            </ul>
            {{$documents->links()}} 
        </div>  
    </div>
</div>
@endsection