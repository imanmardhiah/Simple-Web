<x-post-featured-card :movie="$movies[0]" />

@if ($movies->count() > 1)
    <div class="lg:grid lg:grid-cols-6">
        @foreach ($movies->skip(1) as $movie)
            <x-post-card
                :movie="$movie"
                class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}"
            />
        @endforeach
    </div>
@endif
