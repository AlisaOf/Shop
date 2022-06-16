@extends ('layouts.app')

@section ('title')
     Список продуктов
@endsection


@section ('content')

@if($errors->isNotEmpty())
            <div class="alert alert-warning" role="alert">
                @foreach($errors->all() as $error)
                    {{ $error }} 
                    @if (!$loop->last) <br> @endif
                @endforeach
        </div>
@endif


<div class="col-md-12">
<h3>Добавить новый продукт</h3>
<form method="post" action="{{route('createProduct')}}" class="mb-4" enctype="multipart/form-data">
        @csrf
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
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
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

 <h1>{{$title}} </h1>



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
                @foreach ($products as $product)
                 <tr>
                      <td class="text-center">{{ $product->id }}</td>
                      <td class="text-center">{{ $product->name }}</td>
                      <td class="text-center"><img src="{{ asset('storage') }}/{{ $product->picture }}" height='100'></td>
                      <td class="text-center">{{ $product->description }}</td>
                      <td class="text-center">{{ $product->category_id}}</td> 
                      <td class="text-center">{{ $product->price }}</td>
                      <td class="text-center">
                      <div class="btn-group" role="group">
                                <a class="btn btn-warning" type="button" href="#">Редактировать</a>
                                <form method="post" action="{{ route('deleteProduct', $product->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-danger">Удалить</button>
                                </form>  
                           </div>
                      </td>
                 </tr>
                 @endforeach
        </tbody>
  </table>

  <div>
       {{$products-> links()}}
  </div>
  @if (session('startExportProducts'))
       <div class="alert alert-success">
            Выгрузка продуктов началась
       </div>
     @endif
  
  <form method="post" action="{{ route('exportProducts') }}">
            @csrf
             <button type="submit" class="btn btn-primary">Выгрузить продукты</button>
  </form>

  <br>
       <form method="post" action="{{ route('importProducts') }}" enctype="multipart/form-data">
            @csrf
            <div class="input-group row">
                <label for="name" class="col-sm-2 col-form-label">Файл для импорта</label>
               <div class="col-sm-6">
                <input type="file" name="importFile" class="form-control">
               </div> 
           </div>  
           <button type="submit" class="btn btn-primary mt-2" >Загрузить продукты</button>
        </form>  

@endsection
