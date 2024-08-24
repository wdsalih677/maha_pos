<?php

namespace App\Models\Products;

use App\Models\Categories\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasFactory,HasTranslations;
    protected $table = 'products';
    public $translatable = ['name','description'];
    protected $guarded = [];

    public function categories(){
        return $this->belongsTo(Category::class ,'category_id');
    }
}
