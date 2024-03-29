<x-guest-layout>
    
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <div class="flex justify-center items-center lg:order-2 gap-4">
            @guest
            
                <a href="{{ url('registerEntreprise') }}"
                    class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800">Entreprise</a>
                <a href="{{ url('registerChercheur') }}"
                    class="text-gray-800 border hover:bg-purple-100 border-purple-700 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Chercheur d'emploi
                    </a>
            @else
            <a href="{{ url('logout') }}"
            class="text-gray-800 border border-red-700 bg-red-200 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Logout</a>
            @endguest
        </div>

        <label class="flex justify-center text-2xl text-bold mt-4"> Looking for candidats ? Register</label>

          <!-- Role -->
          <input type="hidden" name="role" value="{{ $role }}">

        <!-- Name -->
        <div class="mt-4">
            <x-input-label for="name" :value="__('Nom')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

                {{-- Picture --}}
                <div class="mt-4">
                    <x-input-label for="Logo" :value="__('Logo')" />
                    <div class="flex items-center justify-center w-full mt-4">
            
                        <label for="dropzone-file"
                            class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                                        upload</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG</p>
                            </div>
                            <input id="dropzone-file" type="file" name="photo" class="hidden" />
                        </label>
                    </div>
                </div>


        <!-- slogan -->
        <div class="mt-4">
            <x-input-label for="slogan" :value="__('Slogan')" />
            <x-text-input id="slogan" class="block mt-1 w-full" type="text" name="titre" :value="old('slogan')"
                required autofocus autocomplete="slogan" />
            <x-input-error :messages="$errors->get('slogan')" class="mt-2" />
        </div>


        

        <!-- industrie -->
        <div class="mt-4">
            <x-input-label for="industrie" :value="__('Industrie')" />
            <x-text-input id="industrie" class="block mt-1 w-full" type="text" name="industrie" :value="old('industrie')"
                required autofocus autocomplete="industrie" />
            <x-input-error :messages="$errors->get('industrie')" class="mt-2" />
        </div>
         {{-- <!-- description -->
         <div class="mt-4">
            <x-input-label for="description" :value="__('Description')" />
            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')"
                required autofocus autocomplete="description" />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div> --}}

        <div class="col-span-2">
            <label for="description" :value="__('Description')" 
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Description</label>
            <textarea id="description" rows="4" name="description" :value="old('description')" required autofocus autocomplete="description"
                class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Entrer description d'emploi ici"></textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />

        </div>



        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
