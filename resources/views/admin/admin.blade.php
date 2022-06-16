@extends ('layouts.app')

@section ('title')
     Админка
@endsection

@section ('content')

<div class="row">
    <div class="col-sm-3">
     <div class="card border-primary mb-4" style="max-width: 18rem;">
        <div class="card-body text-center text-primary">
        <h5 class="card-title">Список пользователей</h5>
        <a href="{{ route('adminUsers') }}" class="btn btn-primary">Перейти</a>
        </div>
      </div>
    </div> 
    <div class="col-sm-3">
      <div class="card border-primary mb-4" style="max-width: 18rem;">
        <div class="card-body text-center text-primary">
        <h5 class="card-title">Список категорий</h5>
        <a href="{{ route('adminCategories') }}" class="btn btn-primary">Перейти</a>
        </div>
       </div>
    </div> 
    <div class="col-sm-3">
      <div class="card border-primary mb-4" style="max-width: 18rem;">
        <div class="card-body text-center text-primary">
        <h5 class="card-title">Список продуктов</h5>
        <a href="{{ route('adminProducts') }}" class="btn btn-primary">Перейти</a>
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
@endsection