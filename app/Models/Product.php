<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    public function getStatusAttribute($value)
    {
        return ($value == 0 || $value == false) ? false : true;
    }

    public function getAvailableAttribute($value)
    {
        return ($value == 0 || $value == false) ? false : true;
    }

    public function getImageAttribute($value)
    {
        return (is_null($value)) ? "https://images.unsplash.com/photo-1570976278927-39de20093775?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" : $value;
    }
}
