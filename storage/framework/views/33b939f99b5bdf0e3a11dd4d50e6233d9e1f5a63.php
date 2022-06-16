

<?php $__env->startSection('title'); ?>
      Корзина
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<style>
    .product-buttons {
        display:flex;
        justify-content: space-evenly;
        line-height: 37px;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <table class="table table-bordered">
         <thead>
             <tr>
                 <th>#</th>
                 <th>Наименование</th>
                 <th>Цена</th>
                 <th>Количество</th>
                 <th>Сумма</th>
             </tr>
         </thead>
         <tbody>
             <?php
                 $summ = 0;
             ?>
             <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                 <?php
                      $productSumm = $product->price * $product->quantity;
                      $summ += $productSumm;
                 ?>
                 <tr>
                     <td><?php echo e($idx + 1); ?></td>
                     <td><?php echo e($product->name); ?></td>
                     <td><?php echo e($product->price); ?></td>
                     <td class="product-buttons"> 
                         <form method="post" action="<?php echo e(route('removeFromCart')); ?>">
                             <?php echo csrf_field(); ?>
                             <input name="id" hidden value="<?php echo e($product->id); ?>" >
                             <button <?php if(empty($product->quantity)): ?> disabled <?php endif; ?> class="btn btn-danger">-</button>
                        </form> 
                         <?php echo e($product->quantity); ?>     
                         
                         <form method="post" action="<?php echo e(route('addToCart')); ?>">
                             <?php echo csrf_field(); ?>
                             <input name="id" hidden value="<?php echo e($product->id); ?>" >
                             <button class="btn btn-success">+</button>
                        </form> 
                     </td>
                     <td>
                         <?php echo e($productSumm); ?>

                     </td>
                 </tr>   
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                 <tr>
                     <td class="text-center" colspan="5">
                         Корзина пуста, начните <a href="<?php echo e(route('home')); ?>">покупки!</a>
                     </td>
                 </tr>
             <?php endif; ?>
                <tr>
                    <td colspan="4" class="text-end">Итого:</td>
                    <td>
                        <strong>
                            <?php echo e($summ); ?>

                        </strong>
                    </td>
                </tr>
         </tbody>
    </table>

      <?php if($summ): ?>
     <form method="post" action="<?php echo e(route('createOrder')); ?>">
         <?php echo csrf_field(); ?>
         <input placeholder="Имя" class="form-control mb-2" name='name' value="<?php echo e($user->name ?? ''); ?>">
         <input placeholder="Почта" class="form-control mb-2" name='email' value="<?php echo e($user->email ?? ''); ?>">
         <input placeholder="Адрес" class="form-control mb-2" name='address' value="<?php echo e($address); ?>">
         <?php if(!Auth::user()): ?>
          <!-- не забудьте добавить оферту -->
          <input id='register_confirmation' name='register_confirmation' type="checkbox">
          <label for="register_confirmation">Вы будете автоматически зарегистрированы</label>
          
            <br>
          <?php endif; ?>
         <button type="submit" class="btn btn-success">Оформить заказ</button>
     </form>
    <?php endif; ?>
<?php $__env->stopSection(); ?>    
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Shop\shop\resources\views/cart.blade.php ENDPATH**/ ?>