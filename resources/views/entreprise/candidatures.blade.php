<x-app-layout>
    @extends('layouts.master')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-center m-2 p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-7 w-8">
                        <img src="{{ asset($emploi->entreprise->photo) }}" alt="{{ $emploi->entreprise->name }}">
                    </div>
                    <h2 class="text-xl font-bold underline text-black ml-4">Candidatures pour l'offre
                        "{{ $emploi->titre }}"</h2>
                </div>
                <div class="-mx-4 flex flex-wrap p-8">
                    @foreach ($emploi->chercheurs as $chercheur)
                        <div class="px-4 md:w-1/2 lg:w-1/3">
                            <div
                                class="mb-9 bg-purple-100 rounded-xl py-8 px-7 shadow-md transition-all hover:shadow-lg sm:p-9 lg:px-6 xl:px-9">
                                {{ $chercheur->name }} - {{ $chercheur->email }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
