<x-app-layout>
    @extends('layouts.master')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Check for error flash message -->
            @if (session('error'))
                <div class="max-w-7xl mx-auto mb-4">
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                </div>
            @endif
            <div class="bg-white w-fit dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 gap-2 flex ">
                    <!-- Modal toggle -->
                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                        class="block text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button">
                        Creer votre Cv
                    </button>
                    <button onclick="toggleCVCard()"
                        class="block text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Voir Votre Cv
                    </button>
                    <a href="{{ route('downloadCv') }}"
                        class="block text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Télécharger Votre CV (PDF)
                    </a>

                </div>
            </div>
            

            <div class="flex justify-center">
                @if ($cv)

                    <div class="mt-4 bg-white w-96 h-96 rounded-lg h-full hidden" id="CvCard">
                        <div class="flex p-2 gap-1">
                            <div class="">
                                <span class="bg-blue-500 inline-block center w-3 h-3 rounded-full"></span>
                            </div>
                            <div class="circle">
                                <span class="bg-purple-500 inline-block center w-3 h-3 rounded-full"></span>
                            </div>
                            <div class="circle">
                                <span class="bg-pink-500 box inline-block center w-3 h-3 rounded-full"></span>
                            </div>
                        </div>
                        <div class="p-2">
                            <h2 class="text-2xl font-bold mb-4 flex justify-center text-purple-600 underline">Your CV
                            </h2>
                            <h3 class="text-xl font-bold text-pink-500">Competences:</h3>
                            <ul class="p-4">
                                @foreach (json_decode($cv->competences) as $competence)
                                    <li class="list-disc p-1">{{ $competence }}</li>
                                @endforeach
                            </ul>
                            <h3 class="text-xl font-bold text-blue-500">Experiences:</h3>
                            <ul class="p-4">
                                @foreach (json_decode($cv->experiences) as $experience)
                                    <li class="list-disc p-1">{{ $experience }}</li>
                                @endforeach
                            </ul>
                            <h3 class="text-xl font-bold text-purple-500">Cursus:</h3>
                            <ul class="p-4">
                                @foreach (json_decode($cv->cursus) as $cursuss)
                                    <li class="list-disc p-1">{{ $cursuss }}</li>
                                @endforeach
                            </ul>
                            <h3 class="text-xl font-bold text-pink-500">Langues:</h3>
                            <ul class="p-4">
                                @foreach (json_decode($cv->langues) as $langue)
                                    <li class="list-disc p-1">{{ $langue }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @else
                    <p class="text-gray-600">No CV created yet.</p>
                @endif
            </div>
        </div>
    </div>




    <!-- Main modal -->
    <div id="crud-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Creer votre Curriculum Vitae
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" method="POST" action="{{ route('cvs.store') }}">
                    @csrf

                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="competences"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Competences</label>
                            <div class="relative" style="position: relative;">
                                <input type="text" name="competences[]" id="competences"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm mb-2 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-80 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Entrer les competences" required="">
                                <div class="bg-gray-200 rounded-full w-10 h-10 flex items-center justify-center absolute top-0 right-0 cursor-pointer"
                                    onclick="addInputCompetences()">
                                    <svg class="text-gray-600 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        {{-- experiences --}}

                        <div class="col-span-2">
                            <label for="experiences"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Experiences</label>
                            <div class="relative" style="position: relative;">
                                <input type="text" name="experiences[]" id="experiences"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm mb-2 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-80 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Entrer les experiences" required="">
                                <div class="bg-gray-200 rounded-full w-10 h-10 flex items-center justify-center absolute top-0 right-0 cursor-pointer"
                                    onclick="addInputExperiences()">
                                    <svg class="text-gray-600 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        {{-- cursus --}}

                        <div class="col-span-2">
                            <label for="cursus"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cursus</label>
                            <div class="relative" style="position: relative;">
                                <input type="text" name="cursus[]" id="cursus"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm mb-2 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-80 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Entrer le cursus " required="">
                                <div class="bg-gray-200 rounded-full w-10 h-10 flex items-center justify-center absolute top-0 right-0 cursor-pointer"
                                    onclick="addInputCursus()">
                                    <svg class="text-gray-600 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        {{-- langues --}}

                        <div class="col-span-2">
                            <label for="langues"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Langues</label>
                            <div class="relative" style="position: relative;">
                                <input type="text" name="langues[]" id="langues"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm mb-2 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-80 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Entrer les langues" required="">
                                <div class="bg-gray-200 rounded-full w-10 h-10 flex items-center justify-center absolute top-0 right-0 cursor-pointer"
                                    onclick="addInputLangues()">
                                    <svg class="text-gray-600 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                    </div>
                    <button type="submit"
                        class="text-white inline-flex items-center bg-purple-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">

                        Creer
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script>
        function addInputCompetences() {
            var newInput = document.createElement("input");
            newInput.type = "text";
            newInput.name = "competences[]";
            newInput.className =
                "bg-gray-50 border border-gray-300 text-gray-900 text-sm  mb-2 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-80 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500";
            newInput.placeholder = "Entrer les competences";
            document.getElementById("competences").parentNode.appendChild(newInput);
        }

        function addInputExperiences() {
            var newInput = document.createElement("input");
            newInput.type = "text";
            newInput.name = "experiences[]";
            newInput.className =
                "bg-gray-50 border border-gray-300 text-gray-900 text-sm  mb-2 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-80 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500";
            newInput.placeholder = "Entrer les experiences";
            document.getElementById("experiences").parentNode.appendChild(newInput);
        }

        function addInputCursus() {
            var newInput = document.createElement("input");
            newInput.type = "text";
            newInput.name = "cursus[]";
            newInput.className =
                "bg-gray-50 border border-gray-300 text-gray-900 text-sm  mb-2 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-80 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500";
            newInput.placeholder = "Entrer le cursus";
            document.getElementById("cursus").parentNode.appendChild(newInput);
        }

        function addInputLangues() {
            var newInput = document.createElement("input");
            newInput.type = "text";
            newInput.name = "langues[]";
            newInput.className =
                "bg-gray-50 border border-gray-300 text-gray-900 text-sm  mb-2 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-80 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500";
            newInput.placeholder = "Entrer les langues ";
            document.getElementById("langues").parentNode.appendChild(newInput);
        }

        function toggleCVCard() {
            var cvCard = document.getElementById('CvCard');
            cvCard.classList.toggle('hidden');
        }
    </script>


</x-app-layout>
