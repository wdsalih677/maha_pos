<?php

namespace App\Models\clients;

use App\Models\Products\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders";

    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany(Product::class , 'product_order')->withPivot('quantity');
    }

    public function clients()
    {
        return $this->belongsTo(Client::class , 'client_id');
    }
}
