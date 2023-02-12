<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// class  extends Model
// {
// }
class meal_categorie extends Model
{
    #use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        
    ];
    public function meal_categorie()
    {
        //relation one to one berween id(users) and user_id(categories)        
        return $this->hasOne(plat::class, 'meal_category_id', 'id');
    }
}