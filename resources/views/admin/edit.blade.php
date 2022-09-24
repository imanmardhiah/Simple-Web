<x-app-layout>
<x-alert/>
<div class="w-2/3 mx-auto">
<form action="{{ route('admin.update', $movie->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="mt-4">
    <x-label for="title" value="Title" />
    <x-input type="text" class="block w-full mt-1" name="title" value="{{ $movie->title }}"/>
    @error('title')
        <span class="text-red-900 p-2">
        {{ $message }}
        </span>
    @enderror
    </div>
    <div class="mt-4">
    <x-label for="description" value="description" />
    <x-input type="description" class="block w-full mt-1" name="description" value="{{ $movie->description }}"/>
    @error('description')
    <span class="text-red-900 p-2">
        {{ $message }}
        </span>
    @enderror
    </div>
    <div class="mt-4">
    <x-label for="genre" value="genre" />
    <x-input type="genre" class="block w-full mt-1" name="genre" value="{{ $movie->genre }}"/>
    @error('genre')
    <span class="text-red-900 p-2">
        {{ $message }}
        </span>
    @enderror
    </div>
    <div class="mt-4">
    <x-label for="production" value="production" />
    <x-input type="production" class="block w-full mt-1" name="production" value="{{ $movie->production }}"/>
    @error('production')
    <span class="text-red-900 p-2">
        {{ $message }}
        </span>
    @enderror
    </div>
    <div class="mt-4">
    <x-label for="releaseyear" value="releaseyear" />
    <x-input type="releaseyear" class="block w-full mt-1" name="releaseyear" value="{{ $movie->releaseyear }}"/>
    @error('releaseyear')
    <span class="text-red-900 p-2">
        {{ $message }}
        </span>
    @enderror
    </div>
    <div class="mt-4">
    <x-label for="main_picture" value="Main" />
    <input type="file" class="block w-full mt-1" name="main_picture"/>
    @error('main_picture')
    <span class="text-red-900 p-2">
        {{ $message }}
        </span>
    @enderror
    </div>
    <x-button type="submit" class="mt-4">Update</x-button>
    <x-button type="reset" class="mt-4">Cancel</x-button>
</form>
</div>
</x-app-layout>