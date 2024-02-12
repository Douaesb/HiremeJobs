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
                    </div>


                    <div class="-mx-4 flex flex-wrap p-8">
                        @foreach ($offers as $offer)
                            <div class="px-4 md:w-1/2 lg:w-1/3">
                                <div
                                    class="mb-9 bg-purple-100 rounded-xl py-8 px-7 shadow-md transition-all hover:shadow-lg sm:p-9 lg:px-6 xl:px-9">
                                    <div class="mx-auto mb-7 inline-block w-8">
                                        <img src="{{ asset($offer->entreprise->photo) }}"
                                            alt="{{ $offer->entreprise->name }}">
                                    </div>

                                    {{-- <svg width="53" height="61"
                                        viewBox="0 0 53 61" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="20.8433" y="19.3018" width="10.1675" height="12.201" fill="#ABA8F7">
                                        </rect>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M42.1119 5.91343C40.9499 4.62242 39.4875 3.95192 38.2383 4.04801C36.1465 4.20891 33.9414 5.92602 31.8695 8.63549C30.0459 11.0202 28.5417 13.8917 27.5307 16.2458C33.6951 16.5488 37.7115 15.7786 40.1926 14.5916C42.7088 13.3878 43.5948 11.7969 43.7449 10.3715C43.9049 8.85254 43.2637 7.19309 42.1119 5.91343ZM8.75274 16.6855C6.24093 15.1295 4.93328 12.9984 4.69026 10.691C4.42078 8.13252 5.49249 5.64717 7.08955 3.87282C8.6764 2.10982 10.9989 0.817106 13.4643 1.00675C16.9349 1.27372 19.8489 3.94064 22.0221 6.78264C23.4868 8.69803 24.7428 10.8606 25.7343 12.8643C26.7259 10.8606 27.9818 8.69803 29.4465 6.78264C31.6197 3.94064 34.5337 1.27372 38.0043 1.00675C40.4697 0.817106 42.7922 2.10982 44.3791 3.87282C45.9761 5.64717 47.0478 8.13252 46.7784 10.691C46.5353 12.9984 45.2277 15.1295 42.7159 16.6855H49.8822C51.286 16.6855 52.4241 17.8236 52.4241 19.2274V31.1348C52.4241 32.5386 51.286 33.6766 49.8822 33.6766H49.3122V58.6608C49.3122 59.9464 48.1845 60.9886 46.7933 60.9886H31.5363L31.5191 60.9887L31.502 60.9886H20.3521L20.3349 60.9887L20.3178 60.9886H5.0608C3.66963 60.9886 2.54187 59.9464 2.54187 58.6608L2.54187 33.6766C1.13804 33.6766 0 32.5386 0 31.1348V19.2274C0 17.8236 1.13803 16.6855 2.54187 16.6855H8.75274ZM33.0443 58.1952H46.2895V33.6766H33.0443V58.1952ZM33.0443 30.6264H49.3738V19.7358H33.0443V30.6264ZM29.994 19.7358V30.6264H21.8601V19.7358H29.994ZM29.994 33.6766V58.1952H21.8601V33.6766H29.994ZM18.8098 58.1952V33.6766H5.56459V58.1952H18.8098ZM18.8098 30.6264V19.7358H3.05024V30.6264H18.8098ZM13.2303 4.04801C11.9811 3.95192 10.5187 4.62242 9.35668 5.91343C8.20488 7.19309 7.56373 8.85254 7.72372 10.3715C7.87385 11.7969 8.7598 13.3878 11.276 14.5916C13.7571 15.7786 17.7735 16.5488 23.9379 16.2458C22.9269 13.8917 21.4227 11.0202 19.5991 8.63549C17.5272 5.92602 15.3221 4.20891 13.2303 4.04801Z"
                                            fill="#6A64F1"></path>
                                    </svg> --}}
                                    <div>
                                        <h3 class="mb-4 text-xl font-bold text-black sm:text-2xl lg:text-xl xl:text-2xl">
                                            {{ $offer->titre }}</h3>
                                        <p class="text-base font-medium text-body-color">{{ $offer->description }}</p>
                                        <p class="text-sm text-gray-600">Published by: {{ $offer->entreprise->name }}
                                        </p>
                                        <p class="text-sm text-gray-600">Email: {{ $offer->entreprise->email }}</p>
                                    </div>
                                    @auth
                                        <div class="flex justify-center mt-4">
                                            <form id="applicationForm" action="{{ route('postuler', $offer) }}" method="post">
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
                                    @endauth
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    @endsection
