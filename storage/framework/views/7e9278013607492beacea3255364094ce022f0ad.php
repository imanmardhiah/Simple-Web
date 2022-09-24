<?php $attributes = $attributes->exceptProps(['movie']); ?>
<?php foreach (array_filter((['movie']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<article
    <?php echo e($attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl'])); ?>>
    <div class="py-6 px-5 h-full flex flex-col">
        <div>
            <img src="<?php echo e(asset('storage/'.$movie->main_picture)); ?>" alt="Blog movie illustration" class="rounded-xl">
        </div>

        <div class="mt-6 flex flex-col justify-between flex-1">
            <header>
                <div class="space-x-2">
                   
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl clamp one-line">
                        <a href="/movies/<?php echo e($movie->id); ?>">
                            <?php echo e($movie->title); ?>

                        </a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        
                    </span>
                </div>
            </header>

            <div class="text-sm mt-4 space-y-4">
                <?php echo $movie->de; ?>

            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="/images/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3">
                        <h5 class="font-bold">
                            
                        </h5>
                    </div>
                </div>

                <div>
                <a href="/user/movie/<?php echo e($movie->id); ?>"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >More Info</a>
                </div>
            </footer>
        </div>
    </div>
</article><?php /**PATH C:\xampp\htdocs\moviesystem\resources\views/components/post-card.blade.php ENDPATH**/ ?>