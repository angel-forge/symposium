<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Talks Index') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul class="list-disc pl-4">
                        @foreach ($talks as $talk)
                            <a href="{{ route('talks.show', ['talk' => $talk]) }}">
                                <li>{{ $talk->title }} ({{ $talk->type }} | {{ $talk->length }})</li>
                            </a>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
