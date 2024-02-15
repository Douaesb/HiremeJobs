<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dahsboard admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-3xl font-extrabold text-purple-800 sm:text-4xl ml-8">Statistics</h2>

                    <div class="max-w-7xl mx-auto  px-4=2 sm:px-6 lg:py-16 lg:px-8">
                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-4 mt-4">
                            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                                <div class="px-4 py-5 sm:p-6">
                                    <dl>
                                        <dt class="text-sm leading-5 font-medium text-gray-500 truncate">Total job
                                            seekers</dt>
                                        <dd class="mt-1 text-3xl leading-9 font-semibold text-indigo-600">
                                            {{ $chercheurCount }}</dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                                <div class="px-4 py-5 sm:p-6">
                                    <dl>
                                        <dt class="text-sm leading-5 font-medium text-gray-500 truncate">Total
                                            entreprises</dt>
                                        <dd class="mt-1 text-3xl leading-9 font-semibold text-indigo-600">
                                            {{ $entrepriseCount }}</dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                                <div class="px-4 py-5 sm:p-6">
                                    <dl>
                                        <dt class="text-sm leading-5 font-medium text-gray-500 truncate">Total job
                                            offers</dt>
                                        <dd class="mt-1 text-3xl leading-9 font-semibold text-indigo-600">
                                            {{ $offersCount }}</dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                                <div class="px-4 py-5 sm:p-6">
                                    <dl>
                                        <dt class="text-sm leading-5 font-medium text-gray-500 truncate">Total users
                                        </dt>
                                        <dd class="mt-1 text-3xl leading-9 font-semibold text-indigo-600">
                                            {{ $userCount }}</dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                                <div class="px-4 py-5 sm:p-6">
                                    <dl>
                                        <dt class="text-sm leading-5 font-medium text-gray-500 truncate">Top entreprise
                                        </dt>
                                        <dd class="mt-1 text-2xl leading-9 font-semibold text-indigo-600">
                                            {{ $topEntreprise }}</dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                                <div class="px-4 py-5 sm:p-6">
                                    <dl>
                                        <dt class="text-sm leading-5 font-medium text-gray-500 truncate">Top applicant
                                        </dt>
                                        <dd class="mt-1 text-2xl leading-9 font-semibold text-indigo-600">
                                            {{ $topApplicant }}</dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                                <div class="px-4 py-5 sm:p-6">
                                    <dl>
                                        <dt class="text-sm leading-5 font-medium text-gray-500 truncate">Top subscriber
                                        </dt>
                                        <dd class="mt-1 text-2xl leading-9 font-semibold text-indigo-600">
                                            {{ $topSubscriber }}</dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                                <div class="px-4 py-5 sm:p-6">
                                    <dl>
                                        <dt class="text-sm leading-5 font-medium text-gray-500 truncate">Top entreprise subscriber
                                        </dt>
                                        <dd class="mt-1 text-2xl leading-9 font-semibold text-indigo-600">
                                            {{ $topEntrepriseSubscriber }}</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
