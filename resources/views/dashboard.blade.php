<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (auth()->user()->role->name == 'manager')
                        {{ __("You're manager") }}
                        <!-- Manager section -->
                    @else
                        {{ __("You're client") }}

                        <!-- Client section -->
                        <div class="max-w-md mx-auto"> <!-- Formning kengligini cheklash -->
                            <form method="POST" action="" enctype="multipart/form-data" class="mt-6 space-y-4">
                                @csrf
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Subject</label>
                                    <input type="text" name="name" id="name" required
                                        class="mt-1 block w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 dark:text-gray-100 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring focus:ring-indigo-500 focus:outline-none">
                                </div>
                                
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">File</label>
                                    <input type="file" name="file" id="file" required
                                        class="mt-1 block w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 dark:text-gray-100 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring focus:ring-indigo-500 focus:outline-none">
                                </div>
                                
                                <div>
                                    <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Xabar</label>
                                    <textarea name="message" id="message" rows="4" required
                                        class="mt-1 block w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 dark:text-gray-100 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring focus:ring-indigo-500 focus:outline-none"></textarea>
                                </div>
                                
                                <div class="flex justify-center"> <!-- Tugmani o'rtaga joylashtirish -->
                                    <button type="submit"
                                        class="px-4 py-2 bg-blue-500 text-white font-medium text-sm rounded-md hover:bg-blue-600 focus:ring focus:ring-blue-300 focus:outline-none">
                                        Arizani Yuborish
                                    </button>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
