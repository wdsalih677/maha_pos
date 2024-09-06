<?php

namespace App\Models\clients;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\clients\Order;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';
    protected $guarded = [];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
