<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiProduct extends Model
{
    use HasFactory;
    protected $table='remote_data';
    protected $hidden = [
        'vendorprice',
    ];
}
