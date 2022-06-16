

<?php $__env->startSection('title'); ?>
     Список продуктов
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<?php if($errors->isNotEmpty()): ?>
            <div class="alert alert-warning" role="alert">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($error); ?> 
                    <?php if(!$loop->last): ?> <br> <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
<?php endif; ?>


<div class="col-md-12">
<h3>Добавить новый продукт</h3>
<form method="post" action="<?php echo e(route('createProduct')); ?>" class="mb-4" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="input-group row">
             <label for="name" class="col-sm-2 col-form-label">Название</label>
             <div class="col-sm-6">
             <input type="text" class="form-control mb-2" name="name" placeholder="Введите название категории">
             </div>
        </div> 
        <br>    
        <div class="input-group row">
             <label for="name" class="col-sm-2 col-form-label">Описание</label>
             <div class="col-sm-6">
             <textarea type="text" class="form-control mb-2" name="description" cols="72" rows="7" placeholder="Введите описание категории"></textarea>
             </div>
        </div>   
        <br>
        <div class="input-group row">
             <label for="name" class="col-sm-2 col-form-label">Категория</label>
             <div class="col-sm-6">
             <select class="form-control" name="category_id">
                <option disabled selected>--Выберите категорию--</option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </select> 
             </div>
        </div>   
        <br>
        <div class="input-group row">
             <label for="name" class="col-sm-2 col-form-label">Цена</label>
             <div class="col-sm-6">
             <input type="text" class="form-control mb-2" name="price" placeholder="Введите цену">
             </div>
        </div>   
        <br>
        <div class="input-group row">
             <label for="name" class="col-sm-2 col-form-label">Изображение</label>
             <div class="col-sm-6">
             <input type="file" name="picture" class="form-control">
             </div>
        </div>  
        <br>  
        <button class="btn btn-success" type="submit">Сохранить</button>
    </form>
</div>

 <h1><?php echo e($title); ?> </h1>



  <table class="table table-bordered">
        <thead class="text-center">
                 <tr>
                      <th>#</th>
                      <th>Имя</th>
                      <th>Изображение</th>
                      <th>Описание</th>
                      <th>Категория</th> 
                      <th>Цена, руб</th>
                      <th>Действия</th>
                 </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <tr>
                      <td class="text-center"><?php echo e($product->id); ?></td>
                      <td class="text-center"><?php echo e($product->name); ?></td>
                      <td class="text-center"><img src="<?php echo e(asset('storage')); ?>/<?php echo e($product->picture); ?>" height='100'></td>
                      <td class="text-center"><?php echo e($product->description); ?></td>
                      <td class="text-center"><?php echo e($product->category_id); ?></td> 
                      <td class="text-center"><?php echo e($product->price); ?></td>
                      <td class="text-center">
                      <div class="btn-group" role="group">
                                <a class="btn btn-warning" type="button" href="#">Редактировать</a>
                                <form method="post" action="<?php echo e(route('deleteProduct', $product->id)); ?>">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-danger">Удалить</button>
                                </form>  
                           </div>
                      </td>
                 </tr>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
  </table>

  <div>
       <?php echo e($products-> links()); ?>

  </div>
  <?php if(session('startExportProducts')): ?>
       <div class="alert alert-success">
            Выгрузка продуктов началась
       </div>
     <?php endif; ?>
  
  <form method="post" action="<?php echo e(route('exportProducts')); ?>">
            <?php echo csrf_field(); ?>
             <button type="submit" class="btn btn-primary">Выгрузить продукты</button>
  </form>

  <br>
       <form method="post" action="<?php echo e(route('importProducts')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="input-group row">
                <label for="name" class="col-sm-2 col-form-label">Файл для импорта</label>
               <div class="col-sm-6">
                <input type="file" name="importFile" class="form-control">
               </div> 
           </div>  
           <button type="submit" class="btn btn-primary mt-2" >Загрузить продукты</button>
        </form>  

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Shop\shop\resources\views/admin/products.blade.php ENDPATH**/ ?>