

<?php $__env->startSection('title'); ?>
    Профиль
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<style>
    .user-picture {
        width:  100px;
        border-radius: 100px;
        display: block;
    }

    .main-address {
        font-weight: bold;
    }    
</style>
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

<?php if(session('profileSaved')): ?>
    <div class="alert alert-success" role="alert">
       Профиль успешно обновлён!
    </div>
<?php endif; ?>

<form method="post" action="<?php echo e(route('saveProfile')); ?>" enctype="multipart/form-data" >
<div class="d-grip gap-2 d-md-flex justify-content-md-end">
<a  href="<?php echo e(route('orders', Auth::user()->id)); ?>" class="btn btn-primary" >Мои заказы </a>
</div>
     <?php echo csrf_field(); ?>
     <input type="hidden" value="<?php echo e($user->id); ?>" name='userId'>
     <div class="mb-3">
         <label class="form-label">Изображение</label>
         <image class="user-picture mb-2" src="<?php echo e(asset('storage')); ?>/<?php echo e($user->picture); ?>">
         <input type="file" name="picture" class="form-control">
    </div>
     <div class="mb-3">
         <label for="exampleInputEmail1" class="form-label">Почта</label>
         <input type="email" name="email" value="<?php echo e($user->email); ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
         <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    
     <div class="mb-3">
            <label class="form-label">Имя</label>
            <input name="name" value="<?php echo e($user->name); ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Текущий пароль</label>
        <input type="password" autocomplete="off" placeholder="Введите текущий пароль" name="current_password" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Новый пароль</label>
        <input type="password" placeholder="Введите новый пароль" name="password" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Повторите новый пароль</label>
        <input type="password" placeholder="Повторите новый пароль" name="password_confirmation" class="form-control">
    </div>
    <div class="mb-3">
            <label class="form-label">Список адресов:</label>
               <ul>
                <?php $__empty_1 = true; $__currentLoopData = $user->addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <br>
                <input <?php if($address->main): ?> checked <?php endif; ?> id="main_address<?php echo e($address->id); ?>" name='main_address' type="radio" value="<?php echo e($address->id); ?>" >
                <label for="main_address<?php echo e($address->id); ?>" > <?php echo e($address->address); ?> </label>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                   <em>На деревню дедушке</em>   
                <?php endif; ?>
                </ul>   
    </div>
    <div class="mb-3">
            <label class="form-label">Новый адрес</label>
            <input name="new_address" class="form-control" placeholder="Введите новый адрес">
            <div class="form-check">
                    <input name="makeMainAddress" class="form-check-input" type="checkbox" id="makeMainAddress">
                    <label class="form-check-label" for="makeMainAddress">
                    Сделать основным адресом
                    </label>
                </div>
    </div>
  <button type="submit" class="btn btn-primary">Сохранить</button>
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Shop\shop\resources\views/profile.blade.php ENDPATH**/ ?>