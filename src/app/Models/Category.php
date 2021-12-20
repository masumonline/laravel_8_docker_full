<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function parent()
    {
        return $this->belongsTo(self::class, 'childof');
    }

    public function child(){
        return $this->sub()->with('sub')->orderBy('sort', 'asc');
    }
    
    public function sub()
    {
        return $this->hasMany(self::class, 'childof')->orderBy('sort', 'asc');
    }
    
}
