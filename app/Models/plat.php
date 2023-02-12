<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plat extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'img',
        'name',
        'discretion',
        'price',
        'meal_category_id',
        'user_id',
        
    ];
    public function plat()
    {
        return $this->belongsTo(User::class);
    }
}
