<div>
    <section class="w-full px-8 pt-4 pb-10 xl:px-8">
        <div class="max-w-5xl mx-auto">
            <div class="flex flex-col items-center md:flex-row">

                <div class="w-full mt-16 md:mt-0">
                    <div class="relative z-10 h-auto p-4 py-10 overflow-hidden bg-white border-b-2 border-gray-300 rounded-lg shadow-2xl px-7">
                        <?php if(auth()->guard()->check()): ?>
                        <div class="w-full space-y-5">
                                <p class="font-medium text-blue-500 uppercase">
                                Rating: <strong><?php echo e($currentRating); ?></strong> ⭐ 
                                </p>
                            </div>
                            <?php if(session()->has('message')): ?>
                                <p class="text-xl text-gray-600 md:pr-16">
                                    <?php echo e(session('message')); ?>

                                </p>
                            <?php endif; ?>
                            <?php if($hideForm != true): ?>
                                <form wire:submit.prevent="rate()">
                                    <div class="block max-w-3xl px-1 py-2 mx-auto">
                                        <div class="flex space-x-1 rating">
                                            <label for="star1">
                                                <input hidden wire:model="rating" type="radio" id="star1" name="rating" value="1" />
                                                <svg class="cursor-pointer block w-8 h-8 <?php if($rating >= 1 ): ?> text-indigo-500 <?php else: ?> text-grey <?php endif; ?> " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </label>
                                            <label for="star2">
                                                <input hidden wire:model="rating" type="radio" id="star2" name="rating" value="2" />
                                                <svg class="cursor-pointer block w-8 h-8 <?php if($rating >= 2 ): ?> text-indigo-500 <?php else: ?> text-grey <?php endif; ?> " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </label>
                                            <label for="star3">
                                                <input hidden wire:model="rating" type="radio" id="star3" name="rating" value="3" />
                                                <svg class="cursor-pointer block w-8 h-8 <?php if($rating >= 3 ): ?> text-indigo-500 <?php else: ?> text-grey <?php endif; ?> " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </label>
                                            <label for="star4">
                                                <input hidden wire:model="rating" type="radio" id="star4" name="rating" value="4" />
                                                <svg class="cursor-pointer block w-8 h-8 <?php if($rating >= 4 ): ?> text-indigo-500 <?php else: ?> text-grey <?php endif; ?> " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </label>
                                            <label for="star5">
                                                <input hidden wire:model="rating" type="radio" id="star5" name="rating" value="5" />
                                                <svg class="cursor-pointer block w-8 h-8 <?php if($rating >= 5 ): ?> text-indigo-500 <?php else: ?> text-grey <?php endif; ?> " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </label>
                                        </div>
                                        <div class="my-5">
                                            <?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <p class="mt-1 text-red-500"><?php echo e($message); ?></p>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            <textarea wire:model.lazy="comment" name="description" class="block w-full px-4 py-3 border border-2 rounded-lg focus:border-blue-500 focus:outline-none" placeholder="Comment.."></textarea>
                                        </div>
                                    </div>
                                    <div class="block">
                                        <button type="submit" class="w-full px-3 py-4 font-medium text-white bg-blue-600 rounded-lg">Rate</button>
                                        <?php if(auth()->guard()->check()): ?>
                                            <?php if($currentId): ?>
                                                <button type="submit" class="w-full px-3 py-4 mt-4 font-medium text-white bg-red-400 rounded-lg" wire:click.prevent="delete(<?php echo e($currentId); ?>)" class="text-sm cursor-pointer">Delete</button>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </form>
                            <?php endif; ?>
                        <?php else: ?>
                            <div>
                                <div class="mb-8 text-center text-gray-600">
                                    You need to login in order to be able to rate the movie!
                                </div>
                                <a href="/register"
                                    class="block px-5 py-2 mx-auto font-medium text-center text-gray-600 bg-white border rounded-lg shadow-sm focus:outline-none hover:bg-gray-100" 
                                >Register</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
    
            </div>
        </div>
    </section>
    <section class="relative block pt-20 pb-24 overflow-hidden text-left bg-white">
        <div class="w-full px-20 mx-auto text-left md:px-10 max-w-7xl xl:px-16">
            <div class="box-border flex flex-col flex-wrap justify-center -mx-4 text-indigo-900">
                <div class="relative w-full mb-12 leading-6 text-left xl:flex-grow-0 xl:flex-shrink-0">
                    <h2 class="box-border mx-0 mt-0 font-sans text-2xl font-bold text-center text-indigo-900">
                        USER RATINGS
                    </h2>
                </div>
            </div>
            <div class="box-border flex grid flex-wrap justify-center gap-10 -mx-4 text-center text-indigo-900 lg:gap-16 lg:justify-start lg:text-left">
                <?php $__empty_1 = true; $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="flex col-span-1">
                        <div class="relative flex-shrink-0 w-20 h-20 text-left">
                            <a href="<?php echo e('@' . $comment->user->username); ?>">
                            </a>
                        </div>
                        <div class="relative px-4 mb-16 leading-6 text-left">
                            <div class="box-border text-lg font-medium text-gray-600">
                            <?php echo e($comment->comment); ?>

                            </div>
                            <div class="box-border mt-5 text-lg font-semibold text-indigo-900 uppercase">
                                Rating: <strong><?php echo e($comment->rating); ?></strong> ⭐
                            </div>
                            <div class="box-border text-left text-gray-700" style="quotes: auto;">
                                <a href="<?php echo e('@' . $comment->user->username); ?>">
                                    <?php echo e($comment->user->name); ?>

                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="flex col-span-1">
                    <div class="relative px-4 mb-16 leading-6 text-left">
                        <div class="box-border text-lg font-medium text-gray-600">
                            No ratings
                        </div>
                    </div>
                </div>
                <?php endif; ?>

            </div>
    </section>
    
</div>
<?php /**PATH C:\xampp\htdocs\moviesystem\resources\views/livewire/movie-ratings.blade.php ENDPATH**/ ?>