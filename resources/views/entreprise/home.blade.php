<x-app-layout>
    @extends('layouts.master')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($user->photo)
                        <img src="{{ $user->photo }}" alt="User Photo">
                    @else
                        <p>No photo available</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
