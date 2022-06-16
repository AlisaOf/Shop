<?php

use App\Models\Category;
use App\Models\Order;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('orderTest', function () {

    $order = Order::first();
    $order->products->each(function($product) {

    });
});

Artisan::command('queryBuilder', function () {

    $data = DB::table('categories as c')
        ->select(
            'c.id',
            'c.name',
            'c.description'
        )
        ->where('name', 'Процессоры')
        //->get();
        ->first();

     $data = DB::table('categories as c')
       ->select(
           'c.name',
           DB::raw('count(p.id) as product_quantity'),
           DB::raw('sum(p.price) as priceAmount')
       )
       ->join('products as p', function ($join) {
           $join->on('c.id', 'p.category_id');
       })
       ->groupBy('c.id')
       ->get();
     
     DB::table('categories')
         ->orderBy('id')
         ->chunk(4, function ($categories) {
             dump($categories->count());
         });

});


Artisan::command('updateCategory', function () {


    $procs = Category::where('name', 'Процессоры')->first();
    $procs->description = 'Intel лучше!';
    $procs->save();
});


Artisan::command('importCategoriesFromFile', function () {

    $file = fopen('categories.csv', 'r');

    $i = 0;
    $insert = [];
    $columns = [];
    while ($row = fgetcsv($file, 1000, ';')) {
        if ($i++ == 0) {
            $bom = pack('H*', 'EFBBBF');
            $row = preg_replace("/^$bom/", '', $row);
            $columns = $row;
            continue;
        }

    //if ($i == 0) {
    //   $i++;
    //  continue;
    //  }
    //  else if ($i++ == 1) {
    //     $columns = $row;
    //      continue;
    //  }


        $data = array_combine($columns, $row);
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $insert[] = $data;
    }

    Category::insert($insert);

});

Artisan::command('parseEkatalog', function () {

    $url = 'https://www.e-katalog.ru/ek-list.php?katalog_=189&search_=rtx+3090';

    $data = file_get_contents($url);

    $dom = new DOMDocument();
    @$dom->loadHTML($data);

    $xpath = new DomXPath($dom);
    $totalProductsString = $xpath->query("//span[@class='t-g-q']")[0]->nodeValue ?? false;
    
    preg_match_all('/\d+/', $totalProductsString, $matches);
    $totalProducts = (int) $matches[0][0];

    $divs = $xpath->query("//div[@class='model-short-div list-item--goods   ']");

    $productsOnOnePage = $divs->length;

    $pages = (int) ceil($totalProducts / $productsOnOnePage);

    $products = [];
    foreach ($divs as $div) {
        $a = $xpath->query("descendant::a[@class='model-short-title no-u']", $div);
        $name = $a[0]->nodeValue;
        
        $price = 'Нет в наличии';
        $ranges = $xpath->query("descendant::div[@class='model-price-range']", $div);

        if ($ranges->length == 1) {
            foreach ($ranges[0]->childNodes as $child) {
                if ($child->nodeName == 'a') {
                    $price = 'от' . $child->nodeValue;
                }

            }
        }
        
        $ranges = $xpath->query("descendant::div[@class='pr31 ib']", $div);
            if ($ranges->length == 1) {
                $price = $ranges[0]->nodeValue;
        }
        $products[] = [
            'name' => $name,
            'price' => $price
        ];
    }

    for ($i = 1; $i < $pages; $i++) {
        $nextUrl = "$url&page_=$i";

        $data = file_get_contents($nextUrl);

        $dom = new DOMDocument();
        @$dom->loadHTML($data);
    
        $xpath = new DomXPath($dom);
        $divs = $xpath->query("//div[@class='model-short-div list-item--goods   ']");

        foreach ($divs as $div) {
            $a = $xpath->query("descendant::a[@class='model-short-title no-u']", $div);
            $name = $a[0]->nodeValue;
            
            $price = 'Нет в наличии';
            $ranges = $xpath->query("descendant::div[@class='model-price-range']", $div);
    
            if ($ranges->length == 1) {
                foreach ($ranges[0]->childNodes as $child) {
                    if ($child->nodeName == 'a') {
                        $price = 'oт' . $child->nodeValue;
                    }
                }
            }
                $ranges = $xpath->query("descendant::div[@class='pr31 ib']", $div);
                if ($ranges->length == 1) {
                    $price = $ranges[0]->nodeValue;
            }
            $products[] = [
                'name' => $name,
                'price' => $price
            ];
        }
    }

    $file = fopen('videocards.csv', 'w');
    foreach ($products as $product) {
        fputcsv($file, $product, ';');
    }
    fclose($file);
});

Artisan::command('massCategoriesInsert', function(){

    $categories = [
        [
            'name' => 'Процессоры',
            'description' => 'fghjkjhl',
            'created_at'=> date('Y-m-d H:i:s'),
        ],
        [
            'name' => 'Видеокарты',
            'description' => 'hkjskld;',
            'created_at'=> date('Y-m-d H:i:s'),
        ],
    ];

    Category::insert($categories);

});

Artisan::command('deleteCategory', function (){

    //$category = Category::find(1);
    //$category->delete();

    Category::whereNotNull('id')->delete();
});


Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Artisan::command('createCategory', function () {

    Auth::loginUsingId(1);

    $category= new Category([
    'name' => 'Мобильные телефоны',
    'description' => 'Которые не купишь',
    ]);

 });