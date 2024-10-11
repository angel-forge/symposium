<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $talk->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                     role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">Your action has been completed successfully.</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
             viewBox="0 0 20 20">
            <title>Close</title>
            <path
                d="M14.348 14.849a1 1 0 01-1.414 0L10 11.414 7.066 14.35a1 1 0 01-1.415-1.415L8.586 10 5.652 7.066a1 1 0 011.415-1.415L10 8.586l2.934-2.935a1 1 0 011.415 1.415L11.414 10l2.934 2.934a1 1 0 010 1.415z"/>
        </svg>
    </span>

                </div>

                <div class="p-6 text-gray-900">
                    {{ $talk->abstract }}

                    <br>
                    <a class="text-sm text-gray-700 underline" href="{{ route('talks.edit', ['talk' => $talk]) }}">
                        Edit this talk
                    </a>
                    <x-delete-item :route="route('talks.destroy', ['talk' => $talk])" text="Delete this talk"/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
