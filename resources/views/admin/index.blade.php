<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage') }}
        </h2>
    </x-slot>

<div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div>
                <h2 class="text-2xl font-semibold leading-tight">Movies</h2>
            </div>
            <div class="my-2 flex sm:flex-row flex-col items-center">
                <div class="block relative">
                    <span class="h-full absolute inset-y-0 left-0 flex items-center pl-2">
                        <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
                            <path
                                d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                            </path>
                        </svg>
                    </span>
                    <input placeholder="Search"
                        class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
                </div>
                <div class="block relative">
                    <a href="{{ route('admin.create') }}" class="h-full py-2 px-5 bg-gray-800 text-gray-50 
                    hover:bg-gray-900 rounded ml-2">Add Movie</a>
                </div>
            </div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Picture
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Movie Title
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Action
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($movies as $item)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-25 h-25">
                                            <img class="w-64 h-64 object-cover"
                                                src="{{asset('storage/'.$item->main_picture)}}"
                                                alt="" />
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-center">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $item->title }}</p>
                                            </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-center">
                                    <a href="{{ route('admin.edit', $item->id) }}" class="text-blue-900">Edit</a>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-left">
                                    <form action="{{ route('admin.destroy', $item->id) }}" method="post">
                                        @csrf 
                                        @method('delete')
                                        <button onclick="return confirm('Are you sure?')" type="submit" class="text-red-900">Delete</button>
                                    </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                 Data Not Found
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="p-2"> <!-- Padding for bottom pagination -->
                    {{ $movies->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>