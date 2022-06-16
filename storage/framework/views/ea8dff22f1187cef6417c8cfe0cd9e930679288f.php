<?php $__env->startSection('content'); ?>

<categories-component 
    :categories="<?php echo e($categories); ?>" 
    route-admin-categories="<?php echo e(route('adminCategories')); ?>"
    route-category="<?php echo e(route('category', '')); ?>"
    page-title="" 
    test="test"
>
</categories-component>

   <div class="row">
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-3">
        <div class="card mb-4" style="width: 18rem;">
        <img src="<?php echo e(asset('storage')); ?>/<?php echo e($category->picture); ?>" class="card-img-top" alt="<?php echo e($category->name); ?>">
            <div class="card-body">
            <h5 class="card-title">
                <?php echo e($category->name); ?>

            </h5>
            <p class="card-text">
                <?php echo e($category->description); ?>

            </p>
            <a href="<?php echo e(route('category', $category->id)); ?>" class="btn btn-primary">Перейти</a>
            </div>
        </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div> 

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Shop\shop\resources\views/home.blade.php ENDPATH**/ ?>