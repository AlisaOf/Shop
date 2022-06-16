Уважаемый, <?php echo e($data ['name']); ?>!
<br>
Благодарим Вас за оформление заказа в нашем магазине.

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
             <?php $__currentLoopData = $data['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <?php
                      $productSumm = $product->price * $product->pivot->quantity;
                      $summ += $productSumm;
                 ?>
                 <tr>
                     <td><?php echo e($idx + 1); ?></td>
                     <td><?php echo e($product->name); ?></td>
                     <td><?php echo e($product->priсe); ?></td>
                     <td > 
                         <?php echo e($product->pivot->quantity); ?>     
                     </td>
                     <td>
                         <?php echo e($productSumm); ?>

                     </td>
                 </tr>   
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<br>
    Будем рады видеть Вас снова!<?php /**PATH C:\Shop\shop\resources\views/mail/order_created.blade.php ENDPATH**/ ?>