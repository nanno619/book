

<?php $__env->startSection('content'); ?>
  <div class="mb-4">
    <h1 class="sticky top-0 mb-2 text-2xl"><?php echo e($book->title); ?></h1>

    <div class="book-info">
      <div class="book-author mb-4 text-lg font-semibold">by <?php echo e($book->author); ?></div>
      <div class="book-rating flex items-center">
        <div class="mr-2 text-sm font-medium text-slate-700">
          <?php echo e(number_format($book->reviews_avg_rating, 1)); ?>

        </div>
        <span class="book-review-count text-sm text-gray-500">
          <?php echo e($book->reviews_count); ?> <?php echo e(Str::plural('review', 5)); ?>

        </span>
      </div>
    </div>
  </div>

  <div>
    <h2 class="mb-4 text-xl font-semibold">Reviews</h2>
    <ul>
      <?php $__empty_1 = true; $__currentLoopData = $book->reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <li class="book-item mb-4">
          <div>
            <div class="mb-2 flex items-center justify-between">
              <div class="font-semibold"><?php echo e($review->rating); ?></div>
              <div class="book-review-count">
                <?php echo e($review->created_at->format('M j, Y')); ?></div>
            </div>
            <p class="text-gray-700"><?php echo e($review->review); ?></p>
          </div>
        </li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <li class="mb-4">
          <div class="empty-book-item">
            <p class="empty-text text-lg font-semibold">No reviews yet</p>
          </div>
        </li>
      <?php endif; ?>
    </ul>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\book-review\resources\views/books/show.blade.php ENDPATH**/ ?>