

<?php $__env->startSection('title'); ?>
     Админка
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-sm-3">
     <div class="card border-primary mb-4" style="max-width: 18rem;">
        <div class="card-body text-center text-primary">
        <h5 class="card-title">Список пользователей</h5>
        <a href="<?php echo e(route('adminUsers')); ?>" class="btn btn-primary">Перейти</a>
        </div>
      </div>
    </div> 
    <div class="col-sm-3">
      <div class="card border-primary mb-4" style="max-width: 18rem;">
        <div class="card-body text-center text-primary">
        <h5 class="card-title">Список категорий</h5>
        <a href="<?php echo e(route('adminCategories')); ?>" class="btn btn-primary">Перейти</a>
        </div>
       </div>
    </div> 
    <div class="col-sm-3">
      <div class="card border-primary mb-4" style="max-width: 18rem;">
        <div class="card-body text-center text-primary">
        <h5 class="card-title">Список продуктов</h5>
        <a href="<?php echo e(route('adminProducts')); ?>" class="btn btn-primary">Перейти</a>
        </div>
      </div>
   </div>   
   <div class="col-sm-3">
      <div class="card border-primary mb-4" style="max-width: 18rem;">
        <div class="card-body text-center text-primary">
        <h5 class="card-title">Список заказов</h5>
        <a href="" class="btn btn-primary">Перейти</a>
        </div>
      </div>
   </div>  
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Shop\shop\resources\views/admin/admin.blade.php ENDPATH**/ ?>