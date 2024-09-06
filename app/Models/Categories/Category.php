<?php

namespace App\Models\Categories;

use App\Models\Products\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory , HasTranslations;

    protected $table = 'categories';
    public $translatable = ['name'];
    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(Product::class ,'category_id');
    }
}
