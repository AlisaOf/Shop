<?php

namespace App\Http\Controllers;

use App\Jobs\ExportCategories;
use App\Jobs\ExportProducts;
use App\Jobs\ImportCategories;
use App\Jobs\ImportProducts;
use App\Models\Product;
use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function admin () 
    {
        return view('admin.admin');
    }

    public function users () 
    {
        $users = User::paginate(7);
        $roles = Role::get();

        $data = [
            'title' => 'Список пользователей',
            'users'=> $users,
            'roles' => $roles,
            
        ];
        return view('admin.users', $data);
    }

    public function products () 
    {
        $products = Product::paginate(5);
        $categories = Category::get();
        $data = [
            'title' => 'Список продуктов',
            'products' => $products,
            'categories' => $categories
        ];

        return view('admin.products', $data);
    }

    public function categories () 
    {    
    
        $categories = Category::paginate(5);
        $data = [
            'title' => 'Список категорий',
            'categories' => $categories,
        ];
        return view('admin.categories', $data);
    } 

    public function createCategory (Request $request) 
    {    
        $input = request()->all();

        $name = $input['name'];
        $description = $input['description'];
        $picture = $input['picture'] ?? null;
        $category = new Category([
            'name' => $name,
            'description' => $description,
            'picture'=> $picture,
        ]);

        request()->validate([
            'name' => 'required',
            'description' => "required",
            'picture' => 'nullable|mimetypes:image/*'
        ]);

        if ($picture) {
            $ext = $picture->getClientOriginalExtension();
            $fileName = time() . rand(10000, 99999) . '.' . $ext;
            $picture->storeAs('public/categories', $fileName);
            $category->picture = "categories/$fileName";
        }
        else {
            $category->picture = 'categories/no_picture.png';
        }

        $category->save(); 
        return back();
    } 

    public function updateCategory (Request $request) 
    {    
        $input = request()->all();

        $name = $input['name'];
        $description = $input['description'];
        $picture = $input['picture'] ?? null;
        $categoryId = $input['category_Id'] ?? null;

        if (!$categoryId) {
            session()->flash('needCategoryError');
            return back(); 
        }

        $category = Category::find($categoryId);

        if ($picture) {
            $ext = $picture->getClientOriginalExtension();
            $fileName = time() . rand(10000, 99999) . '.' . $ext;
            $picture->storeAs('public/categories', $fileName);
            $category->picture = "categories/$fileName";
        }

        if ($name) $category->name = $name;
        if ($description) $category->description = $description;
        $category->save();
        session()->flash('updateCategorySuccess');
    
        return back();
    } 

    public function deleteCategory ($id)
    {
        Category::where('id', $id)->delete();
        return back();
    }



    public function exportCategories ()
    {
        ExportCategories::dispatch();
        session()->flash('startExportCategories');
        return back();
        
    }

    public function importCategories (Request $request)
    {
        
            ImportCategories::dispatch();
             session()->flash('startImportCategories');
            return back();
    }



    public function createProduct (Request $request) 
    {    
        $input = request()->all();

        $name = $input['name'];
        $description = $input['description'];
        $price = $input['price'];
        $picture = $input['picture'] ?? null;
        $category_id = $input['category_id'] ?? null;
        $product = new Product([
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'picture'=> $picture,
            'category_id' => $category_id
        ]);

        request()->validate([
            'name' => 'required',
            'description' => "required",
            'price' => "required",
            'picture' => 'nullable|mimetypes:image/*',
            'category_id' => 'required'
        ]);

        if ($picture) {
            $ext = $picture->getClientOriginalExtension();
            $fileName = time() . rand(10000, 99999) . '.' . $ext;
            $picture->storeAs('public/products', $fileName);
            $product->picture = "products/$fileName";
        }
        else {
            $product->picture = 'products/no_picture.png';
        }

        $product->save(); 
        return back();
    } 

    public function updateProduct (Request $request) 
    {    
        $input = request()->all();

        $name = $input['name'];
        $description = $input['description'];
        $price = $input['price'];
        $picture = $input['picture'] ?? null;
        $productId = $input['product_Id'] ?? null;

        if (!$productId) {
            session()->flash('needProductError');
            return back(); 
        }

        $product = Product::find($productId);

        if ($picture) {
            $ext = $picture->getClientOriginalExtension();
            $fileName = time() . rand(10000, 99999) . '.' . $ext;
            $picture->storeAs('public/products', $fileName);
            $product->picture = "products/$fileName";
        }

        if ($name) $product->name = $name;
        if ($description) $product->description = $description;
        if ($price) $product->price = $price;
        $product->save();
        session()->flash('updateProductSuccess');
    
        return back();
    } 

    public function deleteProduct ($id)
    {
        Product::where('id', $id)->delete();
        return back();
    }

    public function exportProducts ()
    {
        ExportProducts::dispatch();
        session()->flash('startExportProducts');
        return back();
    }


    public function importProducts (Request $request)
    {

            ImportProducts::dispatch();
             session()->flash('startImportProducts');
           return back();
    }


    public function enterAsUser ($id) 
    {
        Auth::loginUsingId ($id);
        return redirect() ->route('adminUsers');
    }
    

    public function addRole ()
    {
        request()->validate([
            'name' => 'required|min:3',
        ]);

        Role::create([
            'name' => request('name')
        ]);
        return back();
    }

    public function addRoleToUser ()
    {
        request()->validate([
            'user_id' => 'required',
            'role_id' => 'required',
        ]);

        $user = User::find(request('user_id'));
        $user->roles()->attach(Role::find(request('role_id')));
        return back();
    }

    
}

