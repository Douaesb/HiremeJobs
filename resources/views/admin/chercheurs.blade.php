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

                <div class="-mx-4 flex flex-wrap p-8 gap-8">

                    @foreach ($chercheurs as $chercheur)
                        <div
                            class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100">
                            <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
                                src={{ $chercheur->photo }} alt="">
                            <div class="flex flex-col justify-between p-4 leading-normal">
                                <div class="flex justify-center">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        <span class="text-purple-800">{{ $chercheur->name }}</span>
                                    </h5>
                                </div>
                                <h6 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Slogan :
                                    {{ $chercheur->titre }}</h6>
                                <h6 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    Industrie : {{ $chercheur->industrie }}</h6>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Description :
                                    {{ $chercheur->description }}</p>
                            </div>
                            @Auth
                                @if (auth()->user()->role === 'admin')
                                    <div class="flex flex-end justify-end h-48">
                                        <a title="Archive"
                                            href="{{ route('archive.chercheur', ['userId' => $chercheur->id]) }}">
                                            <svg class='h-5 w-5 text-red-500' fill='none' viewBox='0 0 24 24'
                                                stroke='currentColor'>
                                                <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2'
                                                    d='M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20' />
                                            </svg>
                                        </a>
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
