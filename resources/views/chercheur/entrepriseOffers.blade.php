<x-app-layout>
    @extends('layouts.master')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-center">
                    <div class="flex items-center">
                        <a href="{{ route('entreprises') }}"
                            class="flex items-center justify-center h-8 w-8 mb-4 text-3xl text-purple-500"><i
                                class="bx bx-arrow-back"></i></a>
                    </div>
                    <div class="flex justify-center m-2 p-6 text-gray-900 dark:text-gray-100">
                        <div class="mb-7 w-8">
                            <img src="{{ asset($entreprise->photo) }}" alt="{{ $entreprise->name }}">
                        </div>
                        <h2 class="text-xl font-bold underline text-black ml-4">Offres de l'entreprise
                            "{{ $entreprise->titre }}"</h2>
                    </div>
                </div>
                <div class="-mx-4 flex flex-wrap p-8">
                    @foreach ($entreprise->emplois as $emploi)
                        <div class="px-4 md:w-1/2 lg:w-1/3">
                            <div
                                class="mb-9 bg-purple-100 rounded-xl py-8 px-7 shadow-md transition-all hover:shadow-lg sm:p-9 lg:px-6 xl:px-9">
                                <div class="flex justify-between">
                                    <div class="w-8 mb-7">
                                        <img src="{{ asset($entreprise->photo) }}" alt="{{ $entreprise->name }}">
                                    </div>
                                    @auth
                                        @if (auth()->user()->role === 'admin')
                                            <div class="flex flex-end justify-end">
                                                <a title="Archive"
                                                    href="{{ route('archive.offer', ['offerId' => $emploi->id]) }}">
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

                                <div>
                                    <h3 class="mb-4 text-xl font-bold text-black sm:text-2xl lg:text-xl xl:text-2xl">
                                        {{ $emploi->titre }}</h3>
                                    <p class="text-base font-medium text-body-color">{{ $emploi->description }}
                                    </p>
                                    @foreach (json_decode($emploi->competences) as $competence)
                                        <li class="list-disc p-1">{{ $competence }}</li>
                                    @endforeach
                                    <p class="text-base font-medium text-body-color">{{ $emploi->type_contrat }}
                                    </p>
                                    <p class="text-base font-medium text-body-color">{{ $emploi->emplacement }}
                                    </p>
                                    <p class="text-sm text-gray-600">Published by:
                                        {{ $entreprise->name }}
                                    </p>
                                    <p class="text-sm text-gray-600">Email: {{ $entreprise->email }}</p>
                                </div>
                                @auth
                                    @if (auth()->user()->role === 'chercheur')
                                        <div class="flex justify-center mt-4">
                                            <form id="applicationForm" action="{{ route('postuler', $emploi) }}"
                                                method="post">
                                                @csrf
                                                <div class="flex justify-center mt-4">
                                                    <button id="postulerButton"
                                                        class="text-white {{ auth()->user()->emplois->contains($emploi) ? 'bg-red-500' : 'bg-purple-500' }}  font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                                        type="submit"
                                                        {{ auth()->user()->emplois->contains($emploi) ? 'disabled' : '' }}>
                                                        {{ auth()->user()->emplois->contains($emploi) ? ' Applied' : 'Apply' }}
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
