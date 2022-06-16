


<?php $__env->startSection('title'); ?>
     Список пользователей
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php if($errors->isNotEmpty()): ?>
        <div class="alert alert-warning" role="alert">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($error); ?>

                <?php if(!$loop->last): ?><br> <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
        
    <h1>Список ролей</h1>

<table class="table table-bordered">
    <thead>
        <tr>
           <th>#</th>
           <th>Название</th>
        </tr>
    </thead>
    <tbody>
    <?php $__empty_1 = true; $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <tr>
        <td><?php echo e($idx + 1); ?></td>
        <td><?php echo e($role->name); ?></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <tr>
        <td class="text-center" colspan="2">Ролей пока нет</td>
    </tr>
    <?php endif; ?>
   </tbody>
</table>

    <form method="post" action="<?php echo e(route('addRole')); ?>" class="mb-4">
        <h3>Добавить новую роль</h3>
        <?php echo csrf_field(); ?>
        <input class="form-control mb-2" name='name'>
        <button class="btn btn-success" type="submit">Сохранить</button>
    </form>

    <form method="post" action="<?php echo e(route('addRoleToUser')); ?>" class="mb-4">
        <h3>Добавить роль пользователю</h3>
        <?php echo csrf_field(); ?>
        <select class="form-control mb-2" name='user_id'>
            <option disabled selected>-- Выберите пользователя --</option>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <select class="form-control mb-2" name='role_id'>
            <option disabled selected>-- Выберите роль --</option>
            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <button class="btn btn-success" type="submit">Сохранить</button>
    </form>

    <h1> <?php echo e($title); ?> </h1>

       <table class="table table-bordered">
            <thead>
                 <tr>
                      <th>#</th>
                      <th>Имя</th>
                      <th>Почта</th>
                      <th>Роли</th>
                      <th></th>
                 </tr>
            </thead>
           <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <tr>
                      <td><?php echo e($user->id); ?></td>
                      <td><?php echo e($user->name); ?></td>
                      <td><?php echo e($user->email); ?></td>
                      <td>
                           <ul>
                                <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($role->name); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </ul>
                      </td>
                      <td class="text-center">
                        <a href="<?php echo e(route('enterAsUser', $user->id)); ?>">Войти</a>
                      </td>  
                 </tr>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           </tbody>
     </table>

     <div>
         <?php echo e($users-> links()); ?>

     </div>
    
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Shop\shop\resources\views/admin/users.blade.php ENDPATH**/ ?>