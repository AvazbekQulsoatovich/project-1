<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800  shadow-sm sm:rounded-lg">
                <div class="p-6 mt-4  text-gray-900 dark:text-gray-100">
                    @if (auth()->user()->role->name == 'manager')
               @foreach ($applications as $application )
                   
             

      <div class=" mt-2  border border-2 rounded   p-5 shadow-md w-9/12 ">
    <div class="flex  items-center mt-4 justify-between  ">
      <div class="flex items-center mt-4 ">
      <div class="avatar-content mb-2.5 sm:mb-0 sm:mr-2.5">
                    <img class="avatar w-20 h-20 rounded-full" src="https://randomuser.me/api/portraits/men/32.jpg"/>
                </div>
        <div class="text-lg font-bold text-slate-700">{{$application->user->name}}</div>
      </div>
      <div class="flex items-center space-x-8">
        <button class="rounded-2xl border bg-neutral-100 px-3 py-1 text-xs font-semibold">ID: {{$application->id}}</button>
        <div class="text-xs text-neutral-500">{{$application->created_at}}</div>
      </div>
    </div>

    <div class="mt-4 mb-6">
      <div class="mb-3 text-xl font-bold">{{$application->subject}}</div>
      <div class="text-sm  text-neutral-600">{{$application->message}}</div>
        <h1>{{$application->user->email}}</h1>
  </div>
  @endforeach

                        
                    @else
                        {{ __("You're client") }}

                        <!-- Client section -->
                        <div class="max-w-md mx-auto"> <!-- Formning kengligini cheklash -->
                            <form method="POST" action="{{route('application.store')}}" enctype="multipart/form-data" class="mt-6 space-y-4">
                                @csrf
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Subject</label>
                                    <input type="text" name="subject" id="name" required
                                        class="mt-1 block w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 dark:text-gray-100 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring focus:ring-indigo-500 focus:outline-none">
                                </div>
                                
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">File</label>
                                    <input type="file" name="file" id="file" 
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
