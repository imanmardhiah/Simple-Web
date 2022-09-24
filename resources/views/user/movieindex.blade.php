<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Main Page') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <main class="max-w-6xl mx-auto mt-6 lg:mt-10 space-y-6">
                    @if ($movies->count())
                    <x-posts-grid :movies="$movies" />

                        {{ $movies->links() }}
                    @else
                    <p class="text-center">No movies yet. Please check back later.</p>
                    @endif
                </main>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>