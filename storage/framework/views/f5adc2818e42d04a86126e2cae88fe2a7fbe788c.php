

<?php $__env->startSection('title'); ?>
     Список категорий
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
<h3>Добавить новую категорию</h3>
<form method="post" action="<?php echo e(route('createCategory')); ?>" class="mb-4" enctype="multipart/form-data">
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
             <label for="name" class="col-sm-2 col-form-label">Изображение</label>
             <div class="col-sm-6">
             <input type="file" name="picture" class="form-control">
             </div>
        </div>  
        <br>  
        <button class="btn btn-success" type="submit">Сохранить</button>
    </form>
</div>


<h1> <?php echo e($title); ?> </h1>


       <table class="table table-bordered">
            <thead>
                 <tr>
                      <th class="text-center">#</th>
                      <th class="text-center">Имя</th>
                      <th class="text-center">Изображение</th>
                      <th class="text-center">Действия</th>
                 </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <tr>
                      <td class="text-center"><?php echo e($category->id); ?></td>
                      <td class="text-center"><?php echo e($category->name); ?></td>  
                      <td class="text-center" width='100'> <img src="<?php echo e(asset('storage')); ?>/<?php echo e($category->picture); ?>" height='100'></td> 
                      <td class="text-center">
                           <div class="btn-group" role="group">
                                <a class="btn btn-warning" type="button" href="#">Редактировать</a>
                                <form method="post" action="<?php echo e(route('deleteCategory', $category->id)); ?>">
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
       <?php echo e($categories-> links()); ?>

       </div>

     <?php if(session('startExportCategories')): ?>
       <div class="alert alert-success">
            Выгрузка категорий запущена
       </div>
     <?php endif; ?>

     <?php if(session('startImportCategories')): ?>
       <div class="alert alert-success">
            Загрузка категорий началась
       </div>
     <?php endif; ?>

       <form method="post" action="<?php echo e(route('exportCategories')); ?>">
            <?php echo csrf_field(); ?>
             <button type="submit" class="btn btn-primary">Выгрузить категории</button>
       </form>
      <br>
       <form method="post" action="<?php echo e(route('importCategories')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="input-group row">
                <label for="name" class="col-sm-2 col-form-label">Файл для импорта</label>
               <div class="col-sm-6">
                <input type="file" name="importFile" class="form-control">
               </div> 
           </div>  
           <button type="submit" class="btn btn-primary mt-2" >Загрузить категории</button>
        </form>  
       
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Shop\shop\resources\views/admin/categories.blade.php ENDPATH**/ ?>