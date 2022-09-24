<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
 <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('')); ?>

        </h2>
     <?php $__env->endSlot(); ?>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <?php echo \Livewire\Livewire::styles(); ?>

                <article
    class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 rounded-xl">
    <div class="py-6 px-5 lg:flex">
        <div class="flex-1 lg:mr-8">
            <img src="<?php echo e(asset('storage/'.$movie->main_picture)); ?>" alt="Blog movie illustration" class="rounded-xl">
        </div>

        <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">
                <div class="space-x-2">
                <?php echo e($movie->genre); ?>

                    
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="/movies/<?php echo e($movie->id); ?>">
                            <?php echo e($movie->title); ?>

                        </a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                    <?php echo e($movie->production); ?>

                    </span>
                </div>
            </header>

            <div class="text-sm mt-2 space-y-4">
                <?php echo $movie->description; ?>

            </div>
            <div class="-mx-2 sm:px-8 py-10 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Cast Name
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Cast Picture
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $movie->cast; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                            <tr>
                                <td class="px-6 py-6 border-b border-gray-200 bg-white text-sm">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-10 h-10">
                                            <img class="w-full h-full rounded-full"
                                                src="<?php echo e(asset('storage/'.$item->profile_picture)); ?>"
                                                alt="" />
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-center">
                                <p class="text-gray-900 whitespace-no-wrap"><?php echo e($item->name); ?></p>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <div class="ml-3">
                        <h5 class="font-bold">
                        <?php echo $movie->releaseyear; ?>

                        </h5>
                    </div>
                </div>
            </footer>

        </div>
    </div>
</article>
<div class="py-5">
    
</div>
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('movie-ratings', ['movie' => $movie])->html();
} elseif ($_instance->childHasBeenRendered($movie->id)) {
    $componentId = $_instance->getRenderedChildComponentId($movie->id);
    $componentTag = $_instance->getRenderedChildComponentTagName($movie->id);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild($movie->id);
} else {
    $response = \Livewire\Livewire::mount('movie-ratings', ['movie' => $movie]);
    $html = $response->html();
    $_instance->logRenderedChild($movie->id, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

                    </div>
                </div>
            </div>

    <?php echo \Livewire\Livewire::scripts(); ?>

                </div>
            </div>
        </div>
    </div>
 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\moviesystem\resources\views/user/movie.blade.php ENDPATH**/ ?>