@extends ('layouts.app')

@section ('title')
     Список категорий
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
<h3>Добавить новую категорию</h3>
<form method="post" action="{{route('createCategory')}}" class="mb-4" enctype="multipart/form-data">
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
             <label for="name" class="col-sm-2 col-form-label">Изображение</label>
             <div class="col-sm-6">
             <input type="file" name="picture" class="form-control">
             </div>
        </div>  
        <br>  
        <button class="btn btn-success" type="submit">Сохранить</button>
    </form>
</div>


<h1> {{$title}} </h1>


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
                @foreach ($categories as $category)
                 <tr>
                      <td class="text-center">{{ $category->id }}</td>
                      <td class="text-center">{{ $category->name }}</td>  
                      <td class="text-center" width='100'> <img src="{{ asset('storage') }}/{{ $category->picture }}" height='100'></td> 
                      <td class="text-center">
                           <div class="btn-group" role="group">
                                <a class="btn btn-warning" type="button" href="#">Редактировать</a>
                                <form method="post" action="{{ route('deleteCategory', $category->id) }}">
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
       {{$categories-> links()}}
       </div>

     @if (session('startExportCategories'))
       <div class="alert alert-success">
            Выгрузка категорий запущена
       </div>
     @endif

     @if (session('startImportCategories'))
       <div class="alert alert-success">
            Загрузка категорий началась
       </div>
     @endif

       <form method="post" action="{{ route('exportCategories') }}">
            @csrf
             <button type="submit" class="btn btn-primary">Выгрузить категории</button>
       </form>
      <br>
       <form method="post" action="{{ route('importCategories') }}" enctype="multipart/form-data">
            @csrf
            <div class="input-group row">
                <label for="name" class="col-sm-2 col-form-label">Файл для импорта</label>
               <div class="col-sm-6">
                <input type="file" name="importFile" class="form-control">
               </div> 
           </div>  
           <button type="submit" class="btn btn-primary mt-2" >Загрузить категории</button>
        </form>  
       
@endsection

