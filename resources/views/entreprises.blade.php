<x-app-layout>
    @extends('layouts.master')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="ml-4 p-6 text-gray-900 dark:text-gray-100">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                </div>
                <div class='max-w-md mx-auto '>
                    <div class="relative flex items-center w-fit h-12 rounded-lg shadow-lg overflow-hidden">
                        <div class="grid place-items-center h-full w-12 text-gray-600 ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <form action="{{ route('entreprises') }}" method="GET">
                            <div class="flex justify-between">
                                <input name="search" class="h-full w-full text-sm text-gray-700 border-0"
                                    type="text" id="search" placeholder="Search job offer.." />
                                <button type="submit"
                                    class="bg-purple-400 w-24 text-white hover:bg-purple-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Search</button>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="-mx-4 flex flex-wrap p-8 gap-8">

                    @foreach ($entreprises as $entreprise)
                    
                        <div
                            class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100">
                            <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
                                src={{ $entreprise->photo }} alt="">
                            <div class="flex flex-col justify-between p-4 leading-normal">
                                <div class="flex justify-center">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        <span class="text-purple-800">{{ $entreprise->name }}</span>
                                    </h5>
                                </div>
                                <h6 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    Slogan :
                                    {{ $entreprise->titre }}</h6>
                                <h6 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    Industrie : {{ $entreprise->industrie }}</h6>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Description :
                                    {{ $entreprise->description }}</p>
                            </div>
                            @Auth
                                @if (auth()->user()->role === 'admin')
                                    <div class="flex flex-end justify-end h-48">
                                        <a title="Archive"
                                            href="{{ route('archive.entreprise', ['userId' => $entreprise->id]) }}">
                                            <svg class='h-5 w-5 text-red-500' fill='none' viewBox='0 0 24 24'
                                                stroke='currentColor'>
                                                <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2'
                                                    d='M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20' />
                                            </svg>
                                        </a>
                                    </div>
                                @elseif(auth()->user()->role === 'chercheur')
                                    <div>
                                        {{-- <form action="/subscribe" method="POST">
                                            @csrf
                                                <input type="email" name="email" value="{{ auth()->user()->email }}" class="rounded-lg shadow-lg h-full w-full text-sm text-gray-700 border-0" readonly />
                                            <button type="submit" class="bg-purple-600 w-fit text-white hover:bg-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Subscribe</button>
                                        </form> --}}
                                        <form action="{{ route('newsletter', ['entrepriseId' => $entreprise->id]) }}" method="POST">
                                            @csrf
                                            <input type="email" name="email" value="{{ auth()->user()->email }}" class="rounded-lg shadow-lg h-full w-full text-sm text-gray-700 border-0" readonly />
                                            <button id="subscribeButton" class="bg-purple-600 w-fit text-white hover:bg-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit" {{ Newsletter::isSubscribed(auth()->user()->email) ? 'disabled' : '' }}>
                                                {{ Newsletter::isSubscribed(auth()->user()->email) ? ' Subscribed' : 'Subscribe' }}
                                            </button>
                                        </form>                                        
                                    </div>
                                @endif
                            @endauth
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
