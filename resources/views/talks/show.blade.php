<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $talk->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Success!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

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
