<?php

namespace App\Models\Products;

use App\Models\Categories\Category;
use App\Models\clients\Order;
use App\Models\seles\Sale;
use App\Models\seles\Sele;
use App\Models\warehouses\Warehous;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasFactory,HasTranslations;
    protected $table = 'products';
    public $translatable = ['name','description'];
    protected $guarded = [];

    //function to get category
    public function categories()
    {
        return $this->belongsTo(Category::class ,'category_id');
    }

    //function to get orders
    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity');;
    }

    public function seles()
    {
        return $this->belongsToMany(Sale::class)->withPivot('quantity');;
    }

    public function warehouses()
    {
        return $this->belongsTo(Warehous::class , 'warehous_id');
    }
}
