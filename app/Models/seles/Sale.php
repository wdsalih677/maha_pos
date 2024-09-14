<?php

namespace App\Models\seles;

use App\Models\Products\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $table = "seles";

    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_sele', 'sele_id', 'product_id')
                ->withPivot('quantity');
    }
}
