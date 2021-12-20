<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menuitems extends Model
{
    use HasFactory;
    protected $table = 'menu_items';

    public function parent()
    {
        return $this->belongsTo('Menu', 'menu');
    }
    
    public function sub()
    {
        return $this->hasMany(self::class, 'parent')->orderBy('sort', 'asc');
    }
    
    public function child(){
        return $this->sub()->with('sub')->orderBy('sort', 'asc');
    }
    
}

