<x-app-layout>
    @extends('layouts.master')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Votre Profile') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="flex justify-center ">

                <div
                    class="duration-300 mb-4 rotate-0  group border border-purple-900 border-4  overflow-hidden rounded-2xl relative h-32 w-64 bg-purple-800 p-5 flex flex-col items-start gap-4">

                    <a href="{{ route('downloadCv') }}">
                    <button
                        class="duration-300 hover:bg-purple-900 border hover:text-gray-50 bg-gray-50 font-semibold text-purple-800 px-3 py-2 flex flex-row items-center gap-3">Dowload
                        CV
                        <svg class="w-6 h-6 fill-current" height="100" preserveAspectRatio="xMidYMid meet"
                            viewBox="0 0 100 100" width="100" x="0" xmlns="http://www.w3.org/2000/svg" y="0">
                            <path
                                d="M22.1,77.9a4,4,0,0,1,4-4H73.9a4,4,0,0,1,0,8H26.1A4,4,0,0,1,22.1,77.9ZM35.2,47.2a4,4,0,0,1,5.7,0L46,52.3V22.1a4,4,0,1,1,8,0V52.3l5.1-5.1a4,4,0,0,1,5.7,0,4,4,0,0,1,0,5.6l-12,12a3.9,3.9,0,0,1-5.6,0l-12-12A4,4,0,0,1,35.2,47.2Z"
                                fill-rule="evenodd">
                            </path>
                        </svg>
                    </button>
                </a>


                    <svg class="group-hover:scale-125 duration-500 absolute -bottom-0.5 -right-20 w-48 h-48 z-10 -my-2  fill-gray-50 stroke-purple-900"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
                        <path data-name="layer1"
                            d="M 50.4 51 C 40.5 49.1 40 46 40 44 v -1.2 a 18.9 18.9 0 0 0 5.7 -8.8 h 0.1 c 3 0 3.8 -6.3 3.8 -7.3 s 0.1 -4.7 -3 -4.7 C 53 4 30 0 22.3 6 c -5.4 0 -5.9 8 -3.9 16 c -3.1 0 -3 3.8 -3 4.7 s 0.7 7.3 3.8 7.3 c 1 3.6 2.3 6.9 4.7 9 v 1.2 c 0 2 0.5 5 -9.5 6.8 S 2 62 2 62 h 60 a 14.6 14.6 0 0 0 -11.6 -11 z"
                            stroke-miterlimit="10" stroke-width="5"></path>
                    </svg>

                    <svg class="group-hover:scale-125 duration-200 absolute -bottom-0.5 -right-20 w-48 h-48 z-10 -my-2  fill-gray-50 stroke-purple-700"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
                        <path data-name="layer1"
                            d="M 50.4 51 C 40.5 49.1 40 46 40 44 v -1.2 a 18.9 18.9 0 0 0 5.7 -8.8 h 0.1 c 3 0 3.8 -6.3 3.8 -7.3 s 0.1 -4.7 -3 -4.7 C 53 4 30 0 22.3 6 c -5.4 0 -5.9 8 -3.9 16 c -3.1 0 -3 3.8 -3 4.7 s 0.7 7.3 3.8 7.3 c 1 3.6 2.3 6.9 4.7 9 v 1.2 c 0 2 0.5 5 -9.5 6.8 S 2 62 2 62 h 60 a 14.6 14.6 0 0 0 -11.6 -11 z"
                            stroke-miterlimit="10" stroke-width="2"></path>
                    </svg>


                </div>
            </div>

                <div class="bg-white">

                    <div class="border-1 shadow-lg shadow-gray-700 rounded-lg">

                        <!-- top content -->
                        <div class="flex rounded-t-lg bg-top-color sm:px-2 w-full">
                            <div class="w-40 overflow-hidden sm:rounded-full sm:relative sm:p-0 top-10 left-5 p-3">
                                <img src="{{ asset($user->photo) }}" alt="{{ $user->name }}">
                            </div>

                            <div class="w-2/3 sm:text-center pl-5 mt-10 text-start">
                                <p class="font-poppins font-bold text-heading sm:text-4xl text-2xl">
                                    {{ $user->name }} </p>
                                <p class="text-heading">{{ $user->titre }} </p>
                            </div>

                        </div>

                        <!-- main content -->
                        <div class="p-5">

                            <div class="flex flex-col sm:flex-row sm:mt-10">

                                <div class="flex flex-col sm:w-1/3">
                                    <!-- My contact -->
                                    <div class="py-3 sm:order-none order-3">
                                        <h2 class="text-lg text-pink-500 font-poppins font-bold text-top-color">My
                                            Contact</h2>
                                        <div class="border-2 w-20 border-pink-500 my-3"></div>

                                        <div>
                                            <div class="flex items-center my-1">
                                                <a class="w-6 text-gray-700 hover:text-orange-600">
                                                </a>
                                                <div class=" truncate">{{ $user->email }} </div>
                                            </div>
                                            <div class="flex items-center my-1">
                                                <a class="w-6 text-gray-700 hover:text-orange-600"
                                                    aria-label="Visit TrendyMinds YouTube" href=""
                                                    target="_blank">
                                                </a>
                                                <div>0{{ $user->tel }} </div>
                                            </div>
                                            <div class="flex items-center my-1">
                                                <a class="w-6 text-gray-700 hover:text-orange-600"
                                                    aria-label="Visit TrendyMinds Facebook" href=""
                                                    target="_blank">
                                                </a>
                                                <div>{{ $user->industrie }} </div>
                                            </div>
                                            <div class="flex items-center my-1">
                                                <a class="w-6 text-gray-700 hover:text-orange-600"
                                                    aria-label="Visit TrendyMinds Twitter" href=""
                                                    target="_blank">
                                                </a>
                                                <div>{{ $user->poste }} </div>
                                            </div>
                                            <div class="flex items-center my-1">
                                                <a class="w-6 text-gray-700 hover:text-orange-600"
                                                    aria-label="Visit TrendyMinds Twitter" href=""
                                                    target="_blank">
                                                </a>
                                                <div>{{ $user->adresse }} </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Skills -->
                                    <div class="py-3 sm:order-none order-2">
                                        <h2 class="text-lg text-blue-500  font-poppins font-bold text-top-color">
                                            Compétences</h2>
                                        <div class="border-2 w-20 border-blue-500 my-3"></div>

                                        <div>
                                            <div class="flex flex-col my-1">

                                                @if ($user->cv)
                                                    @foreach (json_decode($user->cv->competences) as $competence)
                                                        <div class="flex">

                                                            <a class="w-6 text-gray-700 hover:text-orange-600"
                                                                aria-label="Visit TrendyMinds Twitter" href=""
                                                                target="_blank">
                                                                <svg viewBox="0 0 24 24" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M17 7.82959L18.6965 9.35641C20.239 10.7447 21.0103 11.4389 21.0103 12.3296C21.0103 13.2203 20.239 13.9145 18.6965 15.3028L17 16.8296"
                                                                        stroke="#1C274C" stroke-width="1.5"
                                                                        stroke-linecap="round" />
                                                                    <path
                                                                        d="M13.9868 5L12.9934 8.70743M11.8432 13L10.0132 19.8297"
                                                                        stroke="#1C274C" stroke-width="1.5"
                                                                        stroke-linecap="round" />
                                                                    <path
                                                                        d="M7.00005 7.82959L5.30358 9.35641C3.76102 10.7447 2.98975 11.4389 2.98975 12.3296C2.98975 13.2203 3.76102 13.9145 5.30358 15.3028L7.00005 16.8296"
                                                                        stroke="#1C274C" stroke-width="1.5"
                                                                        stroke-linecap="round" />
                                                                </svg>
                                                            </a>
                                                            <div class="ml-2">{{ $competence }}</div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <a class="w-6 text-gray-700 hover:text-orange-600"
                                                        aria-label="Visit TrendyMinds Twitter" href=""
                                                        target="_blank">
                                                        <svg viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M17 7.82959L18.6965 9.35641C20.239 10.7447 21.0103 11.4389 21.0103 12.3296C21.0103 13.2203 20.239 13.9145 18.6965 15.3028L17 16.8296"
                                                                stroke="#1C274C" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path
                                                                d="M13.9868 5L12.9934 8.70743M11.8432 13L10.0132 19.8297"
                                                                stroke="#1C274C" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path
                                                                d="M7.00005 7.82959L5.30358 9.35641C3.76102 10.7447 2.98975 11.4389 2.98975 12.3296C2.98975 13.2203 3.76102 13.9145 5.30358 15.3028L7.00005 16.8296"
                                                                stroke="#1C274C" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                        </svg>
                                                    </a>
                                                    <div class="ml-2">No competences</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Education Background -->
                                    <div class="py-3 sm:order-none order-1">
                                        <h2 class="text-lg text-purple-500  font-poppins font-bold text-top-color">
                                            Langues

                                        </h2>
                                        <div class="border-2 w-20 border-purple-500 my-3"></div>

                                        <div class="flex flex-col space-y-1">

                                            <div class="flex flex-col">
                                                {{-- <p class="font-semibold text-xs text-gray-700">2021</p> --}}
                                                @if ($user->cv)
                                                    @foreach (json_decode($user->cv->langues) as $langue)
                                                        <p class="text-lg font-medium text-green-700">
                                                            {{ $langue }}
                                                        </p>
                                                    @endforeach
                                                @else
                                                    <p class="text-lg font-medium text-green-700">
                                                        Pas de langues
                                                    </p>
                                                @endif
                                            </div>



                                        </div>
                                    </div>

                                </div>


                                <div class="flex flex-col sm:w-2/3 order-first sm:order-none sm:-mt-10">

                                    <!-- About me -->
                                    <div class="py-3">
                                        <h2 class="text-lg text-blue-500  font-poppins font-bold text-top-color">About
                                            Me</h2>
                                        <div class="border-2 w-20 border-blue-500 my-3"></div>
                                        <p>{{ $user->description }} </p>
                                    </div>

                                    <!-- Professional Experience -->
                                    <div class="py-3">
                                        <h2 class="text-lg text-purple-500  font-poppins font-bold text-top-color">
                                            Experiences</h2>
                                        <div class="border-2 w-20 border-purple-500 my-3"></div>

                                        <div class="flex flex-col">

                                            <div class="flex flex-col">
                                                {{-- <p class="text-lg font-bold text-gray-700">Netcracker Technology |
                                                    Software Engineer</p> --}}
                                                {{-- <p class="font-semibold text-sm text-gray-700">2021 - Present</p> --}}

                                                <ul class="text-sm list-disc pl-4 space-y-1">
                                                    @if ($user->cv)
                                                        @foreach (json_decode($user->cv->experiences) as $experience)
                                                            <li class="list-disc p-1">{{ $experience }}</li>
                                                        @endforeach
                                                    @else
                                                        <li>No experiences</li>
                                                    @endif
                                                </ul>
                                            </div>



                                        </div>

                                    </div>

                                    <!-- Projects -->
                                    <div class="py-3">
                                        <h2 class="text-lg text-pink-500  font-poppins font-bold text-top-color">
                                            Education</h2>
                                        <div class="border-2 w-20 border-pink-500 my-3"></div>

                                        <div class="flex flex-col">
                                            <div class="flex flex-col">
                                                @if ($user->cv)
                                                    @foreach (json_decode($user->cv->cursus) as $cursuss)
                                                        <p class="text-lg font-semibold text-gray-700">
                                                            {{ $cursuss }}
                                                        </p>
                                                        <p class="font-normal text-sm text-gray-700 mb-1 pl-2">Lorem,
                                                            ipsum dolor sit amet consectetur adipisicing elit. Iure
                                                            voluptatum libero quo molestiae? Eius nesciunt suscipit
                                                            obcaecati sint, ex illum, ea non asperiores repudiandae
                                                            expedita, nam quisquam provident iure commodi.</p>
                                                    @endforeach
                                                @else
                                                    <li>No Education</li>

                                                @endif
                                            </div>


                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>





</x-app-layout>
