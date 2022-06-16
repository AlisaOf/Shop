

<?php $__env->startSection('styles'); ?>
<style>
    .product-price {
        border-bottom: 1px solid grey;
        font-size: 23px;    
        text-align: center;
        margin-bottom: 10px;
    }
    .card-title {
        height: 43px;
    }
    .card-text {
        height: 46px;
    }
    .product-buttons {
        display: flex;
        justify-content: space-between;
        line-height: 37px;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-3">
        <div class="card mb-4" style="width: 18rem;">
        <img src="<?php echo e(asset('storage')); ?>/<?php echo e($product->picture); ?>" class="card-img-top" alt="<?php echo e($product->name); ?>">
            <div class="card-body">
            <h5 class="card-title">
                <?php echo e($product->name); ?>

            </h5>
            <p class="card-text">
                <?php echo e($product->description); ?>

            </p>
            <div class="product-price">
                <?php echo e($product->price); ?> руб.
            </div>
            <div class="product-buttons">
                 <form method="post" action="<?php echo e(route('removeFromCart')); ?>">
                     <?php echo csrf_field(); ?>
                     <input name='id' hidden value="<?php echo e($product->id); ?>">
                     <button <?php if(empty(session("cart.$product->id"))): ?> disaibled <?php endif; ?> class="btn btn-danger">-</button>
                 </form>
                 <?php echo e(session("cart.$product->id") ?? 0); ?>

                 <form method="post" action="<?php echo e(route('addToCart')); ?>">
                     <?php echo csrf_field(); ?>
                     <input name='id' hidden value="<?php echo e($product->id); ?>">
                <button class="btn btn-success">+</button>
               </form>
            </div>
            </div>
        </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Shop\shop\resources\views/category.blade.php ENDPATH**/ ?>