

<?php $__env->startSection('title'); ?>
      Мои заказы
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<table class="table table-bordered">
    <thead class="text-center">
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">Дата</th>
            <th class="text-center">Товары</th>
            <th class="text-center">Количество</th>
            <th class="text-center">Стоимость</th>
            <th class="text-center">Сумма заказа</th>
            <th class="text-center">Повторить заказ</th>
        </tr>
    </thead>
    <tbody>
        
        <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td class="text-center"><?php echo e($idx + 1); ?></td>
                    <td class="text-center"><?php echo e($order->created_at); ?></td>
                    <td class="text-center">  
                        <?php
                        $products = $order->products;
                        $summ = 0;
                        ?>  
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <table ><td ><?php echo e($product->name); ?> </td></table>
                        <?php
                        $productSum = $product->pivot->price * $product->pivot->quantity;
                        $summ = $summ + $productSum;                   
                        ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                    <td class="text-center">
                          <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>       
                          <table><td><?php echo e($product->pivot->quantity); ?> шт. </td></table>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                    <td class="text-center">
                          <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>       
                          <table><td><?php echo e($product->price); ?> руб. </td></table>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                    <td class="text-center"><?php echo e($summ); ?> руб.</td>
                    <td class="text-center">
                        <form method="post" action="<?php echo e(route('repeatOrder')); ?>">
                            <?php echo csrf_field(); ?>
                            <input class="text-center" type="hidden" name="order_id" value="<?php echo e($order->id); ?>"/>
                            <button class="btn btn-success" type="submit">Добавить в корзину</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td class="text-center" colspan="5">Сделайте свой первый <a href="<?php echo e(route('home')); ?>">заказ!</a></td>
                </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php $__env->stopSection(); ?>    
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Shop\shop\resources\views/orders.blade.php ENDPATH**/ ?>