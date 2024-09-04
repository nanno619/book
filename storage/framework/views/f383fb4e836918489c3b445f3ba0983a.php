

<?php $__env->startSection('content'); ?>

    <h1 class="mb-10 text-2xl">Books</h1>

    
    <form method="GET" action="<?php echo e(route('books.index')); ?>" class="mb-4 flex space-x-2 items-center">
        <input type="text" name="title" class="input h-10" placeholder="Search by title" 
            value="<?php echo e(request('title')); ?>" />
        <input type="hidden" name="filter" value="<?php echo e(request('filter')); ?>">
        <button type="submit" class="btn h-10">Search</button>
        <a href="<?php echo e(route('books.index')); ?>" class="btn h-10">Clear</a>
    </form>

    
    <div class="filter-container mb-4 flex">
        <?php
            $filters = [
                '' => 'Latest',
                'popular_last_month' => 'Popular Last Month',
                'popular_last_6months' => 'Popular Last 6 Months',
                'highest_rated_last_month' => 'Highest Rated Last Month',
                'highest_rated_last_6months' => 'Highest Rated Last 6 Months',
            ]
        ?>

        <?php $__currentLoopData = $filters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <a href="<?php echo e(route('books.index', [...request()->query(), 'filter' => $key])); ?>" 
                class="<?php echo e(request('filter') === $key || (request('filter') === null && $key === '') ? 'filter-item-active' : 'filter-item'); ?>">
                <?php echo e($label); ?>

            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    
    <ul>
        <?php $__empty_1 = true; $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <li class="mb-4">
                <div class="book-item">
                  <div
                    class="flex flex-wrap items-center justify-between">
                    <div class="w-full flex-grow sm:w-auto">
                      <a href="<?php echo e(route('books.show', $book)); ?>" class="book-title"><?php echo e($book->title); ?></a>
                      <span class="book-author">by <?php echo e($book->author); ?></span>
                    </div>
                    <div>
                      <div class="book-rating">
                        <?php echo e(number_format($book->reviews_avg_rating, 1)); ?>

                      </div>
                      <div class="book-review-count">
                        out of <?php echo e($book->reviews_count); ?> <?php echo e(Str::plural('review', $book->reviews_count)); ?>

                      </div>
                    </div>
                  </div>
                </div>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <li class="mb-4">
                <div class="empty-book-item">
                  <p class="empty-text">No books found</p>
                  <a href="<?php echo e(route('books.index')); ?>" class="reset-link">Reset criteria</a>
                </div>
            </li>
        <?php endif; ?>
    </ul>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\book-review\resources\views/books/index.blade.php ENDPATH**/ ?>