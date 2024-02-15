    @extends('layouts.master')
    @section('jobOffers')
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/home') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                        in</a>

                    @if (Route::has('registerEntreprise'))
                        <a href="{{ route('registerEntreprise') }}"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="py-12">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="ml-4 p-6 text-gray-900 dark:text-gray-100">
                        @guest
                            <h3 class="text-red-500">Vous devez vous <a href="{{ route('login') }}"
                                    class="underline font-semibold">Connecter</a> ou <a href="{{ route('registerChercheur') }}"
                                    class="underline font-semibold">Créer un Compte</a> pour postuler à des offres</h3>
                        @endguest
                    </div>
                    <!-- component -->
                    <div class='max-w-md mx-auto '>
                        <div class="relative flex items-center w-fit h-12 rounded-lg shadow-lg overflow-hidden">
                            <div class="grid place-items-center h-full w-12 text-gray-600 ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <form action="{{ route('AllOffers') }}" method="GET">
                                <div class="flex justify-between">

                                    <input name="search" class=" h-full w-full text-sm text-gray-700 border-0"
                                        type="text" id="search" placeholder="Search job offer.." />
                                    <button type="submit"
                                        class="bg-purple-400 w-24 text-white hover:bg-purple-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Search</button>
                                </div>
                            </form>
                        </div>
                        {{-- @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif --}}
                    </div>


                    <div class="-mx-4 flex flex-wrap p-8">
                        @foreach ($offers as $offer)
                            <div class="px-4 md:w-1/2 lg:w-1/3">
                                <div
                                    class="mb-9 bg-purple-100 rounded-xl py-8 px-7 shadow-md transition-all hover:shadow-lg sm:p-9 lg:px-6 xl:px-9">
                                    <div class="flex justify-between">
                                        <div class="w-8 mb-7">
                                            <img src="{{ asset($offer->entreprise->photo) }}"
                                                alt="{{ $offer->entreprise->name }}">
                                        </div>

                                        <div>
                                            <h3
                                                class="mb-4 text-xl font-bold text-black sm:text-2xl lg:text-xl xl:text-2xl">
                                                {{ $offer->titre }}</h3>
                                            <p class="text-base font-medium text-body-color">{{ $offer->description }}</p>
                                            @foreach (json_decode($offer->competences) as $competence)
                                                <li class="list-disc p-1">{{ $competence }}</li>
                                            @endforeach
                                            <p class="text-base font-medium text-body-color">{{ $offer->type_contrat }}</p>
                                            <p class="text-base font-medium text-body-color">{{ $offer->emplacement }}</p>
                                            <p class="text-sm text-gray-600">Published by: {{ $offer->entreprise->name }}
                                            </p>
                                            <p class="text-sm text-gray-600">Email: {{ $offer->entreprise->email }}</p>
                                            @auth
                                                @if (auth()->user()->role === 'admin')
                                                    <div class="flex flex-end justify-end">
                                                        <a title="Archive"
                                                            href="{{ route('archive.offer', ['offerId' => $offer->id]) }}">
                                                            <svg class='h-5 w-5 text-red-500' fill='none' viewBox='0 0 24 24'
                                                                stroke='currentColor'>
                                                                <path stroke-linecap='round' stroke-linejoin='round'
                                                                    stroke-width='2'
                                                                    d='M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20' />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                @endif
                                            @endauth
                                        </div>

                                        @auth
                                            @if (auth()->user()->role === 'chercheur')
                                                <div class="flex justify-center mt-4">
                                                    <form id="applicationForm" action="{{ route('postuler', $offer) }}"
                                                        method="post">
                                                        @csrf
                                                        <div class="flex justify-center mt-4">
                                                            <button id="postulerButton"
                                                                class="text-white {{ auth()->user()->emplois->contains($offer) ? 'bg-red-500' : 'bg-purple-500' }}  font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                                                type="submit"
                                                                {{ auth()->user()->emplois->contains($offer) ? 'disabled' : '' }}>
                                                                {{ auth()->user()->emplois->contains($offer) ? ' Applied' : 'Apply' }}
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            @endif
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endsection
